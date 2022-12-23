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
                                <h5 class="card-title">Add Recharge Plan</h5>
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
                                        <label for="">Plan Category</label>
                                        <select id="my-select" class="form-control" name="plan_category">
                                            <option value="">Select Plan Category</option>
                                            @foreach ($rechargeplancategories as $rechargeplancategory)
                                                <option value="{{ $rechargeplancategory->id }}">
                                                    {{ $rechargeplancategory->plan_category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Operator</label>
                                        <select id="my-select" class="form-control" name="operator">
                                            <option value="">Select Operator</option>
                                            @foreach ($operators as $operator)
                                                <option value="{{ $operator->id }}">
                                                    {{ $operator->name }}({{ $operator->category }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Validity</label>
                                        <input type="text" class="form-control" name="validity">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Data</label>
                                        <input type="text" class="form-control" name="data">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Circle</label>
                                        <input type="text" class="form-control" name="circle">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Price</label>
                                        <input type="number" class="form-control" name="price" min="10">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="">Description</label>
                                        <textarea class="form-control" max="200" name="desc" id="" rows="3"></textarea>
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
@section('scripts')
    <script>
        $("#title").on("input", function() {
            value = $(this).val();
            value = value.replace(/\s+/g, '-').toLowerCase();
            value = value.replace(/[^0-9a-zA-Z-]/g, "");
            value = value.toLowerCase();
            $("#link").val(value);
        });
    </script>
@endsection
