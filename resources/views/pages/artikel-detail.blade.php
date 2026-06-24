@extends('layouts.app')
@section('title', $artikel->judul)

@section('extra-css')
<style>
	.detail-shell {
		background: linear-gradient(180deg, #fff 0%, #fff8f5 100%);
	}

	.detail-card {
		border: none;
		border-radius: 30px;
		overflow: hidden;
		box-shadow: 0 20px 55px rgba(0,0,0,.08);
		background: #fff;
	}

	.detail-cover {
		position: relative;
		aspect-ratio: 16 / 9;
		background: #f4f4f4;
		overflow: hidden;
	}

	.detail-cover img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.detail-body {
		padding: 1.8rem;
	}

	.detail-title {
		font-family: 'Playfair Display', serif;
		font-size: clamp(2rem, 4vw, 3.2rem);
		line-height: 1.08;
		margin-bottom: 1rem;
	}

	.detail-meta {
		color: #7a7a7a;
		font-size: .92rem;
	}

	.detail-content {
		font-size: 1.05rem;
		line-height: 1.9;
		color: #313131;
	}
</style>
@endsection

@section('content')

<section class="page-header text-white">
	<div class="container">
		<div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Artikel & Berita</div>
		<h1 class="display-5 fw-bold mb-3">{{ $artikel->judul }}</h1>
		<p class="lead mb-4 mx-auto" style="max-width: 760px; opacity: .9;">Ringkasan, gambar, dan isi lengkap artikel ditampilkan lebih rapi agar mudah dibaca di halaman detail.</p>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb justify-content-center mb-0">
				<li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
				<li class="breadcrumb-item"><a href="{{ route('artikel') }}" class="text-white text-decoration-none">Artikel</a></li>
				<li class="breadcrumb-item active text-white">Detail</li>
			</ol>
		</nav>
	</div>
</section>

<section class="py-5 detail-shell">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<article class="detail-card">
					<div class="detail-cover">
						<img src="{{ $artikel->image_url }}" alt="{{ $artikel->judul }}">
					</div>
					<div class="detail-body">
						<div class="d-flex flex-wrap gap-2 align-items-center mb-3">
							<span class="badge rounded-pill bg-danger">{{ $artikel->kategori }}</span>
							<span class="detail-meta"><i class="bi bi-clock me-1"></i>{{ $artikel->created_at->diffForHumans() }}</span>
						</div>

						<h2 class="detail-title">{{ $artikel->judul }}</h2>

						<p class="lead text-muted mb-4">{{ $artikel->ringkasan }}</p>

						<div class="detail-content">
							{!! nl2br(e($artikel->konten ?: $artikel->ringkasan)) !!}
						</div>

						<div class="d-flex gap-2 flex-wrap mt-5">
							<a href="{{ route('artikel') }}" class="btn btn-outline-danger rounded-pill px-4">
								<i class="bi bi-arrow-left me-1"></i>Kembali ke Artikel
							</a>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>

@endsection
