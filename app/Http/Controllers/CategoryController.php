<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CategoryController extends Controller
{
    public function CategoryShow(){
        $categories = Category::all();

        return view('category.category_upload', compact('categories'));
    }

    public function CategoryCreate(){
        // if(!FacadesAuth::guard('panel')->user()->can('cacreateCategory', Category::class)){
        //     abort(403);
        // }
        //  $categories = Category::all();
        $categories = Category::latest()->get();
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
        if(!FacadesAuth::guard('panel')->user()->can('delete', Category::class)){
            abort(403);
        }
        $categories = Category::findOrFail($id);
        
        $categories->delete();

        return redirect()->back()->with("delete", "Category Delete!");

    }

    public function categoryPageForUser(){
        $categories = Category::all();
        return view('category.category-wise-product', compact('categories'));
        
    }


}
