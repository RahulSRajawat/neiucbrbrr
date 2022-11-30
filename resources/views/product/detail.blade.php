@extends("layouts.app")
@section("title","Product Detail")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('uploads/products/'.$product->image)}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ucwords($product->title)}}</h2>
                        <h5>Price: ₹{{$product->price}}</h5>
                        <p>{{base64_decode($product->description)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection