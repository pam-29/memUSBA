<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\LeaderboardController;

// Page d'accueil
Route::get('/', [MemeController::class, 'index'])->name('home');

// Création de meme
Route::get('/create', [MemeController::class, 'create'])->name('memes.create');
Route::post('/memes', [MemeController::class, 'store'])->name('memes.store');

// Galerie de memes
Route::get('/galerie', [MemeController::class, 'galerie'])->name('memes.galerie');

// Voter les memes
Route::get('/vote', [MemeController::class, 'vote'])->name('memes.vote');

// Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard'])->name('leaderboard');

//page d'aide
Route::view('/aide', 'help')->name('help');
