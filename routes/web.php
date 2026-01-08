<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;

Route::get('/', function () {
    return view('home');
});


// Meme routes
Route::get('/', [MemeController::class, 'index'])->name('home');
Route::post('/memes', [MemeController::class, 'store'])->name('memes.store');

// Galerie route
Route::get('/galerie', [MemeController::class, 'galerie'])->name('memes.galerie');

// Create routes
Route::get('/create', function () {return view('create');})->name('memes.create');