<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function artikelPdf()
    {
        $artikels = Artikel::latest()->get();

        $pdf = Pdf::loadView('admin.reports.artikel', [
            'artikels' => $artikels,
            'generatedAt' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-artikel.pdf');
    }

    public function menuPdf()
    {
        $menus = Menu::latest()->get();

        $pdf = Pdf::loadView('admin.reports.menu', [
            'menus' => $menus,
            'generatedAt' => now(),
        ])->setPaper('a4', 'portrait');

        return $pdf->stream('laporan-produk.pdf');
    }
}
