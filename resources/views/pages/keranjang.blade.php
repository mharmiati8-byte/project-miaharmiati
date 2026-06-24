@extends('layouts.app')
@section('title', 'Keranjang')

@section('content')

<section class="page-header text-white">
    <div class="container">
        <div class="section-label text-white border border-white border-opacity-25 bg-white bg-opacity-10 mb-3">Keranjang</div>
        <h1 class="display-4 fw-bold mb-3">Keranjang Pesanan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active text-white">Keranjang</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5 py-lg-6">
    <div class="container">
        @if (count($items) > 0)
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <h2 class="h4 fw-bold mb-1">Item di Keranjang</h2>
                                    <p class="text-muted mb-0">Semua makanan yang sudah ditambahkan tersimpan di sini.</p>
                                </div>
                                <form action="{{ route('keranjang.clear') }}" method="POST" onsubmit="return confirm('Kosongkan keranjang?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-pill">
                                        Kosongkan
                                    </button>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-end">Harga</th>
                                            <th class="text-end">Subtotal</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        @if ($item['image'] && file_exists(public_path('storage/' . $item['image'])))
                                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['nama_menu'] }}" style="width:70px;height:70px;object-fit:cover;border-radius:14px;">
                                                        @else
                                                            <div class="bg-light text-muted d-flex align-items-center justify-content-center" style="width:70px;height:70px;border-radius:14px;">-</div>
                                                        @endif
                                                        <div>
                                                            <div class="fw-semibold">{{ $item['nama_menu'] }}</div>
                                                            <small class="text-muted">Masuk ke keranjang</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{ $item['qty'] }}</td>
                                                <td class="text-end">Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                                                <td class="text-end fw-semibold">Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                                <td class="text-end">
                                                    <form action="{{ route('keranjang.destroy', $item['menu_id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 shadow-sm border-0 bg-dark text-white">
                        <div class="card-body p-4 d-flex flex-column">
                            <h2 class="h4 fw-bold mb-3">Ringkasan</h2>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Total item</span>
                                <span class="fw-semibold">{{ count($items) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <span>Total belanja</span>
                                <span class="fw-bold fs-4">Rp{{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-white-50 small">Gunakan halaman ini sebagai tempat sementara sebelum dikirim ke WhatsApp atau diproses lanjut.</p>
                            <a href="{{ route('keranjang.whatsapp') }}" class="btn btn-success rounded-pill mb-2">
                                <i class="bi bi-whatsapp me-1"></i>Kirim ke WhatsApp
                            </a>
                            <a href="{{ route('menu') }}" class="btn btn-outline-light rounded-pill mt-auto">Lanjut Belanja</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-soft p-5 text-center">
                <i class="bi bi-cart3 display-1 text-danger mb-3"></i>
                <h2 class="h4 fw-bold">Keranjang masih kosong</h2>
                <p class="text-muted mb-4">Tambahkan makanan dari halaman menu untuk mulai mengisi keranjang.</p>
                <a href="{{ route('menu') }}" class="btn btn-danger rounded-pill px-4">Pilih Menu</a>
            </div>
        @endif
    </div>
</section>

@endsection
