<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --merah: #e63946;
            --oranye: #f4a261;
            --gelap: #1a1a2e;
            --bg: #fff8f3;
            --panel: #fffdf9;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(230,57,70,.10), transparent 32%),
                radial-gradient(circle at top right, rgba(244,162,97,.14), transparent 28%),
                linear-gradient(180deg, #fff 0%, var(--bg) 100%);
            color: var(--gelap);
        }

        .admin-shell {
            min-height: 100vh;
        }

        .sidebar {
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.10), transparent 24%),
                linear-gradient(180deg, var(--merah) 0%, #b71c1c 100%);
            color: #fff;
            min-height: 100vh;
            position: sticky;
            top: 0;
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--merah) 0%, var(--oranye) 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .nav-pills .nav-link {
            color: rgba(255,255,255,.78);
            border-radius: 14px;
            padding: .8rem 1rem;
        }

        .nav-pills .nav-link.active,
        .nav-pills .nav-link:hover {
            background: rgba(255,255,255,.14);
            color: #fff;
        }

        .card-soft {
            background: rgba(255,255,255,.75);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(19,34,56,.08);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(19,34,56,.08);
        }

        .topbar {
            background: rgba(255,255,255,.8);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(19,34,56,.08);
            border-radius: 20px;
        }

        .badge-accent {
            background: rgba(230,57,70,.12);
            color: var(--merah);
        }

        .btn-outline-dark {
            border-color: rgba(230,57,70,.3);
            color: var(--gelap);
        }

        .btn-outline-dark:hover {
            background: var(--merah);
            border-color: var(--merah);
            color: #fff;
        }

        .table thead th {
            font-size: .8rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #6c757d;
            border-bottom-width: 1px;
        }
    </style>
    @yield('extra-css')
</head>
<body>
<div class="admin-shell container-fluid px-0">
    <div class="row g-0">
        <aside class="col-lg-3 col-xl-2 sidebar p-4">
            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="brand-mark">CD</div>
                <div>
                    <div class="fw-bold">Cek Donna</div>
                    <small class="text-white-50">Administrator</small>
                </div>
            </div>

            <nav class="nav flex-column nav-pills gap-2">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                <a class="nav-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}" href="{{ route('admin.artikel.index') }}"><i class="bi bi-newspaper me-2"></i>Artikel / Berita</a>
                <a class="nav-link {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}"><i class="bi bi-basket me-2"></i>Produk / Layanan</a>
                <a class="nav-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}" href="{{ route('admin.profil.index') }}"><i class="bi bi-building me-2"></i>Profil Perusahaan</a>
                <a class="nav-link" href="{{ route('admin.laporan.artikel.pdf') }}"><i class="bi bi-file-earmark-pdf me-2"></i>Report PDF</a>
            </nav>

            <div class="mt-4 pt-4 border-top border-white border-opacity-10">
                <div class="small text-white-50 mb-2">Login sebagai</div>
                <div class="fw-semibold">{{ session('admin_user_name', 'Administrator') }}</div>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 rounded-pill">Logout</button>
                </form>
            </div>
        </aside>

        <main class="col-lg-9 col-xl-10 p-4 p-lg-5">
            <div class="topbar card-soft p-3 p-lg-4 mb-4 d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-lg-center">
                <div>
                    <div class="badge badge-accent rounded-pill px-3 py-2 mb-2">Dashboard Admin</div>
                    <h1 class="h3 mb-1">@yield('page-title', 'Panel Kontrol')</h1>
                    <p class="text-muted mb-0">Kelola konten website dari satu tempat.</p>
                </div>
                <div class="text-lg-end">
                    <div class="small text-muted">Sesi aktif</div>
                    <div class="fw-semibold">{{ session('admin_user_name', 'Administrator') }}</div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger border-0 shadow-sm">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('extra-js')
</body>
</html>
