<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::first();
        $beritaKecil = Berita::latest()->take(4)->get();
        $galleries = Gallery::latest()->take(6)->get(); // Ambil 6 data galeri terbaru

        return view('public.home', compact('about', 'beritaKecil', 'galleries'));
    }
}
