@extends("layouts.app")
@section("title","Complete Profile")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">Complete Profile</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('')}}" method="post">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="account-type">Select Account Type <span class="text-danger">*</span></label>
                                    <select name="account_type" required id="account-type" class="form-control">
                                        <option value="">-- Choose --</option>
                                        <option value="">Distributor</option>
                                        <option value="">Retailer</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Full Name" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Father's Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Father's Name" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">DOB <span class="text-danger">*</span></label>
                                    <input type="date" placeholder="" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Firm Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Email Address <span class="text-danger">*</span></label>
                                    <input type="text" readonly placeholder="Email Address" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="10 Digit Mobile Number" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Pan Number <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Pan Number" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Aadhar Number <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="12 Digit Aadhar Number" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" required id="gender" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Plan Name <span class="text-danger">*</span></label>
                                    <select name="account_type" required id="account-type" class="form-control">
                                        <option value="">-- Choose --</option>
                                        <option value="">Smart Retailer</option>
                                        <option value="">Smart Distributor</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">GST Number</label>
                                    <input type="text" placeholder="GST Number" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <hr>
                                    <h4>Address Details</h4>
                                    <hr>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gender">Address <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Full Address" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State <span class="text-danger">*</span></label>
                                    <select class="form-control" name="state" id="state">
                                        <option value="">-- Choose State -- </option>
                                        <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chattisgarh">Chattisgarh</option>
                                        <option value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
                                        <option value="Daman &amp; Diu">Daman &amp; Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Poducherry">Poducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Pincode  <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Pincode" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success" type="submit">{{__("Submit")}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection