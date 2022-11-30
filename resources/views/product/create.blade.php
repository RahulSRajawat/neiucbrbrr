@extends("layouts.app")
@section("title","Add Product")
@section("content")
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex header-title justify-content-between">
                            <h5 class="card-title">Add Product</h5>
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
                        <form method="post" action="{{route('all-product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">link</label>
                                    <input type="text" class="form-control" name="link" id="link" readonly>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Stock</label>
                                    <input type="number" class="form-control" name="stock">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Short Description</label>
                                    <textarea class="form-control" max="200" name="short_desc" id="" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="desc" id="" rows="3"></textarea>
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