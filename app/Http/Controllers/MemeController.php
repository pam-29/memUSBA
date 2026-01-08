<?php

namespace App\Http\Controllers;

use App\Models\Portrait;
use App\Models\Meme;
use Illuminate\Http\Request;

class MemeController extends Controller
{
    public function index() 
    {
        // On récupère un portrait aléatoire dans la base
        $portrait = Portrait::inRandomOrder()->first();
        return view('home', compact('portrait'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'text' => 'required|max:255',
            'portrait_id' => 'required|exists:portraits,id'
        ]);

        Meme::create([
            'text' => $request->text,
            'portrait_id' => $request->portrait_id,
        ]);

        return redirect()->route('home')->with('success', 'Meme créé !');
    }
}