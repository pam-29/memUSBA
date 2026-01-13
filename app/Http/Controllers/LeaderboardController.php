<?php

namespace App\Http\Controllers;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {     
        $memes = \App\Models\Meme::with('portrait')->latest()->get();        
        return view('leaderboard', compact('memes'));
    }
}
