@extends('layouts.app')
@section('title', 'Beranda')

@section('extra-css')
<style>
    /* Minimal custom — hanya yang Bootstrap tidak punya */
    .hero-section {
        min-height: 100vh;
        background:
            radial-gradient(circle at top right, rgba(255,255,255,.10), transparent 28%),
            linear-gradient(135deg, #e63946 0%, #c1121f 52%, #8a1538 100%);
        padding-top: 80px;
    }
    .hero-title { font-size: clamp(2.2rem, 5vw, 3.8rem); line-height: 1.15; }
    .img-card { border-radius: 20px; overflow: hidden; position: relative; }
    .img-card img { height: 420px; object-fit: cover; width: 100%; filter: brightness(0.85); }
    .img-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 60%);
    }
    .img-badge-top {
        position: absolute; top: 16px; left: 16px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 100px;
        padding: 6px 14px;
        font-size: .78rem; font-weight: 700; color: white;
    }
    .img-badge-bottom { position: absolute; bottom: 20px; left: 20px; right: 20px; }
    .float-rating {
        position: absolute; bottom: -18px; right: -14px;
        background: #fff;
        border-radius: 16px;
        padding: 14px 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        min-width: 130px;
        animation: floatY 3s ease-in-out infinite;
    }
    .float-menu {
        position: absolute; top: -16px; left: -14px;
        background: linear-gradient(135deg, #e63946 0%, #f4a261 100%);
        border-radius: 14px;
        padding: 12px 18px;
        box-shadow: 0 8px 25px rgba(230,57,70,0.45);
        animation: floatY 4s ease-in-out infinite 1s;
        text-align: center;
    }
    @keyframes floatY {
        0%,100% { transform: translateY(0); }
        50%      { transform: translateY(-10px); }
    }
    .live-dot {
        width: 8px; height: 8px; background: #28a745;
        border-radius: 50%; display: inline-block;
        animation: blink 1.5s ease-in-out infinite;
    }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.2} }
    .keunggulan-card { border-radius: 16px; transition: all .3s; border: 1px solid #f0f0f0; }
    .keunggulan-card:hover { transform: translateY(-6px); box-shadow: 0 15px 40px rgba(0,0,0,.1) !important; border-color: transparent; }
    .cta-bg {
        background: linear-gradient(135deg, #e63946 0%, #b71c1c 100%);
        position: relative; overflow: hidden;
    }
    .cta-bg::before {
        content: '';
        position: absolute; top: -50%; right: -10%;
        width: 400px; height: 400px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
    }
    .stats-bg {
        background: linear-gradient(135deg, #f4a261 0%, #e63946 100%);
    }

    .hero-title .text-warning {
        color: #ffd166 !important;
    }
</style>
@endsection

@section('content')

{{-- ========== HERO ========== --}}
<section class="hero-section d-flex align-items-center">
    <div class="container py-5">
        <div class="row align-items-center g-5">

            {{-- KIRI --}}
            <div class="col-lg-6" data-aos="fade-right">

                {{-- Judul --}}
                <h1 class="hero-title fw-bold text-white mb-4">
                    Rasakan Cita Rasa<br>
                        <span class="text-warning">Autentik</span>
                    <span class="text-white"> Nusantara</span>
                </h1>

                {{-- Deskripsi --}}
                <p class="text-white text-opacity-75 fs-5 mb-4" style="line-height:1.8;">
                    Warunk Cek Donna hadir dengan menu lezat, bahan segar pilihan,
                    dan harga yang ramah di kantong. Tempat makan favorit keluarga!
                </p>

                {{-- Badge Fitur --}}
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge rounded-pill bg-white bg-opacity-10 text-white border border-white border-opacity-25 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> Bahan Segar
                    </span>
                    <span class="badge rounded-pill bg-white bg-opacity-10 text-white border border-white border-opacity-25 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> Halal
                    </span>
                    <span class="badge rounded-pill bg-white bg-opacity-10 text-white border border-white border-opacity-25 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> Harga Hemat
                    </span>
                    <span class="badge rounded-pill bg-white bg-opacity-10 text-white border border-white border-opacity-25 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> Buka Tiap Hari
                    </span>
                </div>

            </div>

            {{-- KANAN --}}
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                
            </div>

        </div>
    </div>
</section>

{{-- ========== STATS BAR ========== --}}
<div class="stats-bg py-4">
    <div class="container">
        <div class="row g-3 text-center text-white">
            <div class="col-6 col-md-3" data-aos="fade-up">
                <div class="fs-2 fw-bold">{{ \App\Models\Menu::count() }}+</div>
                <div class="small opacity-75">Menu Tersedia</div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="fs-2 fw-bold">5K+</div>
                <div class="small opacity-75">Pelanggan Puas</div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="fs-2 fw-bold">8+</div>
                <div class="small opacity-75">Tahun Pengalaman</div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="fs-2 fw-bold">4.9 ⭐</div>
                <div class="small opacity-75">Rating Pelanggan</div>
            </div>
        </div>
    </div>
</div>

{{-- ========== KEUNGGULAN ========== --}}
<section class="py-5 py-lg-6 bg-light">
    <div class="container">

        {{-- Judul --}}
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2 mb-3 fw-semibold">
                Kenapa Kami?
            </span>
            <h2 class="fw-bold fs-1 mb-2">Keunggulan Warunk Cek Donna</h2>
            <div class="mx-auto bg-danger rounded-pill" style="width:50px;height:4px;"></div>
        </div>

        <div class="row g-4">
            {{-- Card 1 --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card keunggulan-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="rounded-3 bg-danger bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-4"
                         style="width:64px;height:64px;font-size:1.7rem;">🛒</div>
                    <h5 class="fw-bold mb-2">Bahan Segar Pilihan</h5>
                    <p class="text-muted small mb-0">Bahan berkualitas tinggi dari pemasok terpercaya, dipilih segar setiap harinya.</p>
                </div>
            </div>
            {{-- Card 2 --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card keunggulan-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="rounded-3 bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-4"
                         style="width:64px;height:64px;font-size:1.7rem;">🏆</div>
                    <h5 class="fw-bold mb-2">Cita Rasa Autentik</h5>
                    <p class="text-muted small mb-0">Resep turun-temurun yang menghadirkan cita rasa Nusantara yang sesungguhnya.</p>
                </div>
            </div>
            {{-- Card 3 --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card keunggulan-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="rounded-3 bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-4"
                         style="width:64px;height:64px;font-size:1.7rem;">🛡️</div>
                    <h5 class="fw-bold mb-2">Halal & Higienis</h5>
                    <p class="text-muted small mb-0">Semua produk halal dan dapur selalu dijaga standar kebersihan yang ketat.</p>
                </div>
            </div>
            {{-- Card 4 --}}
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card keunggulan-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="rounded-3 bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mx-auto mb-4"
                         style="width:64px;height:64px;font-size:1.7rem;">💰</div>
                    <h5 class="fw-bold mb-2">Harga Terjangkau</h5>
                    <p class="text-muted small mb-0">Makanan lezat berkualitas dengan harga yang bersahabat untuk semua kalangan.</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ========== CTA ========== --}}
<section class="cta-bg py-5 py-lg-6 text-center text-white">
    <div class="container position-relative" style="z-index:2;" data-aos="fade-up">
        <h2 class="display-5 fw-bold mb-3">Lapar? Yuk Order Sekarang! </h2>
    </div>
</section>

@endsection
