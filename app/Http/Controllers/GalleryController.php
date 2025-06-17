<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // List (Admin)
    public function index()
    {
        // Mengambil 5 per halaman
        $galleries = Gallery::paginate(5);
        return view('admin.gallery.index', compact('galleries'));
    }


    // Form create (Admin)
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Simpan (Admin)
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('galleries', 'public');
            $validate['image_path'] = $file;
        }

        Gallery::create($validate);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil disimpan');
    }

    // Form edit (Admin)
    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    // Update (Admin)
    public function update(Request $request, Gallery $gallery)
    {
        $validate = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_path && \Storage::exists('public/' . $gallery->image_path)) {
                \Storage::delete('public/' . $gallery->image_path);
            }

            $file = $request->file('image')->store('galleries', 'public');
            $validate['image_path'] = $file;
        }

        $gallery->update($validate);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil diupdate');
    }

    // Hapus (Admin)
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path && \Storage::exists('public/' . $gallery->image_path)) {
            \Storage::delete('public/' . $gallery->image_path);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery berhasil dihapus');
    }
}

