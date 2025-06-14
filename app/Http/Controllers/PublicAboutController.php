<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class PublicAboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('public.about.index', compact('about'));
    }
}
