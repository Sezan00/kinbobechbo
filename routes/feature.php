<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;

Route::get('feature/add', [FeatureController::class, 'FeaturePageView'])->name('feature_view');
Route::post('feature/add', [FeatureController::class, 'FeatureInsurtDatabase'])->name('feature_post');


///Custom feather show for 

Route::get('mobile/feature', [FeatureController::class, 'MobileFeature'])->name('mobil.feature');