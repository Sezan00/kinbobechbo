<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;

class BrandController extends Controller
{
    public function BrandpageSHow(){
        $categories = Category::all();
        return view('model.model-create', compact('categories'));
    }

    public function BrandIsertDb(Request $request){
        $request->validate([
            'name' => 'required|string',
           'category_id' => 'required|exists:category,id',
        ]);

        Brand::create([
            'name' => $request->name,
            'category_id'=> $request->category_id
        ]);
        return redirect()->back()->with('success', 'Brand Added!');
    }


    public function categoriesShow(){
        $categories = Category::all();
        return view('brand.category-show', compact('categories'));
    }

    public function BrandView($slug){
        $category =  Category::where('slug', $slug)->with('brands')->firstOrFail();
        return view('brand.index', compact('category'));
    }

    public function BrandDelete($id){
        $brands = Brand::findOrFail($id);

        $brands->delete();
        
        return redirect()->back()->with('Delete', 'Brand Delete!');
    }


    public function showOptions($slug) {
    $category = Category::where('slug', $slug)->with('brands')->firstOrFail();

   
    $viewMap = [
        'car' => 'brand.mobile',
        'laptop' => 'brand.car',
        'mobile' => 'brand.laptop',
    ];

    if (!array_key_exists($slug, $viewMap)) {
        abort(404);
    }

    return view($viewMap[$slug], compact('category'));
    }

}
