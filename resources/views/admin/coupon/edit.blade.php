@extends('admin.master')
@section('category') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item">Coupon</span>
        <span class="breadcrumb-item active">Edit</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        Edit Coupon
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('admin.update.coupon', $coupon->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" />
                            <div class="form-group">
                            <label for="name">Coupon Name</label>
                                <input type="text" name="coupon" id="name" value="{{$coupon->coupon}}" class="form-control @error('category_name') is-invalid @enderror" required>
                                @error('coupon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validity">Coupon Validity</label>
                                <select name="validity" id="validity" class="form-control">
                                    <option value="0" @if ($coupon->validity == 0) selected @endif>Inactive</option>
                                    <option value="1" @if ($coupon->validity == 1) selected @endif>Active</option>
                                </select>
                                    @error('validity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
