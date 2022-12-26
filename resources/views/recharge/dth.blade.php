@extends('layouts.app')
@section('title', 'Recharge Prepaid')
@section('content')
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h5 class="card-title">DTH Mobile Recharge</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alerts"></div>
                            <form class="recharge_form" id="add" method="post"
                                action="{{ route('recharge.prepaid-store') }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="pwd">Operator:</label>
                                    <select class="form-select mb-3 shadow-none" name="operator">
                                        <option selected="" value="">Select Your Operator</option>
                                        @foreach ($operators as $operator)
                                            @if ($operator->category == 'DTH')
                                                <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="customer_id">Customer ID:</label>
                                    <input type="text" class="form-control" id="customer_id" name="customer_id">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="pwd">Recharge Amount:</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                                <button type="submit"
                                    class="btn btn-outline-primary rounded-pill btn-sbmit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h5 class="card-title">DTH Recharge Plans</h5>
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
