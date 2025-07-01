<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('category/select', [CategoryController::class, 'CategoryShow'])->name('category_show'); //For normall user
Route::delete('category/delete{id}',[CategoryController::class, 'CategoryDelete'])->name('category_delete');

Route::get('category/create', [CategoryController::class, 'CategoryCreate'])->name('category_create');
Route::post('category/create', [CategoryController::class, 'CategoryInsertDatabse'])->name('category_upload');