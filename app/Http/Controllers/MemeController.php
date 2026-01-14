<?php

namespace App\Http\Controllers;

use App\Models\Portrait;
use App\Models\Meme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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


    public function vote()
    {
        $memes = \App\Models\Meme::with('portrait')
            ->orderByRaw('RANDOM() / (view + 1)')
            ->get();
            return view('vote', compact('memes'));
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
        $meme = Meme::findOrFail($id);

        DB::table('corbeille')->insert([
            'text' => $meme->text,
            'likes' => $meme->likes,
            'view' => $meme->view,
            'portrait_id' => $meme->portrait_id,
            'public' => $meme->public,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $meme->delete();

        return back()->with('success', 'Meme déplacé dans la corbeille.');
    }


    public function like(Request $request)
        {
            $request->validate([
                'meme_id' => 'required|exists:memes,id'
            ]);

            Meme::where('id', $request->meme_id)->increment('likes');

            return response()->json(['success' => true]);
        }



    public function view(Request $request)
    {
        $request->validate([
            'meme_id' => 'required|exists:memes,id'
        ]);

        Meme::where('id', $request->meme_id)->increment('view');

        return response()->json(['success' => true]);
    }

}
