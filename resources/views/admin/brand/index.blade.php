@extends('admin.master')
@section('brand') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Brand</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Brands</h6>
                    <br>
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap table-striped table-bordered">
                        <thead>
                          <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-20p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @if ($brand->status == 0)
                                    <span class="badge badge-danger">Pending</span>
                                    @else
                                    <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit.brand', $brand->id) }}" class="btn-btn-sm btn-success p-1">Edit</a>
                                    <a href="{{ route('admin.delete.brand', $brand->id) }}" id="delete" class="btn-btn-sm btn-danger p-1">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div><!-- table-wrapper -->
                  </div><!-- card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('admin.add.brand') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Brand Name" class="form-control @error('category_name') is-invalid @enderror" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
