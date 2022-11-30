@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Gas Bill Payment </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Operator:</label>
                                <select class="form-select mb-3 shadow-none">
                                    <option selected="">Select Your Operator</option>
                                    <option value="1">RELINCE</option>
                                    <option value="2">INDIA </option>
                                    <option value="3">BHARAT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Consumer Account Number:</label>
                                <input type="text" class="form-control" id="mnumber">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Bill Amount:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">charge:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Cycle Unit:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd"> Date:</label>
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
                            <h4 class="card-title">GAS COMMENT</h4>
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