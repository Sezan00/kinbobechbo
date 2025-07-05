<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ProductController;

Route::get('/post-ad/{category}', [MobileController::class, 'showUploadForm'])->name('product.upload');
Route::post('/post-ad/{slug}', [ProductController::class, 'store'])->name('product.store');



// for product list show 

Route::get('product/list', [ProductController::class, 'ProductListShow'])->name('product.list');

// specefic product page 

Route::get('product/show/{id}', [ProductController::class, 'ProductShow'])->name('product.show');


Route::middleware('user')->group(function () {
    Route::get('/product/{id}/edit', [ProductController::class, 'PosterEditHisProduct'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'UpdateProduct'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});