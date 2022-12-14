@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Postpaid Mobile Recharge</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label" for="email">Postpaid Mobile Number:</label>
                                <input type="text" class="form-control" id="mnumber">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Operator:</label>
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select Your Operator</option>
                                    <option value="1">BSNL</option>
                                    <option value="2">AIRTEL</option>
                                    <option value="3">Jio</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Circle:</label>
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select Your Circle</option>
                                    <option value="1">Mp</option>
                                    <option value="2">Up</option>
                                    <option value="3">Bihar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Recharge Amount:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="checkbox mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-danger">cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">POSTPAID COMMENT</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            hello
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
