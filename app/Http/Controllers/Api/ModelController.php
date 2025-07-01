<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function get($id) {
        $brand = Brand::with('models')->where('id', $id)->first();

        if(!$brand)
            return response()->json([
                                'message' => 'Not found!'
                            ], 404);

        return response()->json([
            'data' => $brand->models
        ]);
    }
}
