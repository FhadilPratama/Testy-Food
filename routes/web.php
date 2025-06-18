<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

// Controllers (Admin)
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;

// Controllers (Public)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicAboutController;
use App\Http\Controllers\PublicBeritaController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\PublicContactController;

// Model
use App\Models\About;

// ----------------------------------------------------------------------------
// Public Routes
// ----------------------------------------------------------------------------

// Halaman Home

Route::get('/', [HomeController::class, 'index']);


// Halaman Tentang (Public)
Route::get('/tentang', function(){
    $about = About::first();
    return view('tentang', compact('about'));
});

// Public About
Route::get('/about', [PublicAboutController::class, 'index'])->name('public.about');

// Public Berita
Route::get('/berita', [PublicBeritaController::class, 'index'])->name('public.berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Public Gallery
Route::get('/gallery', [PublicGalleryController::class, 'index'])->name('public.gallery.index');

// ----------------------------------------------------------------------------
// Auth Routes
// ----------------------------------------------------------------------------

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ----------------------------------------------------------------------------
// Dashboard (protected)
// ----------------------------------------------------------------------------

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// ----------------------------------------------------------------------------
// Role Management (protected)
// ----------------------------------------------------------------------------

Route::resource('roles', RoleController::class);

// ----------------------------------------------------------------------------
// User Management (protected)
// ----------------------------------------------------------------------------

Route::resource('users', UserController::class);

// ----------------------------------------------------------------------------
// Administrator (protected)
// ----------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->group(function(){
    // About
    Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');
    Route::get('about/edit', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::post('about/update', [AdminAboutController::class, 'update'])->name('about.update');    

    // Berita (CRUD)
    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);    

    // Gallery (CRUD)
    Route::resource('gallery', GalleryController::class);

    Route::resource('contacts', ContactController::class);
});

Route::get('/kontak', [PublicContactController::class, 'create'])->name('public.contacts.create');
Route::post('/kontak', [PublicContactController::class, 'store'])->name('public.contacts.store');