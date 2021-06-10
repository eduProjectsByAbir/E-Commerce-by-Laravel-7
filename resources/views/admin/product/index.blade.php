@extends('admin.master')
@section('products') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Products</h6>
                    <br>
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap table-striped table-bordered">
                        <thead>
                          <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Price</th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ asset($product->image_one) }}" alt="" width="50px" height="50px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product['category']['category_name'] }}</td>
                                <td>{{ $product['brand']['name'] }}</td>
                                <td>{{ $product->price }} ৳</td>
                                <td>{{ $product->quantity }} Pics</td>
                                <td>
                                    @if ($product->status == 0)
                                    <span class="badge badge-danger">Pending</span>
                                    @else
                                    <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit.product', $product->id) }}" class="btn-btn-sm btn-success p-1">Edit</a>
                                    <a href="{{ route('admin.delete.product', $product->id) }}" id="delete" class="btn-btn-sm btn-danger p-1">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div><!-- table-wrapper -->
                  </div><!-- card -->
            </div>
        </div>
    </div>
</div>
@endsection
