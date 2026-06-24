@extends('layouts.app')
@section('title', $menu->nama_menu)

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header text-white">
    <div class="container">
        <div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Menu Detail</div>
        <h1 class="display-4 fw-bold mb-3">{{ $menu->nama_menu }}</h1>
        <p class="lead mb-4 mx-auto" style="max-width: 760px; opacity: .9;">Detail menu kini tampil lebih proporsional agar judul tidak tertutup dan informasi mudah dibaca.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu') }}" class="text-white text-decoration-none">Menu</a></li>
                <li class="breadcrumb-item active text-white">{{ $menu->nama_menu }}</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== MENU DETAIL ===== --}}
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row">
            {{-- Gambar Menu --}}
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="sticky-top" style="top: 20px;">
                    @if ($menu->image && file_exists(public_path('storage/' . $menu->image)))
                        <img src="{{ asset('storage/' . $menu->image) }}"
                            alt="{{ $menu->nama_menu }}"
                            class="img-fluid rounded shadow-lg"
                            style="max-height: 500px; object-fit: cover; width: 100%;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light rounded shadow-lg text-muted" style="height: 500px; width: 100%;">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>
            </div>

            {{-- Detail Menu --}}
            <div class="col-lg-7 ps-lg-5">
                {{-- Kategori --}}
                <div class="mb-4">
                    @if($menu->kategori == 'Makanan')
                        <span class="badge rounded-pill bg-warning bg-opacity-75 text-dark p-2" style="font-size: 0.95rem;">
                            <i class="bi bi-fire"></i> {{ $menu->kategori }}
                        </span>
                    @elseif($menu->kategori == 'Minuman')
                        <span class="badge rounded-pill bg-info bg-opacity-75 text-dark p-2" style="font-size: 0.95rem;">
                            <i class="bi bi-cup-straw"></i> {{ $menu->kategori }}
                        </span>
                    @else
                        <span class="badge rounded-pill bg-success bg-opacity-75 text-dark p-2" style="font-size: 0.95rem;">
                            <i class="bi bi-basket"></i> {{ $menu->kategori }}
                        </span>
                    @endif
                </div>

                {{-- Nama Menu & Harga --}}
                <h2 class="fw-bold mb-2" style="font-size: 2.5rem;">{{ $menu->nama_menu }}</h2>

                <div class="row align-items-center mb-5">
                    <div class="col-auto">
                        <h3 class="text-danger fw-bold mb-0" style="font-size: 2rem;">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="col-auto">
                        <small class="text-muted">Harga per porsi</small>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <h5 class="fw-bold mb-3">Deskripsi Produk</h5>
                    <p class="text-muted" style="font-size: 1.1rem; line-height: 1.8;">
                        {{ $menu->deskripsi }}
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <form action="{{ route('keranjang.store', $menu) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-sm-4">
                            <label class="form-label fw-semibold">Jumlah</label>
                            <input type="number" name="qty" min="1" value="1" class="form-control form-control-lg">
                        </div>
                        <div class="col-sm-8">
                            <div class="d-grid gap-3">
                                <button type="submit" class="btn btn-danger btn-lg d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-cart-plus" style="font-size: 1.25rem;"></i>
                                    <span>Tambah ke Keranjang</span>
                                </button>
                                <a href="https://wa.me/6285266405735?text=Halo, saya mau pesan *{{ $menu->nama_menu }}* (Rp {{ number_format($menu->harga, 0, ',', '.') }}) dari menu Warunk Cek Donna. Berapa stok yang tersedia?"
                                    target="_blank"
                                    class="btn btn-success btn-lg d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i>
                                    <span>Pesan via WhatsApp</span>
                                </a>
                                <a href="{{ route('menu') }}" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Info Tambahan --}}
                <div class="mt-5 p-4 bg-light rounded">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h6 class="fw-bold mb-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Ketersediaan
                            </h6>
                            <p class="text-muted mb-0">Stok tersedia setiap hari</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2">
                                <i class="bi bi-clock-fill text-warning"></i> Waktu Pesan
                            </h6>
                            <p class="text-muted mb-0">Hubungi via WhatsApp untuk info</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Menu Terkait --}}
        <div class="mt-5 pt-5 border-top">
            <h4 class="fw-bold mb-4">Menu Lainnya</h4>
            <div class="row g-4">
                @php
                    $menuLain = \App\Models\Menu::where('id', '!=', $menu->id)
                        ->latest()
                        ->limit(3)
                        ->get();
                @endphp

                @forelse($menuLain as $m)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 transition" style="transition: all 0.3s ease;">
                        @if ($m->image && file_exists(public_path('storage/' . $m->image)))
                            <img src="{{ asset('storage/' . $m->image) }}"
                                alt="{{ $m->nama_menu }}"
                                class="card-img-top"
                                style="height: 220px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light text-muted" style="height: 220px;">
                                Tidak ada gambar
                            </div>
                        @endif
                        <div class="card-body">
                            @if($m->kategori == 'Makanan')
                                <span class="badge rounded-pill bg-warning bg-opacity-50 text-dark mb-3">{{ $m->kategori }}</span>
                            @elseif($m->kategori == 'Minuman')
                                <span class="badge rounded-pill bg-info bg-opacity-50 text-dark mb-3">{{ $m->kategori }}</span>
                            @else
                                <span class="badge rounded-pill bg-success bg-opacity-50 text-dark mb-3">{{ $m->kategori }}</span>
                            @endif
                            <h6 class="card-title fw-bold">{{ Str::limit($m->nama_menu, 50) }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($m->deskripsi, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <span class="fw-bold text-danger">Rp {{ number_format($m->harga, 0, ',', '.') }}</span>
                                <a href="{{ route('menu.show', $m->id) }}" class="btn btn-sm btn-outline-danger">
                                    Lihat →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted text-center">Tidak ada menu lain</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@endsection
