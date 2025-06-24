<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Tasty Food - Home</title>
    <link rel="stylesheet" href="{{ asset('design/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">

        <header class="header">
            <div class="logo-nav">
                <h1 class="logo">TASTY FOOD</h1>
                <nav class="navbar">
                    <a href="{{ url('/') }}">HOME</a>
                    <a href="{{ url('/about') }}">TENTANG</a>
                    <a href="{{ url('/berita') }}">BERITA</a>
                    <a href="{{ url('/gallery') }}">GALERI</a>
                    <a href="{{ url('/kontak') }}">KONTAK</a>
                </nav>
            </div>
        </header>

        <main class="content">
            <section class="text-left">
                <div class="line"></div>
                <h1>
                    <span class="light">HEALTHY</span><br>
                    <span class="bold">TASTY FOOD</span>
                </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
                    augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem
                    eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet
                    viverra ante.
                </p>
                <a href="{{ url('/about') }}" class="cta-button">TENTANG KAMI</a>
            </section>

            <div class="image-right">
                <img src="{{ asset('images/food.png') }}" alt="Tasty Food">
            </div>
        </main>
    </div>
    <section class="tentang-kami">
        <div class="tentang-container">
            <h2>TENTANG KAMI</h2>
            <p>{{ $about->description_2 }}</p>
            <div class="underline"></div>
        </div>
    </section>
    <section class="menu-section">
        <div class="menu-container">
            <div class="menu-card">
                <div class="menu-img">
                    <img src="{{ asset('images/menu1.png') }}" alt="Menu 1">
                </div>
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,
                </p>
            </div>
            <div class="menu-card">
                <div class="menu-img">
                    <img src="{{ asset('images/menu2.png') }}" alt="Menu 2">
                </div>
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,
                </p>
            </div>
            <div class="menu-card">
                <div class="menu-img">
                    <img src="{{ asset('images/menu3.png') }}" alt="Menu 3">
                </div>
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,
                </p>
            </div>
            <div class="menu-card">
                <div class="menu-img">
                    <img src="{{ asset('images/menu4.png') }}" alt="Menu 4">
                </div>
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellusornare, augue eu rutrum commodo,
                </p>
            </div>
        </div>
    </section>

    <section class="berita-kami">
        <h2 class="berita-title">BERITA KAMI</h2>

        <div class="berita-grid">
            {{-- Card Berita Utama (statis) --}}
            <div class="berita-card utama">
                <img src="{{ asset('images/berita1.jpg') }}" alt="Berita Utama">
                <div class="berita-content">
                    <h3>LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus
                        tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et
                        suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio.
                    </p>
                    <a href="{{ url('/berita') }}" class="baca-selengkapnya">Baca selengkapnya</a>
                </div>
            </div>

            {{-- Loop Card Berita Kecil --}}
            @foreach($beritaKecil as $berita)
                <div class="berita-card kecil">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    <div class="berita-content">
                        <h3>{{ $berita->judul }}</h3>
                        <p>{{ strip_tags($berita->konten) }}</p>
                        <a href="{{url('/berita')}}" class="baca-selengkapnya">Baca selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="galeri-kami">
        <h2 class="judul">GALERI KAMI</h2>

        <div class="grid-galeri">
            @foreach($galleries as $gallery)
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}">
            @endforeach
        </div>

        <div class="lihat-lebih">
            <a href="{{ url('/gallery')}}" class="btn-lihat">LIHAT LEBIH BANYAK</a>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h2 class="brand-title">Tasty Food</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="footer-social">
                    <a href="#">
                        <img src="{{ asset('images/001-facebook.png') }}" alt="Facebook" class="social-img">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/002-twitter.png') }}" alt="Twitter" class="social-img">
                    </a>
                </div>
            </div>

            <div class="footer-links">
                <h3>Useful links</h3>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Hewan</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Testimonial</a></li>
                </ul>
            </div>

            <div class="footer-links">
                <h3>Privacy</h3>
                <ul>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                    <li><a href="#">Servis</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h3>Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon">✉️</span>
                        tastyfood@gmail.com
                    </li>
                    <li>
                        <span class="icon">📞</span>
                        +62 812 3456 7890
                    </li>
                    <li>
                        <span class="icon">📍</span>
                        Kota Bandung, Jawa Barat
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright ©2023 All rights reserved</p>
        </div>
    </footer>

</body>

</html>