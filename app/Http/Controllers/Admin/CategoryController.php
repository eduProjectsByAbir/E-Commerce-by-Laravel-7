<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    // store category
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Category Successfully Added!');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required',
            'status' => 'required'
        ]);

        Category::find($id)
        ->update([
            'category_name' => $request->category_name,
            'status' => $request->status
            ]);

        return redirect()->route('admin.category')->with('success', 'Category Edited Successfully!');
    }

    public function delete($id){
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.category')->with('success', 'Category Deleted Successfully!');
    }

}
