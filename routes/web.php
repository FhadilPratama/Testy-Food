<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\PublicAboutController;
use App\Models\About;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    $about = About::first();
    return view('tentang', compact('about'));
});



// Auth Routes (public)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (hanya user yang sudah login yang bisa akses)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Role management
    Route::resource('roles', RoleController::class);

    // User management
    Route::resource('users', UserController::class);
});

// Kalau masih pakai auth scaffolding Laravel Breeze atau Jetstream, bisa hapus ini:
// require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');
    Route::get('about/edit', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::post('about/update', [AdminAboutController::class, 'update'])->name('about.update');
});

Route::get('/about', [PublicAboutController::class, 'index'])->name('public.about');
