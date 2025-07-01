<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\FeatureValues;
use App\Models\Brand;
use App\Models\ProductModel;

class MobileController extends Controller
{
    // public function UploadMobileProduct(){
    //     return view('welcome');
    // }


    public function showUploadForm($category ) {

    $category = Category::where('slug', $category)->first();
    $features = Feature::where('category_id', $category->id)->get();
    $brands = Brand::with('models')->where('category_id', $category->id)->get();
    if(!$category)
        abort(404);

        

    return view('welcome', ['category' => $category, 'features' => $features, 'brands' => $brands]);
   }


    public function ProductUpload(Request $request){
       


}
}
