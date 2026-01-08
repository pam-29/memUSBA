<?php

namespace App\Http\Controllers;

use App\Models\Portrait;
use App\Models\Meme;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index() 
    {
        $portrait = Portrait::inRandomOrder()->first();
        return view('home', compact('portrait'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'portrait_id' => 'required|exists:portraits,id',
        ]);

        \App\Models\Meme::create([
            'text' => $request->text,
            'portrait_id' => $request->portrait_id,
            'public' => true,
        ]);

        return redirect()->route('memes.galerie')->with('success', 'Meme ajouté à la galerie !');
    }

    public function galerie()
    {
        $memes = \App\Models\Meme::with('portrait')->latest()->get();        
        return view('galerie', compact('memes'));
    }

    public function create()
    {
        $portraits = Portrait::all();
        return view('create', compact('portraits'));
    }
}