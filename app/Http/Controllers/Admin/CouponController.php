<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function store(Request $request){
        $request->validate([
            'coupon' => 'required|unique:coupons,coupon',
            'validity' => 'required'
        ]);

        Coupon::insert([
            'coupon' => $request->coupon,
            'validity' => $request->validity
        ]);


        return redirect()->back()->with('success', 'Coupon Successfully Added!');

    }


    public function edit($id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'coupon' => 'required',
            'validity' => 'required'
        ]);

        Coupon::find($id)
        ->update([
            'coupon' => $request->coupon,
            'validity' => $request->validity
            ]);

        return redirect()->route('admin.coupons')->with('success', 'Coupon Edited Successfully!');
    }

    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        return redirect()->route('admin.coupons')->with('success', 'Coupon Deleted Successfully!');
    }
}
