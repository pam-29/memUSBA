<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;

Route::get('/', function () {
    return view('welcome');
});


// Meme routes
Route::get('/', [MemeController::class, 'index'])->name('home');
Route::post('/memes', [MemeController::class, 'store'])->name('memes.store');