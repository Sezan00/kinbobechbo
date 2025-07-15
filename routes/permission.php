<?php

use App\Http\Controllers\PermissionController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::middleware('panel')->group(function(){
    Route::get('permissions/create', [PermissionController::class, 'permissionCreatePage'])->name('permission.create');

    Route::post('permissions/create', [PermissionController::class , 'PermissionStoreDB'])->name('permisson.post');
    // Show permisson list 
    Route::get('list/permission', [PermissionController::class, 'PermissionList'])->name('permisson.list');

    // permission edit 
    Route::get('permisson/edit/{id}', [PermissionController::class, 'PermissionEdit'])->name('Permission.edit');

    // permission data Update 
    Route::POST('permisson/update/{id}', [PermissionController::class, 'PermissionUpdate'])->name('permission.update');

    // delete permission 
    Route::delete('permission/delete', [PermissionController::class, 'PermissionDelete'])->name('permission.delete');
});

