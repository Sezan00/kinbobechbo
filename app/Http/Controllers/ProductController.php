<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\FeatureValues;
use App\Models\Category;
Use App\Models\ProductEntity;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Gate;
class ProductController extends Controller
{
  public function store(Request $request, $slug) {
        // return $request->all();
        // return dd($request->all());
        //  dd($request->file('images'));
    $request->validate([
        'condition' => 'required|in:new,used',
        'authenticity'  => 'required|in:original,refurbished',
        'brand_name'=> 'required',
        'model_id' => 'required|string',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'phone_number' => 'required|regex:/^01[0-9]{9}$/',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'features' => 'nullable|array',
        'features.*' => 'exists:features,id',
    ]);

       

     try {
         if($request->has('image')){
            $file = $request->file('image');
            $extension = $file ->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $path = 'product/uploads/';
            $file->move($path, $filename);
        }
        $category = Category::where('slug', $slug)->firstOrFail();

  
        $brand = Brand::find($request->brand_name);


        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth('web')->id(),
            'price' => $request->price,
            'image'=> $path . $filename,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'condition' => $request->condition,
            'authenticity' => $request->authenticity, 
            'model_id' => $request->model_id,
            'negotiable' => $request->has('negotiable') ? true : false,
            'phone_number' => $request->phone_number,
            'terms' => 'accepted',
        ] ,[
            'terms.accepted' => 'You must accept the Terms and Conditions.',
        ] );

        $entitis=[];

 if ($request->has('entity') && is_array($request->entity)) {
    $entitis = [];

    foreach ($request->entity as $key => $entity) {
        $entitis[] = [
            'product_id' => $product->id,
            'type'       => $entity,
            'value'      => $request->entity_value[$key] ?? null,
        ];
    }

    if (!empty($entitis)) {
        ProductEntity::insert($entitis);
    }
    }

//    if ($request->hasFile('images')) {
//     foreach ($request->file('images') as $image) {
//         $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//         $path = $image->storeAs('products', $filename, 'public');

//         ProductImage::create([
//             'product_id' => $product->id,
//             'image_path' => $path, 
            
//         ]);
//         }
//       }
 

        if ($request->filled('features')) {
            foreach ($request->features as $feature) {
                FeatureValues::create([
                    'product_id' => $product->id,
                    'feature_id' => $feature,
                ]);
            }
        }
    } catch (\Throwable $th) {
        return response()->json($th->getMessage());
    }
      
    return redirect()->back()->with('success', 'Your post has been submitted.');
}


    public function ProductListShow(){
        $products = Product::with('category')->get();
        return view('product.product-list-show', compact('products'));
    }


    public function ProductShow($id){

        $product = Product::with('category', 'brand', 'model', 'features', 'entities', 'image')->findOrFail($id);
         $imageUrls = $product->images->map(function ($img) {
        return asset('storage/products/' . $img->image_path); 
    });

        return view('product.product-show', compact('product', 'imageUrls'));
    }

    public function PosterEditHisProduct(string $id){
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        return view('user.prodcut-edit', compact('product'));
    }


    public function UpdateProduct(Request $request, string $id){
        $product = Product::findOrFail($id);
        // Gate::authorize('update', $product);
        $request->validate([
            'title' => 'required|string',
            'description'=> 'required|string',
            'price'=> 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'title' => $request->title,
            'description'=> $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Your Data has been updated');

    }

    public function destroy(string $id){
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);
        $product->delete();
        return redirect()->route('user.account')->with('deleted', 'your data has been deleted');
    }


    public function CategoryShowProduct($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $products = $category->products()->latest()->get();

        return view('product.category-to-product', compact( 'category','products'));
    }
}
