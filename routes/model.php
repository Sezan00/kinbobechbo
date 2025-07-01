<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;



Route::get('category/model', [ModelController::class, 'CategoryModelView'])->name('category_model_select');

Route::get('model/create/{slug}', [ModelController::class, 'ModelCreatePageView'])->name('model.view');

Route::post('model/store', [ModelController::class, 'ModelStore'])->name('model.store');