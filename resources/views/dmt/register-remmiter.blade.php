@extends('layouts.app')
@section('title', 'DMT / Money Transfer')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <form>
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="d-flex header-title justify-content-between">
                                    <h5 class="card-title">Enter the mobile number / Account number below and proceed.</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-warning">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Customer Mobile Number</label>
                                        <input type="number" readonly min="0" class="form-control"
                                            placeholder="Enter 10 digit customer mobile number" value="{{ $phone }}"
                                            pattern="[0-9]{10,10}" title="10 Digit Mobile Number" maxlength="10">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary" disabled>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <div class="d-flex header-title justify-content-between">
                                    <h5 class="card-title">Register Remmiter </h5>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <input type="hidden" name="stateresp" value="{{ $stateresp }}">
                                    <div class="col-md-6 mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="lname" placeholder="First Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Mobile Number</label>
                                        <input type="number" readonly min="0" class="form-control" placeholder="Enter 10 digit mobile number" name="phone" value="{{ $phone }}" pattern="[0-9]{10,10}" title="10 Digit Mobile Number" maxlength="10">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">OTP</label>
                                        <input type="number" min="0" class="form-control" name="otp" placeholder="6 Digit Number OTP">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Pin Code</label>
                                        <input type="number" min="0" class="form-control" name="pin_code" placeholder="6 Digit Number Pin Code">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" class="form-control" name="dob" placeholder="Date Of Birth">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
