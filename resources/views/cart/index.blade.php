@extends("layouts.app")
@section("title","Cart")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">Cart</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <form action="{{route('cart.update')}}" method="post">
                            @csrf
                            <div class="table-responsive resp mb-3">
                                <table id="datatable" class="table table-striped table_style" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
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
                                            <td>{{$count}}</td>
                                            <td><a href="{{$cart->product->link}}"><img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="{{asset('uploads/products/'. $cart->product->image)}}" alt="profile" /></a></td>
                                            <td><a href="{{$cart->product->link}}">{{$cart->product->title}}</a></td>
                                            <td>₹{{number_format($cart->product->price)}}</td>
                                            <td>
                                                <input type="hidden" name="id[]" value="{{$cart->id}}">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" data-uniqid="{{$count}}" class="quantity-left-minus minus-quantity-{{$count}} btn btn-outline-primary px-3 btn-number" data-type="minus" data-field="quantity-{{$count}}">
                                                            <span class="fa fa-minus"></span>
                                                        </button>
                                                    </span>
                                                    <input type="text" readonly id="quantity-{{$count}}" name="quantity[]" class="form-control input-number" value="{{$cart->product_quantity}}" min="1" max="100">
                                                    <span class="input-group-btn">
                                                        <button type="button" data-uniqid="{{$count}}" class="quantity-right-plus plus-quantity-{{$count}} btn btn-outline-primary px-3 btn-number" data-type="plus" data-field="quantity-{{$count}}">
                                                            <span class="fa fa-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>
                                            @php
                                            $totalprice += ($cart->product_quantity*$cart->product->price);
                                            @endphp
                                            <td>₹{{number_format(($cart->product_quantity*$cart->product->price))}}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('cart.destroy',$cart->id)}}">
                                                        <span class="btn-inner">
                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                        $count++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-3">
                                    @if($total_items < 1) <a href="{{route('all-product.view')}}" class="btn btn-primary  btn-sm">Continue Shopping</a>
                                        @else
                                        <button class="btn btn-primary  btn-sm" type="submit"> Update Quantity</button>
                                        @endif
                                </div>
                                <div class="col-md-3 text-end">
                                    <p class=""><strong>Grand Total :</strong> ₹ <span>{{number_format($totalprice,2)}}</span></p>
                                    @if($total_items < 1) <button class="btn btn-primary  btn-sm " disabled type="button">Process To Checkout</button>
                                        @else
                                        <a href="{{route('cart.checkout')}}" class="btn btn-primary btn-sm">Process To Checkout</a>
                                        @endif
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
@section("scripts")
<script>
    $('.btn-number').click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        count = $(this).attr("data-uniqid");
        type = $(this).attr('data-type');
        var input = $("input[id='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {
                if (currentVal > input.attr('min')) {
                    $('.plus-quantity-' + count).attr('disabled', false);
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }
            } else if (type == 'plus') {
                if (currentVal < input.attr('max')) {
                    $('.minus-quantity-' + count).attr('disabled', false);
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }
            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            toastr["warning"]('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            toastr["warning"]('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
@endsection