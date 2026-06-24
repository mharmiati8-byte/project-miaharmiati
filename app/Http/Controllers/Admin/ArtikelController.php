<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin.artikel.index', [
            'artikels' => Artikel::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.artikel.form', [
            'artikel' => new Artikel(),
            'action' => route('admin.artikel.store'),
            'method' => 'POST',
            'title' => 'Tambah Artikel',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'in:Berita,Promo,Tips'],
            'ringkasan' => ['nullable', 'string'],
            'konten' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        $validated['image'] = $request->file('image')->store('artikels', 'public');

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.form', [
            'artikel' => $artikel,
            'action' => route('admin.artikel.update', $artikel),
            'method' => 'PUT',
            'title' => 'Edit Artikel',
        ]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $imageRules = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'];

        if (! $artikel->image) {
            $imageRules = ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'];
        }

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'in:Berita,Promo,Tips'],
            'ringkasan' => ['nullable', 'string'],
            'konten' => ['nullable', 'string'],
            'image' => $imageRules,
        ]);

        if ($request->hasFile('image')) {
            if ($artikel->image && ! file_exists(public_path(ltrim($artikel->image, '/')))) {
                Storage::disk('public')->delete($artikel->image);
            }

            $validated['image'] = $request->file('image')->store('artikels', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->image && ! file_exists(public_path(ltrim($artikel->image, '/')))) {
            Storage::disk('public')->delete($artikel->image);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
