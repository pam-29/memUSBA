<?php

namespace App\Http\Controllers;
use App\Models\Meme;
use Illuminate\Http\Request;

class LeaderboardController extends Controller {
    public function leaderboard(){
        $memes = Meme::with('portrait')
            ->orderByDesc('likes')
            ->take(3)
            ->get();
        return view('leaderboard', compact('memes'));
    }
}
