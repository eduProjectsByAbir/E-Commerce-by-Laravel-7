@extends('admin.master')
@section('brand') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item">Brand</span>
        <span class="breadcrumb-item active">Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        Edit Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('admin.update.brand', $brand->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="form-group">
                            <label for="name">Brand Name</label>
                                <input type="text" name="name" id="name" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Brand Status</label>
                                <select name="status" id="stauts" class="form-control">
                                    <option value="0" @if ($brand->status == 0) selected @endif>Pending</option>
                                    <option value="1" @if ($brand->status == 1) selected @endif>Active</option>
                                </select>
                                    @error('category_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
