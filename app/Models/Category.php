<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Brand;


class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function features(){
        return $this->hasMany(Feature::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function brands(){
        return $this->hasMany(Brand::class);
    }
}
