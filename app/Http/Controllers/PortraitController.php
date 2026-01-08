<?php

namespace App\Http\Controllers;

class PortraitController extends Controller
{
    public function index()
    {
        $portraits = \App\Models\Portrait::all();
        
        return view('create', compact('portraits'));
    }
}