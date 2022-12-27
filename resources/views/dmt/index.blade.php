@extends('layouts.app')
@section('title', 'Money Transfer Detail')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card ">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('danger'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('danger') }}
                                </div>
                            @endif
                            <div class="white_bg user_details">
                                <ul class="heads">
                                    <li>Name :</li>
                                    <li>Mobile :</li>
                                    <li>Month Limit :</li>
                                </ul>
                                <ul class="details">
                                    <li><i class="fa fa-user"></i> {{ $detail->fname }} {{ $detail->lname }}</li>
                                    <li><i class="fa fa-mobile"></i> {{ $detail->mobile }}</li>
                                    <li class="rem-limit"><i class="fa fa-inr"></i> 25000.00</li>
                                </ul>
                            </div>
                            <div class="benelist_btn">
                                <ul>
                                    {{-- <li>
                                        <button class="btn changepin" id="changepin"><i class="fa fa-key"></i> Change
                                            MPIN</button>
                                    </li> --}}
                                    <li>
                                        <button class="btn addnew-bene" id="addnew_bene"><i class="fa fa-user"></i> Register
                                            Beneficiary</button>
                                    </li>
                                    {{-- <li>
                                        <button class="btn resend-pin"> <i class="fa fa-key"></i> Forgotten MPIN?</button>
                                    </li> --}}
                                    <!--<li> <button class="btn fetch-bene" data-id="3808244"><i class='fa fa-search-plus'></i> Fetch Beneficiary</button></li>-->
                                </ul>
                            </div>
                            <div class="white_bg half_padd change-pin" id="change-pin" style="display: none;">
                                <div class="close_panel_btn" id="close_panel_btn0"><a href="javascript:"
                                        class="btn-close-mpin"><i class="fa fa-close"></i></a></div>
                                <form class="one_col" id="update-pin" method="post" accept-charset="utf-8">
                                    <div class="row pos_rel">
                                        <div class="head">Change MPIN</div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Old PIN* :</label>
                                                <input type="text" name="oldpin" id="oldpin" data-lpignore="true"
                                                    pattern="[0-9]{4}" maxlength="4" class="form-control"
                                                    placeholder="Enter Old Pin" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>New PIN* :</label>
                                                <input type="text" name="newpin" id="newpin" data-lpignore="true"
                                                    pattern="[0-9]{4}" maxlength="4" class="form-control"
                                                    placeholder="Enter New Pin" autocomplete="off" required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-danger update-pin">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="white_bg add-bene half_padd" id="add_bene"
                                {{ $errors->any() ? '' : 'style="display: none;"' }}>
                                <div class="close_panel_btn" id="close_panel_btn1"><a href="javascript:"
                                        class="btn-close-bene"><i class="fa fa-close"></i></a></div>
                                <form class="one_col" method="post" action="{{ route('dmt.register-store-beneficiary') }}">
                                    @csrf
                                    <div class="row pos_rel">
                                        <div class="head">Register Beneficiary</div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Bank* :</label>
                                                <select id="my-select" class="form-control" name="bank">
                                                    <option value="">-- Select Bank -- </option>
                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->bank_id }}">{{ $bank->bank_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Beneficiary Name* :</label>
                                                <input type="text" name="benename" data-lpignore="true" id="benename"
                                                    class="form-control" pattern="[A-Za-z ]+"
                                                    placeholder="Enter Beneficiary Name" autocomplete="false"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account No* :</label>
                                                <input type="text" name="accno" id="acno" data-lpignore="true"
                                                    pattern="[0-9]+" class="form-control" placeholder="Enter Account No."
                                                    autocomplete="off" required="">
                                                <span class="account-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Account No* :</label>
                                                <input type="text" name="confirmaccno" data-lpignore="true"
                                                    id="cacno" pattern="[0-9]+" class="form-control"
                                                    placeholder="Re-Enter Account No." autocomplete="off" required="">
                                                <span class="caccount-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile* :</label>
                                                <input type="number" readonly value="{{ $detail->mobile }}"
                                                    name="phone" id="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date Of Birth* :</label>
                                                <input type="date" name="dob" id="dob"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pin Code* :</label>
                                                <input type="number" min="0" name="pin_code" id="pin_code"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address* :</label>
                                                <input type="text" name="address" id="address"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="">Do You Have IFSC ?</label>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="radio_ifsc"
                                                            value="Yes"> Yes
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="radio_ifsc"
                                                            value="No"> No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ifsc-field" style="display: none;">
                                            <div class="form-group">
                                                <label>IFSC Code :</label>
                                                <input type="text" name="ifsccode" id="ifsccode"
                                                    class="form-control" placeholder="Enter IfSC Code"
                                                    data-lpignore="true" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-danger margin_t_20 add-new-receiver"><i
                                                        class="fa fa-user"></i> Register Beneficiary</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="white_bg reg_bene_head">
                                <div class="row">
                                    <div class="col-sm-1">Status</div>
                                    <div class="col-sm-2">Bene Name</div>
                                    <div class="col-sm-2">Bank</div>
                                    <div class="col-sm-2">A/C Number</div>
                                    <div class="col-sm-2">Bene Status</div>
                                    <div class="col-sm-3">Amount</div>
                                </div>
                            </div>
                            @foreach ($beneficiary_fetchs as $beneficiary_fetch)
                                <div class="white_bg reg_bene_det_wrap" id="listid34682971">
                                    <div class="row">
                                        <div class="col-sm-1 reg_bene_det">
                                            <a class="bene_status delete_bene"
                                                href="{{ route('dmt.beneficiary-delete', ['id' => $beneficiary_fetch->bene_id, 'phone' => $detail->mobile]) }}"
                                                data-bene="34682971"><i class="fa fa-trash"></i></a>
                                        </div>
                                        <div class="col-sm-2 reg_bene_det">{{ $beneficiary_fetch->name }}</div>
                                        <div class="col-sm-2 reg_bene_det">{{ $beneficiary_fetch->bankname }}</div>
                                        <div class="col-sm-2 reg_bene_det">{{ $beneficiary_fetch->accno }}</div>
                                        <div class="col-sm-2 reg_bene_det">
                                            <div class="bene_status"><i
                                                    class="fa {{ $beneficiary_fetch->verified == 1 ? 'fa-check' : 'fa-times' }}"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 reg_bene_det">
                                            <form class="one_col dmt-submit" id="confirmTxn" method="post"
                                                accept-charset="utf-8">
                                                <input type="hidden" name="receiverToken" value="34682971">
                                                <div class="bene_pro">
                                                    <input type="text" name="amount" autocomplete="off"
                                                        pattern="[0-9]{3,5}" class="form-control" required="true">
                                                    <button type="submit" style="width:auto !important;">Pay</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row bene_delete" id="delete34682971" style="display:none;">
                                        <form class="one_col verify-delete-beneficiary" id="34682971" method="post"
                                            accept-charset="utf-8">
                                            <input type="hidden" name="benetoken" value="34682971">
                                            <input type="hidden" name="accno" value="919755678764">
                                            <div class="col-sm-3">
                                                <div class="form-group margin_t_20">
                                                    <input type="text" name="otp" id="otp" pattern="[0-9]+"
                                                        class="form-control"
                                                        placeholder="Enter OTP Received on Remitter mobile"
                                                        autocomplete="off" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <input type="submit" value="Submit"
                                                        class="btn btn-danger margin_t_20 34682971">
                                                </div>
                                            </div>
                                            <div class="col-sm-7 errormsgbene34682971"> </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#changepin').click(function() {
            $('#change-pin').toggle(500);
        });
        $('#close_panel_btn0').click(function() {
            $('#change-pin').toggle(500);
        });
        $('#addnew_bene').click(function() {
            $('#add_bene').toggle(500);
        });
        $('#close_panel_btn1').click(function() {
            $('#add_bene').toggle(500);
        });
        $("input:radio[name='radio_ifsc']").on("click", function() {
            if ($(this).val() == "Yes") {
                $(".ifsc-field").show();
            } else {
                $(".ifsc-field").hide();
            }
        });
    </script>
@endsection
