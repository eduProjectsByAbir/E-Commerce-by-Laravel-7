<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use File;
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
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
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
            Image::make($image_one)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url1 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_two'))){
            $image_two = $request->file('image_two');
            $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url2 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_three'))){
            $image_three = $request->file('image_three');
            $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url3 = 'fontend/img/product/'.$name_gen;
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = str_replace(' ', '-', $request->name);
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->short_discription = $request->short_discription;
        $product->long_discription = $request->long_discription;
        $product->price = $request->price;

        if(!empty($request->file('image_one'))){
            $product->image_one = $img_url1;
        }
        if(!empty($request->file('image_two'))){
            $product->image_two = $img_url2;
        }
        if(!empty($request->file('image_three'))){
            $product->image_three = $img_url3;
        }
        $product->status = $request->status;
        $product->created_at = Carbon::now();
        $product->save();

        return redirect()->route('admin.view.product')->with('success', 'Product Added Successfully!');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands'));
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
            'image_one' => 'mimes:jpg,jpeg,png,gif',
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
            Image::make($image_one)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url1 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_two'))){
            $image_two = $request->file('image_two');
            $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url2 = 'fontend/img/product/'.$name_gen;
        }
        if(!empty($request->file('image_three'))){
            $image_three = $request->file('image_three');
            $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('fontend/img/product/'.$name_gen);
            $img_url3 = 'fontend/img/product/'.$name_gen;
        }

        $product = Product::findOrFail($id);

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->short_discription = $request->short_discription;
        $product->long_discription = $request->long_discription;
        $product->price = $request->price;

        if(!empty($request->file('image_one'))){
            $product->image_one = $img_url1;
        }
        if(!empty($request->file('image_two'))){
            $product->image_two = $img_url2;
        }
        if(!empty($request->file('image_three'))){
            $product->image_three = $img_url3;
        }

        $product->status = $request->status;
        $product->save();

        return redirect()->route('admin.view.product')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (File::exists($product->image_one)) {
            unlink($product->image_one);
        }

        if (File::exists($product->image_two)) {
            unlink($product->image_two);
        }

        if (File::exists($product->image_three)) {
            unlink($product->image_three);
        }

        $product->delete();

        return redirect()->route('admin.view.product')->with('success', 'Product Deleted Successfully!');
    }
}
