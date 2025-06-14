<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tasty Food')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('design/about.css') }}">    

    @stack('styles')
    @yield('head')
</head>

<body>

    <!-- Header -->
    <nav class="site-header navbar navbar-expand-lg py-4">
        <div class="container">
            <a class="navbar-brand logo fw-semibold fs-4" href="">TASTY FOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon text-light"><i class="bi bi-list fs-1 text-light"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link px-3" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="http://127.0.0.1:8000/about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Berita</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Bagian Header) -->
    <header class="hero-tentang">
        <div class="hero-content">
            <h1 class="">TENTANG KAMI</h1>
        </div>
    </header>


    <!-- Main Content -->
    <main class="">
