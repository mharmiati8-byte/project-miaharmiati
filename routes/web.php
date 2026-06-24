<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArtikelController as AdminArtikelController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ProfilPerusahaanController as AdminProfilPerusahaanController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES - Warunk Cek Donna
| 4 Menu: Beranda | Menu Makanan | Artikel/Berita | Kontak
|--------------------------------------------------------------------------
*/

// ✅ MENU 1 - Beranda (Home)
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// ✅ MENU 2 - Menu Makanan & Minuman
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');

// ✅ KERANJANG
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::get('/keranjang/whatsapp', [KeranjangController::class, 'whatsapp'])->name('keranjang.whatsapp');
Route::post('/keranjang/{menu}', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::delete('/keranjang/{menuId}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
Route::delete('/keranjang', [KeranjangController::class, 'clear'])->name('keranjang.clear');

// ✅ MENU 3 - Artikel / Berita
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

// ✅ MENU 4 - Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::redirect('/admin', '/admin/dashboard');

Route::middleware('guest')->group(function () {
	Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
	Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin.auth')->name('admin.')->group(function () {
	Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

	Route::resource('artikel', AdminArtikelController::class)->except(['show']);
	Route::resource('menu', AdminMenuController::class)->except(['show']);
	Route::resource('profil', AdminProfilPerusahaanController::class)->parameters([
		'profil' => 'profil',
	])->except(['show']);

	Route::get('/laporan/artikel/pdf', [AdminReportController::class, 'artikelPdf'])->name('laporan.artikel.pdf');
	Route::get('/laporan/menu/pdf', [AdminReportController::class, 'menuPdf'])->name('laporan.menu.pdf');
});
