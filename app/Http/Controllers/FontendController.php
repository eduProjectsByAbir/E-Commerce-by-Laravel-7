<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function index(){
        $categories = Category::where('status', 1)->latest()->get();
        $products = Product::where('status', 1)->latest()->get();
        $products_latest = Product::where('status', 1)->latest()->limit(3);
        return view('pages.index', compact('products', 'categories', 'products_latest'));
    }
}
