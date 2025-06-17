<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class PublicGalleryController extends Controller
{
    public function index()
    {
        // Mengambil semua gallery
        $galleries = Gallery::all();

        return view('public.gallery.index', compact('galleries'));
    }
}
