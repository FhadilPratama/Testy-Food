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

// Controllers (Public)
use App\Http\Controllers\PublicAboutController;
use App\Http\Controllers\PublicBeritaController;
use App\Http\Controllers\PublicGalleryController;

// Model
use App\Models\About;

// ----------------------------------------------------------------------------
// Public Routes
// ----------------------------------------------------------------------------

// Halaman Home
Route::get("/", function(){
    return view("home");

});

// Halaman Tentang (Public)
Route::get('/tentang', function(){
    $about = About::first();
    return view('tentang', compact('about'));
});

// Public About
Route::get('/about', [PublicAboutController::class, 'index'])->name('public.about');

// Public Berita
Route::get('/berita', [PublicBeritaController::class, 'index'])->name('public.berita.index');

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
});
