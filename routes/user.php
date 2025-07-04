<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('user/signup',  [UserController::class, 'UserSingupShow'])->name('user_signup_page');
Route::post('user/signup', [UserController::class, 'UserRegisterPost'])->name('user.post');


Route::get('user/login', [UserController::class, 'UserLoginPage'])->name('login.view');
Route::post('user/login', [UserController::class, 'UserLoginPost'])->name('login.post');

//logout 
Route::get('logout', [UserController::class, "logout"])->name("logout");

// user account 
Route::get('my/account', [UserController::class, 'UserAccount'])->name('user.account');
Route::get('my/profile', [UserController::class, 'UserProfileShow'])->name('user.profile');