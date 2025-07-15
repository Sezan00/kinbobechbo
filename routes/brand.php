<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::middleware('panel')->group(function(){
    Route::get('brand/upload', [BrandController::class, 'BrandpageSHow'])->name('brand.show');
    Route::post('brand/post', [BrandController::class, 'BrandIsertDb'])->name('brand.store');



    Route::get('/categories/admin', [BrandController::class, 'categoriesShow'])->name('categories.index'); //Category for admin 
    Route::get('/brand/{slug}', [BrandController::class, 'BrandView'])->name('brand.index');
    Route::delete('/brand{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');



    //brand option
    Route::get('/options/{slug}', [BrandController::class, 'showOptions'])->name('category.options');
});






