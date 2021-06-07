<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.add', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|max:255',
            'category_id' => 'required|max:255',
            'brand_id' => 'required|max:255',
            'long_discription' => 'required',
            'short_discription' => 'required',
            'status' => 'required',
            'image_one' => 'required|mimes:jpg,jpeg,png,gif',
            'image_two' => 'mimes:jpg,jpeg,png,gif',
            'image_three' => 'mimes:jpg,jpeg,png,gif',
        ],[
            'category_id.required' => 'Select category...',
            'brand_id.required' => 'Select brand...',
            'status.required' => 'Select status...'
        ]);

        if(!empty($request->file('image_one'))){
            $image_one = $request->file('image_one');
            $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(300,400)->save('fontend/img/product/'.$name_gen);
            $img_url1 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_two'))){
            $image_two = $request->file('image_two');
            $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(300,400)->save('fontend/img/product/'.$name_gen);
            $img_url2 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_three'))){
            $image_three = $request->file('image_three');
            $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(300,400)->save('fontend/img/product/'.$name_gen);
            $img_url3 = 'fontend/img/product/'.$name_gen;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
