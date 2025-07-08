<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    protected $fillable = [
    'product_id',
    'asker_id',
    'question',
];
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function answer(){
        return $this->hasOne(Answer::class);
    }

    public function asker(){
        return $this->belongsTo(User::class, 'asker_id');
    }
}
