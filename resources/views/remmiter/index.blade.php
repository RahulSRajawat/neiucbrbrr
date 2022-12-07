@extends("layouts.app")
@section("title","Remmiter")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card remmiter_card">
                    <div class="remmit_overlay"></div>
                    <div class="card-header d-flex justify-content-between bg-transparent">
                        <div class="header-title">
                            <h4 class="card-title text-white">Enter the mobile number / Account number below and proceed. </h4>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="parallex_blk">
                            <form  class="one_col" id="get-remitter" method="post" accept-charset="utf-8">
                                <div class="row justify-content-center">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="input_holder">
                                            <input type="text" id="main-number" placeholder="Enter 10 digit customer mobile number" name="mobile" pattern="[0-9]{10,10}" title="10 Digit Mobile Number" maxlength="10" required="" autofocus="" autocomplete="on"><button type="submit" class="get-remitter"><i class="fa fa-arrow-right"></i></button>
                                            <!--<span>Mobile Number Entered is incorrect</span>-->
                                        </div>
                                    </div>
                                </div>
                                <!--<h5>Combined limit of NEFT and IMPS is 25000/- only.</h5>-->
                            </form>
                            <h2 style="text-align: center;padding-top: 20px;color: #ffffff;">OR</h2>
                            <form  class="one_col" id="get-account" method="post" accept-charset="utf-8">
                                <div class="row justify-content-center">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="input_holder">
                                            <input type="text" id="main-acc-number" placeholder="Enter customer's account number" name="account" pattern="[0-9]{10,16}" title="Account Number" maxlength="16" required="" autofocus="" autocomplete="on"><button type="submit" class="get-account"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection