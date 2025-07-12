<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admin/dashboard', [AdminController::class, 'AdminViewDashboard'])->name('admin_view_dashboard');