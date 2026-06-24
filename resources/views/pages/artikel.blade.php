@extends('layouts.app')
@section('title', 'Artikel & Berita')

@section('extra-css')
<style>
    .artikel-hero {
        background:
            radial-gradient(circle at top right, rgba(255,255,255,.18), transparent 28%),
            linear-gradient(135deg, #e63946 0%, #b71c1c 100%);
        position: relative;
        overflow: hidden;
    }

    .artikel-hero::before {
        content: '';
        position: absolute;
        inset: auto -6% -42% auto;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        filter: blur(2px);
    }

    .artikel-card {
        border: 1px solid rgba(0,0,0,.06);
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(23, 26, 32, .08);
        transition: transform .25s ease, box-shadow .25s ease;
        background: #fff;
        height: 100%;
    }

    .artikel-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 26px 60px rgba(23, 26, 32, .14);
    }

    .artikel-card__media {
        position: relative;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: #f4f4f4;
    }

    .artikel-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .35s ease;
    }

    .artikel-card:hover .artikel-card__media img {
        transform: scale(1.04);
    }

    .artikel-card__badge {
        position: absolute;
        top: 16px;
        left: 16px;
        backdrop-filter: blur(12px);
        background: rgba(255,255,255,.88);
        color: #b71c1c;
        padding: .45rem .8rem;
        border-radius: 999px;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .02em;
    }

    .artikel-card__content {
        padding: 1.35rem 1.35rem 1.1rem;
    }

    .artikel-card__title {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        line-height: 1.25;
        margin-bottom: .7rem;
    }

    .artikel-card__meta {
        font-size: .84rem;
        color: #7a7a7a;
    }
</style>
@endsection

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<div class="artikel-hero page-header text-white">
    <div class="container">
        <div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Artikel & Berita</div>
        <h1 class="display-4 fw-bold mb-3">Cerita, promo, dan inspirasi terbaru</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Artikel</li>
            </ol>
        </nav>
    </div>
</div>

{{-- ===== ARTIKEL SECTION ===== --}}
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row g-4">
            @forelse($artikels as $art)
            <div class="col-lg-4 col-md-6">
                <article class="artikel-card">
                    <div class="artikel-card__media">
                        <img src="{{ $art->image_url }}" alt="{{ $art->judul }}">
                        <div class="artikel-card__badge">{{ $art->kategori }}</div>
                    </div>
                    <div class="artikel-card__content">
                        <h2 class="artikel-card__title">{{ $art->judul }}</h2>
                        <p class="text-muted mb-3">{{ \Illuminate\Support\Str::limit($art->ringkasan ?? '', 110) }}</p>
                        <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap artikel-card__meta">
                            <span><i class="bi bi-clock me-1"></i>{{ $art->created_at->diffForHumans() }}</span>
                            <a href="{{ route('artikel.show', $art->id) }}" class="btn btn-sm btn-danger rounded-pill px-3">Baca selengkapnya</a>
                        </div>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Belum ada artikel tersedia</p>
            </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($artikels->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            {{ $artikels->links('vendor.pagination.neat') }}
        </div>
        @endif
    </div>
</section>

@endsection
