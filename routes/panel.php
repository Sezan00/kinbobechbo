<?php

use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('singup/panel', [PanelController::class, 'SignUpShow'])->name('show.signup');
Route::get('login/panel', [PanelController::class, 'loginShow'])->name('show.login');

Route::post('singup/panel', [PanelController::class, 'SignupPost'])->name('signup.post.panel');
Route::post('login/panel', [PanelController::class, 'LoginPost'])->name('login.post.panel');
        
Route::get('logout/panel', [PanelController::class, "logoutPanel"])->name("logout.panel");
