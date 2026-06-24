<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Warunk Cek Donna')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    {{-- AOS Animation --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --merah:   #e63946;
            --oranye:  #f4a261;
            --gelap:   #1a1a2e;
            --bg-soft: #fff8f3;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255,255,255,0.97) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 14px 0;
            transition: all .3s;
        }
        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--merah);
            line-height: 1;
        }
        .brand-sub { font-size: .62rem; color: #999; letter-spacing: 2px; text-transform: uppercase; }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            border-radius: 20px;
            padding: 7px 15px !important;
            transition: all .3s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--merah) !important;
            background: rgba(230,57,70,.08);
        }
        .btn-wa {
            background: #25d366 !important;
            color: white !important;
            border-radius: 20px;
            padding: 7px 18px !important;
            font-weight: 600;
        }
        .btn-wa:hover { background: #1ebe5d !important; transform: translateY(-1px); }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.14), transparent 26%),
                radial-gradient(circle at left bottom, rgba(255,255,255,.10), transparent 30%),
                linear-gradient(135deg, var(--merah) 0%, #c1121f 100%);
            padding: 118px 0 68px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-header .container {
            position: relative;
            z-index: 1;
            max-width: 920px;
        }
        .page-header::after {
            content: '';
            position: absolute;
            bottom: -1px; left: 0; right: 0;
            height: 40px;
            background: white;
            clip-path: ellipse(55% 100% at 50% 100%);
        }
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.15rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 0.85rem;
        }
        .page-header .lead {
            max-width: 760px;
            margin-left: auto;
            margin-right: auto;
            color: rgba(255,255,255,.88);
        }
        .page-header .breadcrumb {
            justify-content: center;
            margin-bottom: 0;
            gap: .35rem;
        }
        .page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,.55);
        }
        .page-header .breadcrumb-item, .page-header .breadcrumb-item a { color: rgba(255,255,255,.8); text-decoration: none; }
        .page-header .breadcrumb-item.active { color: white; }

        /* ===== SECTION TITLE ===== */
        .section-title { margin-bottom: 45px; }
        .section-label {
            display: inline-block;
            background: rgba(230,57,70,.1);
            color: var(--merah);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .section-title h2 { font-family: 'Playfair Display', serif; font-size: 2.1rem; font-weight: 700; }
        .divider { width: 55px; height: 4px; background: var(--merah); border-radius: 2px; margin: 12px auto 0; }

        /* ===== CARD ===== */
        .card { border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 18px rgba(0,0,0,.07); transition: all .3s; }
        .card:hover { transform: translateY(-6px); box-shadow: 0 14px 35px rgba(0,0,0,.13); }
        .card-img-top { height: 200px; object-fit: cover; }

        /* ===== BUTTONS ===== */
        .btn-merah { background: var(--merah); color: white; border: none; border-radius: 25px; padding: 10px 26px; font-weight: 600; transition: all .3s; }
        .btn-merah:hover { background: #c1121f; color: white; transform: translateY(-2px); }
        .btn-outline-merah { background: transparent; color: var(--merah); border: 2px solid var(--merah); border-radius: 25px; padding: 9px 24px; font-weight: 600; transition: all .3s; }
        .btn-outline-merah:hover { background: var(--merah); color: white; }

        /* ===== BADGE KATEGORI ===== */
        .badge-makanan { background: #ffd60a22; color: #e85d04; }
        .badge-minuman { background: #0077b622; color: #0077b6; }
        .badge-snack   { background: #2a9d8f22; color: #2a9d8f; }

        /* ===== FOOTER ===== */
        footer { background: var(--gelap); color: #bbb; padding: 60px 0 0; }
        footer h6 { color: white; font-weight: 700; margin-bottom: 18px; font-size: 1rem; }
        footer a { color: #999; text-decoration: none; display: block; margin-bottom: 7px; font-size: .9rem; transition: color .3s; }
        footer a:hover { color: var(--oranye); padding-left: 5px; }
        .footer-bottom { background: rgba(0,0,0,.35); margin-top: 40px; padding: 18px 0; text-align: center; font-size: .83rem; }
        .soc-icon {
            display: inline-flex; align-items: center; justify-content: center;
            width: 36px; height: 36px;
            background: rgba(255,255,255,.08); border-radius: 50%;
            color: white; font-size: .95rem; margin-right: 6px; text-decoration: none;
            transition: all .3s;
        }
        .soc-icon:hover { background: var(--merah); transform: translateY(-3px); color: white; }

        /* ===== WA FLOAT ===== */
        .wa-float {
            position: fixed; bottom: 24px; right: 24px; z-index: 9999;
        }
        .wa-float a {
            width: 54px; height: 54px; background: #25d366;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 1.6rem;
            box-shadow: 0 4px 20px rgba(37,211,102,.45);
            transition: all .3s; text-decoration: none;
        }
        .wa-float a:hover { transform: scale(1.12); }
    </style>

    @yield('extra-css')
</head>
<body>
@php
    $cartCount = collect(session('cart', []))->sum('qty');
@endphp

{{-- ==================== NAVBAR ==================== --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('beranda') }}">
            <div style="width:42px;height:42px;background:var(--merah);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-shop-window text-white fs-5"></i>
            </div>
            <div>
                <div class="brand-name">Cek Donna</div>
                <div class="brand-sub">Warunk & Kuliner</div>
            </div>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                {{-- MENU 1 --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                        <i class="bi bi-house-door me-1"></i>Beranda
                    </a>
                </li>
                {{-- MENU 2 --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}" href="{{ route('menu') }}">
                        <i class="bi bi-egg-fried me-1"></i>Menu
                    </a>
                </li>
                {{-- MENU 3 --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('artikel*') ? 'active' : '' }}" href="{{ route('artikel') }}">
                        <i class="bi bi-newspaper me-1"></i>Artikel
                    </a>
                </li>
                {{-- MENU 4 --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">
                        <i class="bi bi-telephone me-1"></i>Kontak
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('keranjang.*') ? 'active' : '' }}" href="{{ route('keranjang.index') }}">
                        <i class="bi bi-cart3 me-1"></i>Keranjang
                        @if ($cartCount > 0)
                            <span class="badge bg-danger rounded-pill ms-1">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-wa ms-lg-2" href="{{ route('admin.login') }}">
                        <i class="bi bi-shield-lock me-1"></i>Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ==================== KONTEN ==================== --}}
@yield('content')

{{-- ==================== FOOTER ==================== --}}
<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div style="width:40px;height:40px;background:var(--merah);border-radius:9px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-shop-window text-white fs-5"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Warunk Cek Donna</h6>
                        <small style="color:#666;font-size:.65rem;letter-spacing:1px;">KULINER NUSANTARA</small>
                    </div>
                </div>
                <p style="font-size:.88rem;line-height:1.8;">
                    Menyajikan cita rasa Nusantara yang autentik dengan bahan segar pilihan, harga ramah di kantong, dan suasana nyaman untuk semua kalangan.
                </p>
                <div class="mt-3">
                    <a href="https://www.instagram.com/warunkcekdonna?igsh=MXNmNm1nNDR3eGNsaQ==" class="soc-icon" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.tiktok.com/@cekdonna_?_r=1&_t=ZS-95zAXcletSy" class="soc-icon" target="_blank"><i class="bi bi-tiktok"></i></a>
                    <a href="https://wa.me/6285266405735" class="soc-icon" target="_blank"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>

            <div class="col-lg-4">
                <h6>Informasi</h6>
                <p style="font-size:.88rem;margin-bottom:10px;">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    Jl. Kelapa dua, Karawaci, Tangerang, Banten, Dekat Universitas Gunadarma
                </p>
                <p style="font-size:.88rem;margin-bottom:10px;">
                    <i class="bi bi-clock-fill text-warning me-2"></i>
                    Buka Setiap Hari: 11.00 – 03.00 WIB
                </p>
                <p style="font-size:.88rem;margin-bottom:10px;">
                    <i class="bi bi-telephone-fill text-success me-2"></i>
                    +62 812 7409 9333
                </p>
                <p style="font-size:.88rem;margin-bottom:10px;">
                    <i class="bi bi-envelope-fill" style="color:#0dcaf0;margin-right:8px;"></i>
                    info@warunkdonna.com
                </p>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="mb-0">© {{ date('Y') }} <strong style="color:var(--oranye)">Warunk Cek Donna</strong> — All Rights Reserved. Made with <i class="bi bi-heart-fill text-danger"></i></p>
    </div>
</footer>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- AOS --}}
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 750, once: true, offset: 80 });
    window.addEventListener('scroll', () => {
        document.querySelector('.navbar').style.padding = window.scrollY > 60 ? '8px 0' : '14px 0';
    });
</script>

@yield('extra-js')
</body>
</html>
