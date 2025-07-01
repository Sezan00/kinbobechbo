<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductEntity extends Model
{
    protected $table = 'product_entities';
    protected $fillable = [
        'product_id',
         'type',
         'value'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
