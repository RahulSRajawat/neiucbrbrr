@extends("layouts.app")
@section("title","Thank You")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row justify-content-center">
                        <div class="col-md-8 mx-auto text-center">
                            <div class="col-md-4 mx-auto mb-3">
                                <img src="{{asset('uploads/lottie/thank-you.gif')}}" class="img-fluid" alt="">
                            </div>
                            <h2 class="text-primary mb-3">Order Successful</h2>
                            <p>Your Order Will Be Delivered On Time <br> Thank You!</p>
                            <div class="row justify-content-between">
                                <div class="col-md-5">
                                    <a href="{{route('retailer.dashboard')}}" class="btn btn-primary">Back To Dashbaord</a>
                                </div>
                                <div class="col-md-5">
                                    <a href="{{route('all-product.view')}}" class="btn btn-primary">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection