<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin/dashboard', [AdminController::class, 'AdminViewDashboard'])->name('admin_view_dashboard');

Route::get('panel/user/list', [AdminController::class, 'UserListForAdminView'])->name('user.list_admin');

Route::get('edit/panel/user/{id}', [AdminController::class,'EditPanelUser'])->name('edit_panel_user');
Route::post('/panel/update/{id}', [AdminController::class, 'UpdatePanelUser'])->name('update_panel_user');