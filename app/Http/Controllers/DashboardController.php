<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahGallery = Gallery::count();
        $jumlahPesan = Contact::count();
        $jumlahUser = User::count();

        $beritaTerbaru = Berita::latest()->take(5)->get();

        $beritaPerBulan = Berita::select(
                DB::raw("COUNT(*) as jumlah"),
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan")
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $user = Auth::user();

        return view('dashboard.index', compact(
            'jumlahBerita',
            'jumlahGallery',
            'jumlahPesan',
            'jumlahUser',
            'beritaTerbaru',
            'beritaPerBulan',
            'user'
        ));
    }
}
