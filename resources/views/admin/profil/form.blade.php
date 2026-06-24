@extends('admin.layouts.app')

@section('title', $title)
@section('page-title', $title)

@section('content')
<div class="card-soft p-4">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div class="row g-3">
            <div class="col-lg-8">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $profilPerusahaan->nama_perusahaan) }}" class="form-control @error('nama_perusahaan') is-invalid @enderror">
                @error('nama_perusahaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email', $profilPerusahaan->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-6">
                <label class="form-label">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $profilPerusahaan->telepon) }}" class="form-control @error('telepon') is-invalid @enderror">
                @error('telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Tentang</label>
                <textarea name="tentang" rows="4" class="form-control @error('tentang') is-invalid @enderror">{{ old('tentang', $profilPerusahaan->tentang) }}</textarea>
                @error('tentang')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Visi</label>
                <textarea name="visi" rows="3" class="form-control @error('visi') is-invalid @enderror">{{ old('visi', $profilPerusahaan->visi) }}</textarea>
                @error('visi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Misi</label>
                <textarea name="misi" rows="4" class="form-control @error('misi') is-invalid @enderror">{{ old('misi', $profilPerusahaan->misi) }}</textarea>
                @error('misi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $profilPerusahaan->alamat) }}</textarea>
                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button class="btn btn-dark rounded-pill px-4" type="submit">Simpan</button>
            <a href="{{ route('admin.profil.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
