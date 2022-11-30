@extends("layouts.app")
@section("title","View Invoice")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" >
                <div class="card-body">
                    <div id="print_invoice">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="mb-2">Invoice #{{$invoice->invoice_number}}</h4>
                                <h5 class="mb-3">Hello , {{ucwords($invoice->users->name)}} </h5>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <div class="table-responsive-lg">
                                    <table class="table table-striped table_style">
                                        <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Price</th>
                                                <th class="text-center" scope="col">Quantity</th>
                                                <th class="text-center" scope="col">Totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $count= 1;
                                            $total_items = count($carts);
                                            $totalprice = 0;
                                            @endphp
                                            @foreach($carts as $cart)
                                            <tr class="cart-itemt-{{$count}}">
                                                <td><img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('uploads/products/'. $cart->product->image)}}" alt="profile" /></td>
                                                <td>{{$cart->product->title}}</td>
                                                <td>₹{{number_format($cart->product->price)}}</td>
                                                <td>{{$cart->product_quantity}}</td>
                                                @php
                                                $totalprice += ($cart->product_quantity*$cart->product->price);
                                                @endphp
                                                <td>₹{{number_format(($cart->product_quantity*$cart->product->price))}}</td>
                                            </tr>
                                            @php
                                            $count++;
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">Grand Total</h6>
                                                </td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"><b>₹{{number_format($totalprice,2)}}</b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="mb-0 mt-4">
                                    <svg width="30" class="text-primary mb-3 me-2" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                                    </svg>
                                    It is a long established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
                                    as opposed to using 'Content here, content here', making it look like readable English.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-primary" onclick="printContent('print_invoice')">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    function printContent(el) {
        var printContents = document.getElementById(el).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
    }
</script>
@endsection