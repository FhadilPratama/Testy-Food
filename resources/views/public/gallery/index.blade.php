@include('layouts.public.gallery.header') <!-- Header -->

<link rel="stylesheet" href="{{ asset('design/gallery.css') }}">    

 <!-- Slider Section -->
 <div class="slider-wrapper">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($galleries as $index => $item)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"> 
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="d-block slider-image" alt="Gambar Slider">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true">></span>
        </button>
    </div>
</div>

<!-- Gallery Grid Section -->
<div class="gallery-container">
    <div class="gallery-grid">
        @foreach ($galleries as $item)
            @if ($loop->iteration >= 2)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="Gambar Gallery">
                </div>
            @endif
        @endforeach
    </div>
</div>



@include('layouts.public.about.footer') <!-- Footer -->
