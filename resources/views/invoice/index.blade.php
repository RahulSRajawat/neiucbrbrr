@extends("layouts.app")
@section("title","Invoice")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">Invoice</h5>
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
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="table-responsive resp mb-3">
                            <table id="datatable" class="table table-striped table_style" data-toggle="data-table">
                                <thead>
                                    @if(Auth::user()->roles->name == "Admin")
                                    <tr>
                                        <th>Sr no</th>
                                        <th>Invoice Number</th>
                                        <th>User Details</th>
                                        <th>Invoice Method</th>
                                        <th>Invoice Total</th>
                                        <th>Track Number</th>
                                        <th>Invoice Status</th>
                                        <th>Invoice View</th>
                                    </tr>
                                    @elseif(Auth::user()->roles->name == "Retailer")
                                    <tr>
                                        <th>Sr no</th>
                                        <th>Invoice Number</th>
                                        <th>Invoice Method</th>
                                        <th>Invoice Total</th>
                                        <th>Track Number</th>
                                        <th>Invoice Status</th>
                                        <th>Invoice View</th>
                                    </tr>
                                    @endif
                                </thead>
                                <tbody>
                                    @php
                                    $count= 1;
                                    @endphp
                                    @foreach($invoices as $invoice)
                                    @if(Auth::user()->roles->name == "Admin")
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$invoice->invoice_number}}</td>
                                        <td>{{$invoice->users->name}}</td>
                                        <td>{{$invoice->payment_method}}</td>
                                        <td>₹{{number_format($invoice->grand_total,2)}}</td>
                                        <td>
                                            <input class="form-control" type="hidden" id="copy-{{$count}}" value="{{$invoice->track_number}}" readonly>
                                            <button class="btn btn-primary btn-sm" type="button" onclick="copy_track('{{$count}}')"><i class="fa fa-clipboard"></i> Copy Track Number</button>
                                        </td>
                                        @if($invoice->invoice_status == 'Completed')
                                        <td><span class="btn btn-sm btn-success">{{$invoice->invoice_status}}</span></td>
                                        @else
                                        <td><button type="button" onclick="opmodal('{{$count}}','{{$invoice->id}}')" class="btn btn-sm btn-{{($invoice->invoice_status == 'Shipped')?(($invoice->invoice_status == 'Completed')?'success':'warning'):'danger'}}">{{$invoice->invoice_status}}</button></td>
                                        @endif
                                        <td><a href="{{route('user-invoice.view',$invoice->invoice_number)}}" class="btn btn-primary btn-sm">View Invoice</a></td>
                                    </tr>
                                    <div id="my-modal-{{$count}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('invoice.status')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$invoice->id}}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="my-modal-title">Change Invoice Status</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="">Change Status</label>
                                                                <select name="status" id="status-{{$count}}" class="form-control">
                                                                    <option value="" selected disabled></option>
                                                                    <option value="Pending" {{($invoice->invoice_status == 'Pending')?'selected':''}}>Pending</option>
                                                                    <option value="Shipped" {{($invoice->invoice_status == 'Shipped')?'selected':''}}>Shipped</option>
                                                                    <option value="Completed" {{($invoice->invoice_status == 'Completed')?'selected':''}}>Completed</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->roles->name == "Retailer")
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$invoice->invoice_number}}</td>
                                        <td>{{$invoice->payment_method}}</td>
                                        <td>₹{{number_format($invoice->grand_total,2)}}</td>
                                        <td>
                                            <input class="form-control" type="hidden" id="copy-{{$count}}" value="{{$invoice->track_number}}" readonly>
                                            <button class="btn btn-primary btn-sm" type="button" onclick="copy_track('{{$count}}')"><i class="fa fa-clipboard"></i> Copy Track Number</button>
                                        </td>
                                        <td>
                                            @if($invoice->invoice_status == 'Completed')
                                            <span class="btn btn-sm btn-success">{{$invoice->invoice_status}}</span>
                                            @elseif($invoice->invoice_status == 'Shipped')
                                            <span class="btn btn-sm btn-warning">{{$invoice->invoice_status}}</span>
                                            @else
                                            <span class="btn btn-sm btn-danger">{{$invoice->invoice_status}}</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('invoice.view',$invoice->invoice_number)}}" class="btn btn-primary btn-sm">View Invoice</a></td>
                                    </tr>
                                    @endif
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    function opmodal(count) {
        $('#my-modal-' + count).modal('show');
    }
    function copy_track(count) {
        // Get the text field
        var copyText = document.getElementById("copy-" + count);
        // Select the text field
        // copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);
        // Alert the copied text
        toastr["success"]("Track number copied!");
    }
</script>
@endsection