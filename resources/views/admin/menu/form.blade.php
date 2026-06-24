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
                <label class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" class="form-control @error('nama_menu') is-invalid @enderror">
                @error('nama_menu')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-4">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                    @foreach (['Makanan', 'Minuman', 'Snack'] as $kategori)
                        <option value="{{ $kategori }}" @selected(old('kategori', $menu->kategori) === $kategori)>{{ $kategori }}</option>
                    @endforeach
                </select>
                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-6">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $menu->harga) }}" class="form-control @error('harga') is-invalid @enderror">
                @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-lg-6">
                <label class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if ($menu->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->nama_menu }}" style="width:120px;height:120px;object-fit:cover;border-radius:16px;">
                    </div>
                @endif
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button class="btn btn-dark rounded-pill px-4" type="submit">Simpan</button>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
