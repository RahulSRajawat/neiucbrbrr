@extends("layouts.app")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h5 class="card-title">Rent Payment</h5>
                            <span style="font-size: 11px;">Get Rent Receipt | Exciting Rewards | Instant Transfer</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="rent_form">

                            <div class="form-group">
                                <label class="form-label" for="pwd">Bank Account Number:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">IFSC Code:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Account Holder Name:</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Mobile Number (optional):</label>
                                <input type="text" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="pwd">Upload Rental Agrement (Optional):</label>
                                <input type="file" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <p><span class="text-warning">Note:</span>Please do not transfer rent to your own Bank Account , Mobile Number or UPI ID.</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Proceed</button>
                            <div class="form-group">
                                <p>By proceeding, you agree to Terms & Conditions</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    
                    <div class="card-body">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://assetscdn1.paytm.com/images/catalog/view_item/838651/1624612649385.png?impolicy=hq" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://assetscdn1.paytm.com/images/catalog/view_item/833356/1623659102840.jpg?impolicy=hq" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                       
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://assetscdn1.paytm.com/images/catalog/view_item/838651/1624612649385.png?impolicy=hq" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                       
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection