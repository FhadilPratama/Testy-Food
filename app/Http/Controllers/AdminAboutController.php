<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AdminAboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_2' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image4' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'image5' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $about = About::first() ?? new About();

        $about->fill($validated);

        foreach (['image1', 'image2', 'image3', 'image4', 'image5'] as $image) {
            if ($request->hasFile($image)) {
                if ($about->$image && \Storage::disk('public')->exists($about->$image)) {
                    \Storage::disk('public')->delete($about->$image);
                }

                $path = $request->file($image)->store('abouts', 'public');
                $about->$image = $path;
            }
        }


        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil disimpan!');
    }

}