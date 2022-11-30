@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0" style="min-height: 112px;">
    <div class="row" style="background: linear-gradient(to right, #0e3997 , #2570e1);box-shadow: 0 10px 30px 0 rgb(17 38 146 / 5%);border-radius: 10px;">
        <div class="card card_style_name" style="width: 25%;background: none;">
            <div class="align-items-center card-body d-flex p-0" style="width: 8rem;">
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="card1_img">
                <h5 class="card-title card1_title">Rahul</h5>
            </div>
        </div>
        <div class="card card_style" style="width: 20%;">
            <div class="align-items-center card-body p-0 card_body_style">
                <h6 class="card-title card2_title">Balance
                    <i class="fa fa-inr card2_icon" aria-hidden="true"></i>
                </h6>
                <div class="p-1 text-center card2_footer">Wallet Statement</div>
            </div>
        </div>
        <div class="card card_style" style="width: 20%;">
            <div class="align-items-center card-body p-0 card3_body_style">
                <h6 class="card-title card3_heading1">MTB1<i class="fa fa-university card3_icon1" aria-hidden="true"></i>
                </h6>
                <h6 class="card-title card3_heading2">MTB1<i class="fa fa-university card3_icon2" aria-hidden="true"></i>
                </h6>
                <div class="p-1 text-center card3_footer">Move To Bank</div>
            </div>
        </div>
        <div class="card card_style" style="width: 20%;">
            <div class="align-items-center card-body p-0 card_body_style">
                <h6 class="card-title card4_heaging">0.00<i class="fa fa-gift card4_icon" aria-hidden="true"></i>
                </h6>
                <div class="p-1 text-center card4_footer">Redeem</div>
            </div>
        </div>
        <div class="card card_style" style="width: 12%;">
            <div class="align-items-center card-body p-0 card5_body_style">
                <h6 class="card-title card5_heading"><i class="fa fa-home card5_icon" aria-hidden="true"></i>
                </h6>
                <div class="p-1 text-center card5_footer">Home</div>
            </div>
        </div>
    </div>
</div>
<div class="conatiner-fluid content-inner py-0">
    <div class="row">
        <div class="card aeps_card">
            <div class="card-header aeps_card_heading">
                Matm - SaralPe Private limited
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-7">
            <form>
                <div class="card p-3">
                    <div class="card-body bg_gradient p-3 radius_4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio1" value="Withdrawal">
                            <label class="form-check-label form-check-label2" for="inlineRadio1">Withdrawal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio2" value="Balance Enquiry">
                            <label class="form-check-label form-check-label2" for="inlineRadio2">Balance Enquiry</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio3" value="Mini Statement">
                            <label class="form-check-label form-check-label2" for="inlineRadio3">Mini Statement</label>
                        </div>
                    </div>
                    <div class="card-body bg_gradient p-3 mt-3 radius_4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio5" value="Mantra">
                            <label class="form-check-label form-check-label2" for="inlineRadio5">Mantra</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio6" value="Morpho">
                            <label class="form-check-label form-check-label2" for="inlineRadio6">Morpho</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pluspay" id="inlineRadio7" value="Startek">
                            <label class="form-check-label form-check-label2" for="inlineRadio7">Startek</label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select Your Operator</option>
                                    <option value="1">ICICI</option>
                                    <option value="2">PAYTM</option>
                                    <option value="3">AXIS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adharno">Adhar No</label>
                                <input type="text" class="form-control" id="adharno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="12 Digit Adhar No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Mobile No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="pluspay" id="inlineRadio8" value="Mantra">
                                    <label class="form-check-label" for="inlineRadio8" style="font-size: 13px;">Agree T&C of ICICI Bank Limited</label>
                                </div>
                                <div class="d-flex form-check form-check-inline" style="padding-left: 0;">
                                    <button type="button" class="bg_gradient btn btn_style2">Submit Transaction</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-lg-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Recent Transaction</h4>
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection