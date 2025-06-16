<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class PublicBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();

        return view('public.berita.index', compact('berita'));
    }
}