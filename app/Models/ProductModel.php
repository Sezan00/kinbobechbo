<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class ProductModel extends Model
{
      protected $table = 'models';
     protected $fillable = ['brand_id', 'name']; 


     public function brands(){
        return $this->belongsTo(Brand::class);
     }
}
