<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\ProductModel;
class ModelController extends Controller
{
    public function CategoryModelView(){

        $categories = Category::all();
        return view('brand.model-category', compact('categories'));
    }

    public function ModelCreatePageView($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('brand.model-view', compact('category'));
    }


    public function ModelStore(Request $request){
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'string|required',
        ]);

        ProductModel::create([
            'brand_id' => $request->brand_id,
            'name'     => $request->name,
        ]);
          return back()->with('success', 'Model added successfully!');
    }
}
