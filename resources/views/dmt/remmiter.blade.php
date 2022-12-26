@extends('layouts.app')
@section('title', 'Add Recharge Plan')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header ">
                            <div class="d-flex header-title justify-content-between">
                                <h5 class="card-title">Enter the mobile number / Account number below and proceed.</h5>
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
                            <form method="post" action="{{ route('recharge-plan.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">Validity</label>
                                        <input type="text" class="form-control" placeholder="Enter 10 digit customer mobile number" name="mobile" pattern="[0-9]{10,10}" title="10 Digit Mobile Number" maxlength="10">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
