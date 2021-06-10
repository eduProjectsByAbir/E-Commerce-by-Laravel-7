@extends('admin.master')
@section('product') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Product</h6>
            <p class="mg-b-20 mg-sm-b-30"></p>
            <form action="{{ route('admin.update.product', $product->id) }}" method="post" enctype="multipart/form-data"> @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" value="{{ $product->name }}" name="name"
                                placeholder="Enter product name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="code" value="{{ $product->code }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="quantity" value="{{ $product->quantity }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="price" value="{{ $product->price }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-control-label">Short Description: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="short_discription"
                                value="{{ $product->short_discription }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Status: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="status" data-placeholder="Choose Status">
                                <option label="Choose status"></option>
                                <option value="1" @if (1 == $product->status) selected @endif>Approved</option>
                                <option value="0" @if (0 == $product->status) selected @endif>Pending</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="brand_id" data-placeholder="Choose Status">
                                <option label="Choose brand"></option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Choose Status" name="category_id">
                                <option label="Choose category"></option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"  @if ($category->id == $product->category_id) selected @endif>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <label class="form-control-label">Enter Description: <span class="tx-danger">*</span></label>
                        <div class="form-group mg-b-10-force">
                            <textarea rows="9" name="long_discription" class="form-control summernote"> {{$product->long_discription}} </textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Select Thumbnails: <span class="tx-danger">*</span></label> <br>
                            <img src="{{ asset($product->image_one) }}" alt="" width="50px" height="50px"> <span><img src="{{ asset($product->image_two) }}" alt="" width="50px" height="50px"></span> <span><img src="{{ asset($product->image_three) }}" alt="" width="50px" height="50px"></span>
                            <input type="file" class="form-control" id="product_image" name="image_one">
                            <input type="file" class="form-control" name="image_two">
                            <input type="file" class="form-control" name="image_three">
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="form-layout-footer m-auto">
                    <button class="btn btn-info mg-r-5">Update Product</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            </form>
        </div><!-- card -->
    </div>
</div>
@endsection
