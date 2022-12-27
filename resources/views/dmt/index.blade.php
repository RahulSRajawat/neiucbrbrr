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
                                    <li>
                                        <button class="btn changepin" id="changepin"><i class="fa fa-key"></i> Change
                                            MPIN</button>
                                    </li>
                                    <li>
                                        <button class="btn addnew-bene" id="addnew_bene"><i class="fa fa-user"></i> Register
                                            Beneficiary</button>
                                    </li>
                                    <li>
                                        <button class="btn resend-pin"> <i class="fa fa-key"></i> Forgotten MPIN?</button>
                                    </li>
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
                            <div class="white_bg add-bene half_padd" id="add_bene" style="display: none;">
                                <div class="close_panel_btn" id="close_panel_btn1"><a href="javascript:"
                                        class="btn-close-bene"><i class="fa fa-close"></i></a></div>
                                <form class="one_col" name="bene-search" id="add-new-receiver" method="post"
                                    accept-charset="utf-8">
                                    <input type="hidden" name="verified" value="0" id="is-verified">
                                    <div class="row pos_rel">
                                        <div class="head">Register Beneficiary</div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Type* :</label>
                                                <select
                                                    class="form-control" name="type">
                                                    <option value="0">IMPS Bank</option>
                                                    <option value="1">Gramin Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Select Bank* :</label>
                                                <select id="my-select" class="form-control" name="bank">
                                                    <option value="">-- Select Bank -- </option>
                                                    @foreach ($banks as $bank)
                                                        <option value="{{ $bank->bank_id }}">{{$bank->bank_name}} </option> 
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Beneficiary Name* :</label>
                                                <input type="text" name="benename" data-lpignore="true"
                                                    id="benename" class="form-control" pattern="[A-Za-z ]+"
                                                    placeholder="Enter Beneficiary Name" autocomplete="false"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Account No* :</label>
                                                <input type="text" name="accno" id="acno" data-lpignore="true"
                                                    pattern="[0-9]+" class="form-control" placeholder="Enter Account No."
                                                    autocomplete="off" required="">
                                                <span class="account-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label>Confirm Account No* :</label>
                                                <input type="text" name="confirmaccno" data-lpignore="true"
                                                    id="cacno" pattern="[0-9]+" class="form-control"
                                                    placeholder="Re-Enter Account No." autocomplete="off" required="">
                                                <span class="caccount-number"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group margin_t_20">
                                                <label>
                                                    <input type="radio" class="isifsc" name="isifsc" value="1"
                                                        checked=""> I Dont Have?</label>
                                                <label>&nbsp;</label>
                                                <label>
                                                    <input type="radio" class="isifsc" name="isifsc" value="0">
                                                    I Have IFSC?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group margin_t_20">
                                                <label>
                                                    <input type="radio" class="only_register" id="only_register"
                                                        name="only_register" value="0" checked=""> Only
                                                    Register?</label>
                                                <label>&nbsp;</label>
                                                <label>
                                                    <input type="radio" class="only_register" id="reg_pay"
                                                        name="only_register" value="1"> Register and Pay?</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 amount-field " id="amount-field"
                                            style="display: none;">
                                            <div class="form-group">
                                                <label>Enter Amount :</label>
                                                <input type="text" name="amount" id="initiateAmount"
                                                    data-lpignore="true" pattern="[0-9]+" class="form-control"
                                                    placeholder="Enter Amount." autocomplete="off"> <span
                                                    class="txn-amount"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="getifsc">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Select State* :</label>
                                                    <select class="form-control select-state" name="state"
                                                        style="width: 100%" data-placeholder="Select State">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Select Branch* :</label>
                                                    <select class="form-control select-branch" name="branch"
                                                        style="width: 100%" data-placeholder="Select Branch">
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>IFSC Code :</label>
                                                    <input type="text" name="ifsccode" id="ifsccode"
                                                        class="form-control" placeholder="Enter IfSC Code"
                                                        data-lpignore="true" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 receiver-verify">
                                            <div class="form-group">
                                                <label>OTP* :</label>
                                                <input type="text" name="otp" class="form-control"
                                                    placeholder="Enter OTP" autocomplete="off" required=""
                                                    disabled="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 bene-otp">
                                            <div class="form-group">
                                                <button type="button" data-toggle="tooltip" data-placement="bottom"
                                                    class="btn btn-black btn_mobile margin_t_20 btn-xss re-gen-receiver-otp"
                                                    title="" data-original-title="Re-Generate OTP"><i
                                                        class="fa fa-rotate-right"></i> Re-Generate OTP</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-danger margin_t_20 add-new-receiver"><i
                                                            class="fa fa-user"></i> Register Beneficiary</button>
                                                    <button type="button"
                                                        class="btn btn-light margin_t_20 verify-bene-name"><i
                                                            class="fa fa-check"></i> Verify Account [Fee Rs. 4]</button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <button type="button"
                                                        class="btn btn-black margin_t_20 pull-center our-ifsccode"
                                                        style="display:none;"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 address" style="display: none"></div>
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
                                            <a class="bene_status delete_bene" href="{{ route('dmt.beneficiary-delete',$beneficiary_fetch->bene_id,$detail->mobile) }}" data-bene="34682971"><i
                                                    class="fa fa-trash"></i></a>
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
        $('#only_register').click(function() {
            $('#amount-field').hide();
        });
        $('#reg_pay').click(function() {
            $('#amount-field').show();
        });
    </script>
@endsection
