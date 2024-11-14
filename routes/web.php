<?php
// routes/web.php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Protected routes - only for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::resource('questions', QuestionController::class);
});

// Authentication routes
Auth::routes();