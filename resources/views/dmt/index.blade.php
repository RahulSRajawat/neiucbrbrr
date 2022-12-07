@extends("layouts.app")
@section("title","DMT")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <div class="white_bg">
                            <div class="row">
                                <div class="col-sm-12"> </div>
                            </div>
                            <form action="https://rnfi.in/filter-dmt" method="get" class="one_col" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Start Date:</label>
                                            <input type="text" name="startdate" class="start form-control hasDatepicker" autocomplete="off" value="" id="dp1669245914197">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>End Date:</label>
                                            <input type="text" name="enddate" class="start form-control hasDatepicker" autocomplete="off" value="" id="dp1669245914198">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>SEARCH BY: </label>
                                                        <label>
                                                            <input type="radio" name="searchby" value="txnid" checked=""> TXNID </label>
                                                        <label>&nbsp;</label>
                                                        <label>
                                                            <input type="radio" name="searchby" value="mobile"> MOBILE </label>
                                                        <label>&nbsp;</label>
                                                        <label>
                                                            <input type="radio" name="searchby" value="accno"> ACCNO </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>SEARCH FROM: </label>
                                                        <label>
                                                            <input type="radio" name="searchfrom" value="0" checked=""> Current </label>
                                                        <label>&nbsp;</label>
                                                        <label>
                                                            <input type="radio" name="searchfrom" value="1"> Archive </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Enter keyword</label>
                                            <input type="text" name="serachvalue" value="" placeholder="Enter keyword" autofocus="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Transaction Status</label>
                                            <select class="select_search select2-hidden-accessible" name="status" data-placeholder="Transaction Status" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">Select</option>
                                                <option value="0">Refund</option>
                                                <option value="1">Complete</option>
                                                <option value="2">In Process</option>
                                                <option value="3">Sent To Bank</option>
                                                <option value="4">On Hold</option>
                                                <option value="5">Failed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Wallet</label>
                                            <select class="select_search select2-hidden-accessible" name="wallet" data-placeholder="Select Wallet" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">Select</option>
                                                <option value="0">Main</option>
                                                <option value="1">Credit Card</option>
                                                <option value="2">AEPS</option>
                                                <option value="3">PG</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="submit" value="Submit" class="btn btn-danger">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="card ">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped">
                                <tr>
                                    <td class="re_td_data" title="Click Here To Print">TxnId</td>
                                    <td class="re_td_data">BeneName</td>
                                    <td class="re_td_data">Account No</td>
                                    <td class="re_td_data">Bank Name</td>
                                    <td class="re_td_data">Remitter</td>
                                    <!--<td>Opening</td>-->
                                    <td class="re_td_data">Amount</td>
                                    <td class="re_td_data">Charges</td>
                                    <!--<td>Closing</td>-->
                                    <td class="re_td_data">UTR</td>
                                    <td class="re_td_data">Status</td>
                                    <td class="re_td_data">Re-Initiate</td>
                                    <td class="re_td_data">Remarks</td>
                                    <td class="re_td_data">Type</td>
                                    <td class="re_td_data">Date</td>
                                    <td class="re_td_data">IFSC</td>
                                    <td class="re_td_data">Action</td>

                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection