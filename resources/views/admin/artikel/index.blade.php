@extends('admin.layouts.app')

@section('title', 'Kelola Artikel')
@section('page-title', 'Artikel / Berita')

@section('content')
<div class="card-soft p-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <h2 class="h5 fw-bold mb-1">Daftar Artikel</h2>
            <p class="text-muted mb-0">Kelola seluruh konten artikel, promo, dan tips.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.laporan.artikel.pdf') }}" class="btn btn-outline-danger rounded-pill">
                <i class="bi bi-file-earmark-pdf me-1"></i>Lihat PDF
            </a>
            <a href="{{ route('admin.artikel.create') }}" class="btn btn-dark rounded-pill">
                <i class="bi bi-plus-lg me-1"></i>Tambah Artikel
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Ringkasan</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr>
                        <td style="width:110px;">
                            <img src="{{ $artikel->image_url }}" alt="{{ $artikel->judul }}" class="rounded-4 border" style="width:88px;height:64px;object-fit:cover;">
                        </td>
                        <td class="fw-semibold">{{ $artikel->judul }}</td>
                        <td><span class="badge badge-accent rounded-pill">{{ $artikel->kategori }}</span></td>
                        <td>{{ \Illuminate\Support\Str::limit($artikel->ringkasan, 90) }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.artikel.edit', $artikel) }}" class="btn btn-sm btn-outline-dark rounded-pill">Edit</a>
                            <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $artikels->links('vendor.pagination.neat') }}
    </div>
</div>
@endsection
