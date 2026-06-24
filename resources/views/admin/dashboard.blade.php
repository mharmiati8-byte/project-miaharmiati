@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-md-6 col-xl-3">
        <div class="card-soft p-4 h-100">
            <div class="text-muted small text-uppercase">Artikel</div>
            <div class="display-6 fw-bold">{{ $totalArtikel }}</div>
            <div class="text-muted">Konten berita, promo, dan tips</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-soft p-4 h-100">
            <div class="text-muted small text-uppercase">Produk / Layanan</div>
            <div class="display-6 fw-bold">{{ $totalMenu }}</div>
            <div class="text-muted">Data menu dengan upload gambar</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-soft p-4 h-100">
            <div class="text-muted small text-uppercase">Profil Perusahaan</div>
            <div class="display-6 fw-bold">{{ $totalProfil }}</div>
            <div class="text-muted">Informasi identitas perusahaan</div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-soft p-4 h-100">
            <div class="text-muted small text-uppercase">Admin</div>
            <div class="display-6 fw-bold">{{ $totalAdmin }}</div>
            <div class="text-muted">Akun yang dapat login ke panel</div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-8">
        <div class="card-soft p-4 h-100">
            <h2 class="h5 fw-bold mb-3">Menu Pengelolaan Sistem</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <a class="btn btn-outline-danger w-100 rounded-4 py-3" href="{{ route('admin.artikel.index') }}">
                        <i class="bi bi-newspaper d-block fs-3 mb-2"></i>
                        Artikel
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-outline-danger w-100 rounded-4 py-3" href="{{ route('admin.menu.index') }}">
                        <i class="bi bi-basket d-block fs-3 mb-2"></i>
                        Produk
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-outline-danger w-100 rounded-4 py-3" href="{{ route('admin.profil.index') }}">
                        <i class="bi bi-building d-block fs-3 mb-2"></i>
                        Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-soft p-4 h-100">
            <h2 class="h5 fw-bold mb-3">Report PDF</h2>
            <p class="text-muted">Lihat laporan artikel atau produk langsung di browser tanpa unduhan otomatis.</p>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.laporan.artikel.pdf') }}" class="btn btn-danger rounded-pill px-4">
                    <i class="bi bi-file-earmark-pdf me-1"></i>Lihat PDF Artikel
                </a>
                <a href="{{ route('admin.laporan.menu.pdf') }}" class="btn btn-outline-danger rounded-pill px-4">
                    <i class="bi bi-file-earmark-pdf me-1"></i>Lihat PDF Produk
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
