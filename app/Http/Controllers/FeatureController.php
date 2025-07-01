<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Feature;
class FeatureController extends Controller
{
    public function FeaturePageView(){
        $categories = Category::all();
        return view('admin.feature-add', compact('categories'));
    }

    public function FeatureInsurtDatabase(Request $request){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string'
        ]);

        $feature = Feature::where('category_id', $request->category_id)->where('name', $request->name)->first();
        if($feature)
            return back()->with('message', 'Feature already exist');

        Feature::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
        ]);
            return back()->with('success', 'Feature added to category!');

    }



    public function MobileFeature(){
        $features = Feature::all();

        return view('feature.mobile', compact('features'));
    }

}
