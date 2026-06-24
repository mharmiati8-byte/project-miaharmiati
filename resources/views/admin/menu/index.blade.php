@extends('admin.layouts.app')

@section('title', 'Kelola Produk / Layanan')
@section('page-title', 'Produk / Layanan')

@section('content')
<div class="card-soft p-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <h2 class="h5 fw-bold mb-1">Daftar Produk / Layanan</h2>
            <p class="text-muted mb-0">Upload gambar aktif untuk setiap item menu dan lihat laporan PDF produk.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.laporan.menu.pdf') }}" class="btn btn-outline-danger rounded-pill">
                <i class="bi bi-file-earmark-pdf me-1"></i>Lihat PDF
            </a>
            <a href="{{ route('admin.menu.create') }}" class="btn btn-dark rounded-pill">
                <i class="bi bi-plus-lg me-1"></i>Tambah Data
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td class="fw-semibold">{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>
                            @if ($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}" style="width:64px;height:64px;object-fit:cover;border-radius:14px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.menu.edit', $menu) }}" class="btn btn-sm btn-outline-dark rounded-pill">Edit</a>
                            <form action="{{ route('admin.menu.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data menu.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $menus->links() }}
</div>
@endsection
