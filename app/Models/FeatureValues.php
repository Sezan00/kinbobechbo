<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureValues extends Model
{
   use HasFactory;

   protected $fillable = ['product_id', 'feature_id', 'value'];

   public function product(){
    return $this->belongsTo(Product::class);
   }

   public function feature(){
        return $this->belongsTo(Feature::class);
   }
}
