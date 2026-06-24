@extends('layouts.app')
@section('title', 'Kontak Kami')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<section class="page-header text-white">
    <div class="container">
        <div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Kontak</div>
        <h1 class="display-4 fw-bold mb-3">Kontak Kami</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Kontak</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== KONTAK SECTION ===== --}}
<section class="py-5 py-lg-6">
    <div class="container">
        <div class="row g-5">
            {{-- INFO KONTAK --}}
            <div class="col-lg-6">
                <h2 class="h4 fw-bold mb-4">Hubungi Kami</h2>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Alamat</h5>
                    <p class="text-muted">
                        Jl. Kelapa dua, Karawaci<br>
                        Tangerang, Banten, Dekat Universitas Gunadarma
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i>Telepon</h5>
                    <p class="text-muted">
                        <a href="tel:6285266405735" class="text-muted text-decoration-none">085266405735</a>
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2"><i class="bi bi-whatsapp text-danger me-2"></i>WhatsApp</h5>
                    <p class="text-muted">
                        <a href="https://wa.me/6285266405735" target="_blank" class="text-muted text-decoration-none">
                            Chat via WhatsApp
                        </a>
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2"><i class="bi bi-envelope-fill text-danger me-2"></i>Email</h5>
                    <p class="text-muted">
                        <a href="mailto:info@cekdonna.com" class="text-muted text-decoration-none">info@cekdonna.com</a>
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2"><i class="bi bi-clock-fill text-danger me-2"></i>Jam Operasional</h5>
                    <p class="text-muted">
                        Buka Setiap Hari: 11.00 – 03.00 WIB
                    </p>
                </div>

                <div class="mt-5">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-2">
                        <a href="https://www.instagram.com/warunkcekdonna?igsh=MXNmNm1nNDR3eGNsaQ==" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@cekdonna_?_r=1&_t=ZS-95zAXcletSy" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
