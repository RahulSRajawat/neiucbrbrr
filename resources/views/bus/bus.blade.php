@extends('layouts.app')
@section('title', 'Bus')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Business Loan Application Form</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form-wizard1" class="mt-3 text-center">
                                <ul id="top-tab-list" class="p-0 row list-inline">
                                    <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
                                        <a href="javascript:void();">
                                            <div class="iq-icon me-3">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20"
                                                    width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <span class="dark-wizard">Loan Details</span>
                                        </a>
                                    </li>
                                    <li id="personal" class="mb-2 col-lg-3 col-md-6 text-start">
                                        <a href="javascript:void();">
                                            <div class="iq-icon me-3">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20"
                                                    width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <span class="dark-wizard">Customers Details</span>
                                        </a>
                                    </li>
                                    <li id="payment" class="mb-2 col-lg-3 col-md-6 text-start">
                                        <a href="javascript:void();">
                                            <div class="iq-icon me-3">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20"
                                                    width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <span class="dark-wizard">Work Details</span>
                                        </a>
                                    </li>
                                    <li id="payment" class="mb-2 col-lg-3 col-md-6 text-start">
                                        <a href="javascript:void();">
                                            <div class="iq-icon me-3">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20"
                                                    width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <span class="dark-wizard">Upload Documents</span>
                                        </a>
                                    </li>
                                    <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
                                        <a href="javascript:void();">
                                            <div class="iq-icon me-3">
                                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20"
                                                    width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <span class="dark-wizard">Finish</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card text-start">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Loan Details</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 1 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Applied Loan Amount: *</label>
                                                    <input type="number" class="form-control" name="amount"
                                                        placeholder="Amount" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Occupation: *</label>
                                                    <input type="text" class="form-control" name="uname"
                                                        placeholder="Occupation" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next"
                                        class="btn btn-primary next action-button float-end" value="Next">Next</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-start">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Customers Details</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 2 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Full Name: *</label>
                                                    <input type="text" class="form-control" name="fname"
                                                        placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Contact Number: *</label>
                                                    <input type="text" class="form-control" name="lname"
                                                        placeholder="Number" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Email Id: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Email Id" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Address: *</label>
                                                    <input type="text" class="form-control" name="phno_2"
                                                        placeholder="Alternate Contact No." />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Pincode: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Pincode" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">State: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="State" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">District: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="District" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pwd">Customer Marital
                                                        Status:</label>
                                                    <select class="form-select mb-3 shadow-none">
                                                        <option selected="">Select </option>
                                                        <option value="1">Single</option>
                                                        <option value="2">Married</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer DOB: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="DOB" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Customer Gender: *</label>
                                                    <select class="form-select mb-3 shadow-none">
                                                        <option selected="">Select </option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="2">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ownership of Home: *</label>
                                                    <select class="form-select mb-3 shadow-none">
                                                        <option selected="">Select </option>
                                                        <option value="1">Owned</option>
                                                        <option value="2">Rented</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Duration of Staying : *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Duration" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Agent Referal Id: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Id" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next"
                                        class="btn btn-primary next action-button float-end" value="Next">Next</button>
                                    <button type="button" name="previous"
                                        class="btn btn-dark previous action-button-previous float-end me-1"
                                        value="Previous">Previous</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-start">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Work Details:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 3 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office Name/Company Name/Shop Name :
                                                        *</label>
                                                    <input type="text" class="form-control" name="fname"
                                                        placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Ownership of Company: *</label>
                                                    <select class="form-select mb-3 shadow-none">
                                                        <option selected="">Select </option>
                                                        <option value="1">Owned</option>
                                                        <option value="2">Rented</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office Address: *</label>
                                                    <input type="text" class="form-control" name="lname"
                                                        placeholder="Address" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office Pincode: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Pincode" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office State : *</label>
                                                    <input type="text" class="form-control" name="phno_2"
                                                        placeholder="State" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office District : *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="District" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Office Email Id: *</label>
                                                    <input type="text" class="form-control" name="phno"
                                                        placeholder="Email" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next"
                                        class="btn btn-primary next action-button float-end"
                                        value="Submit">Submit</button>
                                    <button type="button" name="previous"
                                        class="btn btn-dark previous action-button-previous float-end me-1"
                                        value="Previous">Previous</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-start">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Document Details:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 4 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Aadhaar Card:</label>
                                                    <input type="file" class="form-control" name="pic"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">PAN Card:</label>
                                                    <input type="file" class="form-control" name="pic-2"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Passport size photo:</label>
                                                    <input type="file" class="form-control" name="pic-3"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">ITR:</label>
                                                    <input type="file" class="form-control" name="pic-4"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Rent Agreement:</label>
                                                    <input type="file" class="form-control" name="pic-5"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Bank Statement:</label>
                                                    <input type="file" class="form-control" name="pic-6"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Business Registration Proof(GST / Trade
                                                        Licence / MSME / Gumasta):</label>
                                                    <input type="file" class="form-control" name="pic-7"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" name="next"
                                            class="btn btn-primary next action-button float-end"
                                            value="Submit">Submit</button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-end me-1"
                                            value="Previous">Previous</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-start">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">Document Details:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">Step 5 - 5</h2>
                                            </div>
                                        </div>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h3 class="mb-4 text-left">Finish:</h3>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 5 - 5</h2>
                                                </div>
                                            </div>
                                            <br><br>
                                            <h2 class="text-center text-success"><strong>SUCCESS !</strong></h2>
                                            <br>
                                            <div class="row justify-content-center">
                                                <div class="col-3"> <img src="../../assets/images/pages/img-success.png"
                                                        class="img-fluid" alt="fit-image"> </div>
                                            </div>
                                            <br><br>
                                            <div class="row justify-content-center">
                                                <div class="text-center col-7">
                                                    <h5 class="text-center purple-text">You Have Successfully Signed Up
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-end me-1"
                                            value="Previous">Previous</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
