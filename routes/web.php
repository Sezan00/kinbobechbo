<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/terms', [Controller::class, 'TermsAndCondition'])->name('terms_condition');

// Route::get('admin/dashboard', [Controller::class, 'AdminPannelView'])->name('admin.view');