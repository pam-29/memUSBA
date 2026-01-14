<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {
        // Récupère tous les memes triés par likes décroissants
        $memes = Meme::with('portrait') // pour afficher aussi le portrait
                    ->orderByDesc('likes')
                    ->take(3)
                    ->get();

        return view('leaderboard', compact('memes'));
    }
    
}
