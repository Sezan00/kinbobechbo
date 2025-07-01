<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductModel;

class Brand extends Model
{
   use HasFactory;

   protected $fillable = ['name' , 'category_id'];

   public function category(){
    return $this->belongsTo(Category::class);
   }


   public function models(){
      return $this->hasMany(ProductModel::class);
   }
}
