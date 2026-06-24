@extends('admin.layouts.app')

@section('title', 'Kelola Profil Perusahaan')
@section('page-title', 'Profil Perusahaan')

@section('content')
<div class="card-soft p-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <h2 class="h5 fw-bold mb-1">Data Profil Perusahaan</h2>
            <p class="text-muted mb-0">Simpan informasi perusahaan yang ditampilkan di website.</p>
        </div>
        <a href="{{ route('admin.profil.create') }}" class="btn btn-dark rounded-pill">
            <i class="bi bi-plus-lg me-1"></i>Tambah Profil
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Logo</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profilPerusahaans as $profil)
                    <tr>
                        <td class="fw-semibold">{{ $profil->nama_perusahaan }}</td>
                        <td>{{ $profil->email }}</td>
                        <td>{{ $profil->telepon }}</td>
                        <td>
                            @if ($profil->logo)
                                <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo" style="width:64px;height:64px;object-fit:cover;border-radius:14px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.profil.edit', $profil) }}" class="btn btn-sm btn-outline-dark rounded-pill">Edit</a>
                            <form action="{{ route('admin.profil.destroy', $profil) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus profil ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data profil perusahaan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $profilPerusahaans->links() }}
</div>
@endsection
