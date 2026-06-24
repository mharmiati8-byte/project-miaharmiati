<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Menu;
use App\Models\ProfilPerusahaan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalArtikel' => Artikel::count(),
            'totalMenu' => Menu::count(),
            'totalProfil' => ProfilPerusahaan::count(),
            'totalAdmin' => User::where('role', 'admin')->count(),
        ]);
    }
}
