@extends('admin.master')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Category</h6>
                    <br>
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap table-striped table-bordered">
                        <thead>
                          <tr>
                            <th class="wd-5p">ID</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-15p">Category Status</th>
                            <th class="wd-20p">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    @if ($category->status == 0)
                                    <span class="badge badge-danger">Pending</span>
                                    @else
                                    <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit.category', $category->id) }}" class="btn-btn-sm btn-success p-1">Edit</a>
                                    <a href="{{ route('admin.delete.category', $category->id) }}" id="delete" class="btn-btn-sm btn-danger p-1">Delete</a>
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
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('admin.add.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="category_name" id="name" placeholder="Enter Category Name" class="form-control @error('category_name') is-invalid @enderror" required>
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
