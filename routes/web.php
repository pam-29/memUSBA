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

//page d'aide
Route::view('/aide', 'help')->name('help');
// Voter pour un meme avec like
Route::post('/like', [MemeController::class, 'like'])->name('memes.like');

// Pour les vues individuelles des memes
Route::post('/memes/view', [MemeController::class, 'view'])->name('memes.view');

// Admin routes
Route::get('/admin/login', [MemeController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [MemeController::class, 'adminAuth'])->name('admin.auth');

Route::middleware([\App\Http\Middleware\AdminAuth::class])->group(function () {
    Route::get('/admin/dashboard', [MemeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::patch('/admin/meme/{id}/validate', [MemeController::class, 'validateMeme'])->name('admin.validate');
    Route::delete('/admin/meme/{id}/delete', [MemeController::class, 'deleteMeme'])->name('admin.delete');
});

// Pop up confirmation après création de meme
Route::get('/confirmation', [MemeController::class, 'confirmation'])->name('memes.confirmation');