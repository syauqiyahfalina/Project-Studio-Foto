<?php

namespace App\Http\Controllers;

use App\Models\PaketPoto;
use App\Models\Studio;
use App\Models\Galeri;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $pakets = PaketPoto::take(3)->get();
        $studios = Studio::where('status', 'aktif')->get();
        
        // Memastikan membuka folder frontend -> file index.blade.php
        return view('frontend.index', compact('pakets', 'studios'));
    }

    public function paket()
    {
        $pakets = PaketPoto::all();
        return view('frontend.paket', compact('pakets'));
    }

    public function galeri()
    {
        $galeris = Galeri::with('fotografer')->latest()->get();
        return view('frontend.galeri', compact('galeris'));
    }
}