<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ChatController::class, 'dashboard'])->name('dashboard');
    Route::post('/chat/start', [ChatController::class, 'startChat'])->name('chat.start');
    Route::get('/chat/{id}', [ChatController::class, 'chat'])->name('chat.view');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
