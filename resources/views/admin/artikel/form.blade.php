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
                <label class="form-label">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                    @foreach (['Berita', 'Promo', 'Tips'] as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $artikel->kategori) === $kategori)>{{ $kategori }}</option>
                    @endforeach
                </select>
                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Ringkasan</label>
                <textarea name="ringkasan" rows="3" class="form-control @error('ringkasan') is-invalid @enderror">{{ old('ringkasan', $artikel->ringkasan) }}</textarea>
                @error('ringkasan')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Konten</label>
                <textarea name="konten" rows="8" class="form-control @error('konten') is-invalid @enderror">{{ old('konten', $artikel->konten) }}</textarea>
                @error('konten')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-12">
                <label class="form-label">Gambar Artikel</label>
                <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                <div class="form-text">Wajib diisi untuk artikel baru. Format: JPG, PNG, atau WEBP.</div>
                @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                @if ($artikel->image)
                    <div class="mt-3">
                        <div class="small text-muted mb-2">Gambar saat ini</div>
                        <img src="{{ $artikel->image_url }}" alt="{{ $artikel->judul }}" class="rounded-4 border" style="width:180px;height:120px;object-fit:cover;">
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button class="btn btn-dark rounded-pill px-4" type="submit">Simpan</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
