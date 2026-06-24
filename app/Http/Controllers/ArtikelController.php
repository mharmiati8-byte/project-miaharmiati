<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(9);
        return view('pages.artikel', ['artikels' => $artikels]);
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('pages.artikel-detail', ['artikel' => $artikel]);
    }
}
