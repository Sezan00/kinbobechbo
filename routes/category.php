<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\ProductController;
 //For normall user
Route::delete('category/delete{id}',[CategoryController::class, 'CategoryDelete'])->name('category_delete');

Route::get('category/create', [CategoryController::class, 'CategoryCreate'])->name('category_create');
Route::post('category/create', [CategoryController::class, 'CategoryInsertDatabse'])->name('category_upload');

Route::middleware('user')->group(function () {
    Route::get('category/select', [CategoryController::class, 'CategoryShow'])->name('category_show');
});

// for show product throw Category ghust 
Route::get('ads/{slug}', [ProductController::class , 'CategoryShowProduct'])->name('category_product_ghuest');