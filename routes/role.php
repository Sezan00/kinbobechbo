<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;


Route::middleware('panel')->group(function(){
    Route::get('create/roles', [RoleController::class, 'index'])->name('index.role');
    Route::get('roles/list', [RoleController::class, 'RoleList'])->name('roles.list');

    Route::post('create/roles', [RoleController::class, 'RoleStore'])->name('store.role');

    Route::get('edit/roles{id}',[RoleController::class, 'RoleEdit'])->name('edit.role');

    Route::POST('update/roles{id}', [RoleController::class, 'RoleUpdate'])->name('update.role');
    Route::delete('delete.roles{id}', [RoleController::class, 'RoleDelete'])->name('delete.role');
});

