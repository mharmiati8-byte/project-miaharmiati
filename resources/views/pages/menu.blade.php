@extends('layouts.app')
@section('title', 'Menu Makanan & Minuman')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header text-white">
    <div class="container">
        <div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Menu</div>
        <h1 class="display-4 fw-bold mb-3">Menu Makanan & Minuman</h1>
        <p class="lead mb-4 mx-auto" style="max-width: 760px; opacity: .9;">Jelajahi pilihan makanan dan minuman</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Menu</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== MENU SECTION ===== --}}
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-muted fs-5">Pilih menu favorit Anda dari berbagai pilihan makanan lezat</p>
        </div>

        <div class="row g-4">
            @forelse($menus as $menu)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    @if ($menu->image && file_exists(public_path('storage/' . $menu->image)))
                        <img src="{{ asset('storage/' . $menu->image) }}"
                            alt="{{ $menu->nama_menu }}"
                            class="card-img-top"
                            style="height: 220px; object-fit: cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 220px;">
                            Tidak ada gambar
                        </div>
                    @endif
                    <div class="card-body">
                        @if($menu->kategori == 'Makanan')
                            <span class="badge rounded-pill bg-warning bg-opacity-50 text-dark mb-3">{{ $menu->kategori }}</span>
                        @elseif($menu->kategori == 'Minuman')
                            <span class="badge rounded-pill bg-info bg-opacity-50 text-dark mb-3">{{ $menu->kategori }}</span>
                        @else
                            <span class="badge rounded-pill bg-success bg-opacity-50 text-dark mb-3">{{ $menu->kategori }}</span>
                        @endif
                        <h5 class="card-title fw-bold">{{ $menu->nama_menu }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($menu->deskripsi, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-4 gap-2">
                            <span class="fs-5 fw-bold text-danger">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <div class="d-flex gap-2 flex-wrap justify-content-end">
                                <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-sm btn-outline-danger" title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('keranjang.store', $menu) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="btn btn-sm btn-danger" title="Tambah ke Keranjang">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada menu tersedia</p>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($menus->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            {{ $menus->links() }}
        </div>
        @endif
    </div>
</section>

@endsection
