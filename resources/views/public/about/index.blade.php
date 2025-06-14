@include('layouts.public.about.header')

<div class="about-container">

    <!-- Section abu-abu Tasty Food -->
    <div class="grey-section">
        <div class="d-flex">
            <div class="flex-grow-1 text-content">
                <h2 class="tasty">{{ $about->title }}</h2>
                <p class="deskripsi">{{ $about->description }}</p>
                <p class = "deskripsi2">{{ $about->description_2 }}</p>
            </div>

            <div class="image-group d-flex gap-4 image1">
                @if($about->image1)
                    <img src="{{ asset('storage/' . $about->image1) }}" alt="Gambar 1" class="img-fluid rounded shadow">
                @endif

                @if($about->image2)
                    <img src="{{ asset('storage/' . $about->image2) }}" alt="Gambar 2" class="img-fluid rounded shadow">
                @endif
            </div>
        </div>
    </div>

    <!-- Section putih Visi & Misi -->
    <div class="about-section">
        <div class="d-flex image3">
            @if($about->image3)
                <img src="{{ asset('storage/' . $about->image3) }}" alt="Gambar 3" class="img-fluid rounded shadow">
            @endif

            @if($about->image4)
                <img src="{{ asset('storage/' . $about->image4) }}" alt="Gambar 4" class="img-fluid rounded shadow">
            @endif

            <div class="flex-grow-1 visi-text">
                <h3 class="visi">Visi</h3>
                <p>{{ $about->visi }}</p>
            </div>
        </div>

        <div class="d-flex">
            <div class="flex-grow-1 misi-text">
                <h3>Misi</h3>
                <p>{{ $about->misi }}</p>
            </div>

            @if($about->image5)
                <img src="{{ asset('storage/' . $about->image5) }}" alt="Gambar 5" class="img-fluid rounded shadow img-landscape">
            @endif
        </div>
    </div>

</div>


@include('layouts.public.about.footer')