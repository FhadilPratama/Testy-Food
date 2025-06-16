@include('layouts.public.berita.header')

<!-- Include file CSS custom -->
<link rel="stylesheet" href="{{ asset('design/berita.css') }}">

<!-- === BERITA HIGHLIGHT FULL WIDTH === -->
@foreach ($berita as $item)
    @if ($item->id == 2)
        <div class="berita-highlight-wrapper">
            <div class="berita-highlight">
                <div class="berita-highlight__image">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita">
                </div>

                <div class="berita-highlight__content">
                    <h2>{{ $item->judul }}</h2>
                    <p>{{ $item->konten }}</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
        </div>
    @endif
@endforeach

<!-- === BERITA LAINNYA === -->
<div class="berita-lainnya-wrapper">
    <div class="kontainer">
        <h2 class="judul-berita-lainnya">Berita Lainnya</h2>
        <section class="berita-list">
            @foreach ($berita as $item)
                @if ($item->id != 2)
                    <div class="berita-card">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita">
                        <div class="berita-card__content">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ $item->konten }}</p>
                            <div class="link-dan-titik">
                                <a href="#">Baca selengkapnya</a>
                                <span class="titik">...</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
        <h2 class="judul-berita-lainnya">Berita Lainnya</h2>
        <section class="berita-list">
            @foreach ($berita as $item)
                @if ($item->id != 2)
                    <div class="berita-card">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita">
                        <div class="berita-card__content">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ $item->konten }}</p>
                            <div class="link-dan-titik">
                                <a href="#">Baca selengkapnya</a>
                                <span class="titik">...</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
</div>


@include('layouts.public.about.footer')