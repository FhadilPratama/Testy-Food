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

//
// ----------------------------------------------------------------------------
// Public Routes (Tanpa Login / Auth)
// ----------------------------------------------------------------------------

Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', function () {
    $about = About::first();
    return view('tentang', compact('about'));
});
Route::get('/about', [PublicAboutController::class, 'index'])->name('public.about');
Route::get('/berita', [PublicBeritaController::class, 'index'])->name('public.berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/gallery', [PublicGalleryController::class, 'index'])->name('public.gallery.index');
Route::get('/kontak', [PublicContactController::class, 'create'])->name('public.contacts.create');
Route::post('/kontak', [PublicContactController::class, 'store'])->name('public.contacts.store');

//
// ----------------------------------------------------------------------------
// Authentication Routes
// ----------------------------------------------------------------------------

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//
// ----------------------------------------------------------------------------
// Protected Routes (Butuh Login + Permission)
// ----------------------------------------------------------------------------

Route::middleware(['auth'])->group(function () {

    // Dashboard - Bisa diakses oleh semua admin yang punya izin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('permission:access dashboard')
        ->name('dashboard.index');

    // Role Management - Hanya untuk yang punya izin manage roles
    Route::resource('roles', RoleController::class)
        ->middleware('permission:manage roles');

    // User Management - Hanya untuk yang punya izin manage users
    Route::resource('users', UserController::class)
        ->middleware('permission:manage users');

    // Admin Routes (Dikelompokkan dengan prefix dan name)
    Route::prefix('admin')->name('admin.')->group(function () {

        // Tentang (About)
        Route::middleware('permission:manage about')->group(function () {
            Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');
            Route::get('about/edit', [AdminAboutController::class, 'edit'])->name('about.edit');
            Route::post('about/update', [AdminAboutController::class, 'update'])->name('about.update');
        });

        // Berita (News)
        Route::middleware('permission:manage berita')->group(function () {
            Route::resource('berita', BeritaController::class)
                ->parameters(['berita' => 'berita']);
        });

        // Galeri
        Route::middleware('permission:manage gallery')->group(function () {
            Route::resource('gallery', GalleryController::class);
        });

        // Kontak
        Route::middleware('permission:manage kontak')->group(function () {
            Route::resource('contacts', ContactController::class);
        });
    });
});
