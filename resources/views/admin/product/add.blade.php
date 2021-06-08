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
            <h6 class="card-body-title">Add Product</h6>
            <p class="mg-b-20 mg-sm-b-30"></p>
            <form action="{{ route('admin.add.product') }}" method="post" enctype="multipart/form-data"> @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" value="{{ old('name') }}" name="name"
                                placeholder="Enter product name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="code" value="{{ old('code') }}"
                                placeholder="Enter product code">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}"
                                placeholder="enter quantity">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="price" value="{{ old('price') }}"
                                placeholder="enter price">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-control-label">Short Description: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="short_discription"
                                value="{{ old('short_discription') }}" placeholder="enter short description">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Status: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="status" data-placeholder="Choose Status">
                                <option label="Choose status"></option>
                                <option value="1">Approved</option>
                                <option value="0">Pending</option>
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="brand_id" data-placeholder="Choose Status">
                                <option label="Choose brand"></option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <label class="form-control-label">Enter Description: <span class="tx-danger">*</span></label>
                        <div class="form-group mg-b-10-force">
                            <textarea rows="7" name="long_discription" class="form-control summernote" placeholder="Enter your address"></textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Select Thumbnails: <span class="tx-danger">*</span></label>
                            <input type="file" class="form-control" id="product_image" name="image_one">
                            <input type="file" class="form-control" name="image_two">
                            <input type="file" class="form-control" name="image_three">
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="form-layout-footer m-auto">
                    <button class="btn btn-info mg-r-5">Add Product</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            </form>
        </div><!-- card -->
    </div>
</div>
@endsection
