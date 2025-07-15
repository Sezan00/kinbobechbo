<?php
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\QuestionController;

// routes/web.php

Route::post('/product/{id}/question', [QuestionController::class, 'store'])->name('question.store');
Route::post('/question/{id}/answer', [QuestionController::class, 'storeAnswer'])->name('answer.store');
