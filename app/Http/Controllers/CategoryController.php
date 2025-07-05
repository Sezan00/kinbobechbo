<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryShow(){
        $categories = Category::all();

        return view('category.category_upload', compact('categories'));
    }

    public function CategoryCreate(){
         $categories = Category::all();
        return view('category.category_create', compact('categories'));
    }

    public function CategoryInsertDatabse(Request $request){
        $request->validate([
            'name' => 'string|required',
            'slug' => 'nullable|string',
        ]);
        category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->back()->with("success", "Category Added!");
    }

    public function CategoryDelete($id){
        $categories = Category::findOrFail($id);
        
        $categories->delete();

        return redirect()->back()->with("delete", "Category Added!");

    }

    public function categoryPageForUser(){
        $categories = Category::all();

        return view('category.category-wise-product', compact('categories'));
        
    }


}
