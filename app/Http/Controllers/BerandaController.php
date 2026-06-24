<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Artikel;
use App\Models\Testimoni;

class BerandaController extends Controller
{
    public function index()
    {
        $menuUnggulan = Menu::limit(6)->get();
        $artikelTerbaru = Artikel::latest()->limit(3)->get();
        $testimonis = Testimoni::limit(3)->get();

        return view('pages.beranda', [
            'menuUnggulan' => $menuUnggulan,
            'artikelTerbaru' => $artikelTerbaru,
            'testimonis' => $testimonis,
        ]);
    }
}
