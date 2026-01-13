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

// Page de vote
Route::get('/vote', [MemeController::class, 'vote'])->name('memes.vote');

// Leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard'])->name('leaderboard');

// Voter pour un meme avec like
Route::post('/like', [MemeController::class, 'like'])->name('memes.like');

//Pour les vues individuelles des memes
Route::post('/memes/view', [MemeController::class, 'view'])->name('memes.view');
