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
            'public' => false,
        ]);

        return redirect()->route('memes.galerie')->with('success', 'Meme créé ! Il est en attente de validation.');
    }

    public function galerie()
    {
        $memes = \App\Models\Meme::with('portrait')
                    ->where('public', true)
                    ->latest()
                    ->get();        
        return view('galerie', compact('memes'));
    }

    public function create()
    {
        $portraits = Portrait::all();
        return view('create', compact('portraits'));
    }


    // Admin functions

    public function adminLogin()
    {
        return view('admin.login');
    }

    public function adminAuth(Request $request)
    {
        if ($request->password === 'votre_mot_de_passe_secret') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Mot de passe incorrect');
    } 

    public function adminDashboard()
    {
        if (!session('admin_logged_in')) return redirect()->route('admin.login');

        $memes = \App\Models\Meme::with('portrait')->where('public', false)->latest()->get();
        return view('admin.dashboard', compact('memes'));
    }

    public function validateMeme($id)
    {
        $meme = \App\Models\Meme::findOrFail($id);
        $meme->update(['public' => true]);

        return back()->with('success', 'Meme validé et publié !');
    }

    public function deleteMeme($id)
    {
        $meme = \App\Models\Meme::findOrFail($id);
        $meme->delete();

        return back()->with('success', 'Meme supprimé.');
    public function vote(){
        $memes = \App\Models\Meme::with('portrait')->latest()->get();  
        return view('vote', compact('memes'));
    }
}
}