<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // List (Admin)
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.berita.index', compact('beritas'));
    }

    // Form create (Admin)
    public function create()
    {
        return view('admin.berita.create');
    }

    // Simpan (Admin)
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('berita', 'public');
            $validate['gambar'] = $file;
        }

        Berita::create($validate);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil disimpan');
    }

    // Form edit (Admin)
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // Update (Admin)
    public function update(Request $request, Berita $berita)
    {
        $validate = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('berita', 'public');
            $validate['gambar'] = $file;
        }

        $berita->update($validate);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }
    // Hapus (Admin)
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}

