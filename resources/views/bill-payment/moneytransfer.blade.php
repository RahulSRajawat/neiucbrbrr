@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Money Transfer (Sender Login)</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label" for="email">Mobile Number:</label>
                                <input type="text" class="form-control" id="mnumber">
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
                            <h4 class="card-title"> COMMENT</h4>
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