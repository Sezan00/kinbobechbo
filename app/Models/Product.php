<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
Use App\Models\FeatureValues;
use App\Models\ProductEntity;
Use App\Models\ProductImage;

class Product extends Model
{
   use HasFactory;

   protected $fillable = [  
    'title',
    'user_id',
    'price',
    'negotiable',
    'category_id',
    'brand_id',
    'model_id',
    'description',
    'image',
    'condition',
    'authenticity',
    'phone_number',
    ];
   
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function featureValues(){
        return $this->hasMany(FeatureValues::class);
    }
    
    public function entities(){
        return $this->hasMany(ProductEntity::class);
    }

    public function image(){
        return $this->hasMany(ProductImage::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function model(){
    return $this->belongsTo(ProductModel::class, 'model_id');
    }

      public function features()
{
    return $this->belongsToMany(Feature::class, 'feature_values');
}

    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
