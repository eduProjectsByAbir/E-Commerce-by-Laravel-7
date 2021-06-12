@extends('admin.master')
@section('coupon') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">All Coupon</h6>
                    <br>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-15p">Coupon</th>
                                    <th class="wd-15p">Status</th>
                                    <th class="wd-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>
                                    <td>{{ $coupon->coupon }}</td>
                                    <td>
                                        @if ($coupon->validity == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @else
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit.coupon', $coupon->id) }}"
                                            class="btn-btn-sm btn-success p-1">Edit</a>
                                        <a href="{{ route('admin.delete.coupon', $coupon->id) }}" id="delete"
                                            class="btn-btn-sm btn-danger p-1">Delete</a>
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
                        Add Coupon
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('admin.add.coupons') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Coupon Name</label>
                                <input type="text" name="coupon" id="name" placeholder="Enter Coupon Name"
                                    class="form-control @error('coupon') is-invalid @enderror" required>
                                @error('coupon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validity">Coupon validity</label>
                                <select name="validity" id="validity" class="form-control @error('validity') is-invalid @enderror" required>
                                    <option value="">Select validity</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('validity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
