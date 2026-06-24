<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --merah: #e63946;
            --oranye: #f4a261;
            --gelap: #1a1a2e;
            --bg-soft: #fff8f3;
            --border: #f1d8c4;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: var(--gelap);
            background: radial-gradient(circle at top left, rgba(244,162,97,.25), transparent 30%), linear-gradient(135deg, var(--bg-soft) 0%, #ffffff 55%, #fffaf5 100%);
        }

        .login-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .login-card {
            border: 0;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 28px 80px rgba(15, 23, 36, .14);
            background: white;
        }

        .login-visual {
            background: linear-gradient(135deg, var(--merah) 0%, #c1121f 48%, var(--oranye) 100%);
            color: white;
            position: relative;
        }

        .login-visual::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(140deg, rgba(255,255,255,.22), transparent 50%);
            pointer-events: none;
        }

        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid rgba(255,255,255,.26);
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            backdrop-filter: blur(6px);
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .form-control {
            border-radius: 14px;
            padding: .85rem 1rem;
            border: 1px solid var(--border);
            box-shadow: none;
        }

        .form-control:focus {
            border-color: var(--oranye);
            box-shadow: 0 0 0 .2rem rgba(244,162,97,.16);
        }

        .btn-login {
            border-radius: 999px;
            padding: .9rem 1.2rem;
            background: linear-gradient(135deg, var(--merah) 0%, #c1121f 100%);
            color: white;
            border: 0;
            font-weight: 600;
            transition: all .2s ease;
        }

        .btn-login:hover,
        .btn-login:focus,
        .btn-login:active,
        .btn-login:focus-visible {
            background: linear-gradient(135deg, #c1121f 0%, var(--merah) 100%) !important;
            color: white !important;
            border-color: transparent !important;
            box-shadow: none !important;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <div class="container" style="max-width: 1020px;">
            <div class="row g-0 login-card bg-white">
                <div class="col-lg-5 login-visual p-4 p-lg-5 d-flex flex-column justify-content-between position-relative">
                    <div>
                        <div class="brand-pill mb-4">
                            <i class="bi bi-shop-window"></i>
                            <span class="fw-semibold">Cek Donna Admin</span>
                        </div>
                        <h1 class="login-title h2 mb-3">Admin Login</h1>
                        <p class="lead mb-0">Masuk untuk mengelola artikel, menu, testimoni, profil perusahaan, dan laporan PDF.</p>
                    </div>
                    <div class="small mt-4" style="opacity: .9;">
                        <div>Demo Login: admin@cekdonna.test / admin12345</div>
                    </div>
                </div>

                <div class="col-lg-7 p-4 p-lg-5 d-flex align-items-center">
                    <div class="w-100">
                        <h2 class="h4 fw-bold mb-2">Selamat datang kembali</h2>
                        <p class="text-muted mb-4">Silakan login untuk melanjutkan ke panel admin.</p>

                        @if ($errors->has('login') || session('error'))
                            <div class="alert alert-danger d-flex align-items-start gap-2" role="alert">
                                <i class="bi bi-exclamation-triangle-fill mt-1"></i>
                                <div>{{ $errors->first('login') ?: session('error') }}</div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.login.submit') }}" class="vstack gap-3">
                            @csrf
                            <div>
                                <label class="form-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div>
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <button type="submit" class="btn btn-login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
