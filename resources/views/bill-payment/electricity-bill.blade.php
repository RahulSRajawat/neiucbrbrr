@extends("layouts.app")
@section("styles")
<style>
    .tab {
        overflow: hidden;
        background-color: #f8f8f8;
    }
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        color: #999;
        font-size: 14px;
    }
    .tab button.active {
        border-bottom: 2px solid #1e6ad8;
        color: black;
    }
    .tabcontent {
        display: none;
        padding: 6px 12px;
    }
</style>
@endsection
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Pay Electricity Bill</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="recharge_form">
                            <div class="form-group">
                                <label class="form-label" for="pwd">State:</label>
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select State</option>
                                    <option value="1">Bihar</option>
                                    <option value="2">Assam</option>
                                    <option value="3">Chandigarh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Electricity Board:</label>
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select Electricity Board</option>
                                    <option value="1">Central Power Distribution Corporation of A.P Ltd (APCPDCL)</option>
                                    <option value="2">Eastern Power Distribution Company of Andhra Pradesh Ltd. (APEPDCL)</option>
                                    <option value="3">Southern Power Distribution Company of A.P Ltd (APSPDCL)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Consumer Number:</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="pwd">
                            </div>
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Promo Codes</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="_1s0u">
                            <ul>
                                <li class="p-2" data-bs-toggle="modal" data-bs-target="#detail_modal">
                                    <h5>ELEC1000</h5>
                                    <p class="m-0">
                                        <span class="_33La">Participate in the Lucky Draw to win 100% cashback upto ₹10,000.</span>
                                        <span class="YGVM"><span>View detail</span></span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Participate in the Lucky Draw to win 100% cashback upto ₹10,000.</h5>
                <button type="button" class="close border-0" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="myInput" readonly value="ELEC1000" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="myFunction()" id="basic-addon2" style="cursor: pointer;">Copy</span>
                        </div>
                    </div>
                </div>
                <div class="CLNZ lHgm">
                    <div> <b>Terms &amp; Conditions:</b></div>
                    <p>* Get a chance to win 100% Cashback on successful Electricity Bill Payment on Paytm app<br>
                        * This offer is only applicable on min. bill payment of Rs.100 or more on Paytm app<br>
                        * Everyday 1000th users will receive 100% cashback upto Rs 10,000 on payment of electricity bill <br>
                        * To avail this offer, Apply Promocode ELEC1000 in the 'Apply Promocode/See Bank offers' section<br>
                        * This offer is applicable once per user per month<br>
                        * This offer is valid till 31st October 2022, 23:59:00 only<br>
                        * This offer cannot be clubbed with any other offer<br>
                        * Cashback will be sent to the user's wallet instantly. In case of any delays, cashback will be credited within 24 hours from the completion of an eligible payment<br>
                        * Paytm will not share a list of winners on its platform. All winners will get the cashback into their wallet instantly. There is no need to redeem a scratch card <br>
                        * In case the user has exhausted min. KYC Limits of wallet, cashback will be sent to users in their Paytm linked Bank Account<br>
                        * Paytm reserves its absolute right to withdraw and/or alter any terms and conditions of the offer at any time without prior notice<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }
</script>
@endsection