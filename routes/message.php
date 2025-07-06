<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;


Route::middleware('user')->group(function () {
    Route::get('/chat/{user}', [ChatController::class, 'chatWithUser'])->name('chat.with.user');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chats', [ChatController::class, 'chatList'])->name('chat.list');
});