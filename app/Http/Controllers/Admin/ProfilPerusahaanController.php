<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        return view('admin.profil.index', [
            'profilPerusahaans' => ProfilPerusahaan::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.profil.form', [
            'profilPerusahaan' => new ProfilPerusahaan(),
            'action' => route('admin.profil.store'),
            'method' => 'POST',
            'title' => 'Tambah Profil Perusahaan',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'tentang' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('profil', 'public');
        }

        ProfilPerusahaan::create($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit(ProfilPerusahaan $profil)
    {
        return view('admin.profil.form', [
            'profilPerusahaan' => $profil,
            'action' => route('admin.profil.update', $profil),
            'method' => 'PUT',
            'title' => 'Edit Profil Perusahaan',
        ]);
    }

    public function update(Request $request, ProfilPerusahaan $profil)
    {
        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'tentang' => ['nullable', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }

            $validated['logo'] = $request->file('logo')->store('profil', 'public');
        }

        $profil->update($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy(ProfilPerusahaan $profil)
    {
        if ($profil->logo) {
            Storage::disk('public')->delete($profil->logo);
        }

        $profil->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Profil perusahaan berhasil dihapus.');
    }
}
