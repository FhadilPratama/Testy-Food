@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Data Tentang</h1>

        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $about->title }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ $about->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Deskripsi2</label>
                <textarea name="description_2" class="form-control">{{ $about->description_2 }}</textarea>
            </div>

            <div class="mb-3">
                <label>Visi</label>
                <textarea name="visi" class="form-control">{{ $about->visi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Misi</label>
                <textarea name="misi" class="form-control">{{ $about->misi }}</textarea>
            </div>

            <div class="mb-4">
                <label><strong>Gambar</strong></label>
                <div class="row text-center">
                    @foreach(['image1', 'image2', 'image3', 'image4', 'image5'] as $image)
                        <div class="col-md-2 col-4 mb-3">
                            <div><strong>{{ ucfirst($image) }}</strong></div>
                            @if($about->$image)
                                <img src="{{ asset('storage/' . $about->$image) }}" class="img-fluid mb-2" style="max-width: 100px;"><br>
                            @endif
                            <input type="file" name="{{ $image }}" class="form-control form-control-sm">
                        </div>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary mb-3" style="margin-top: 16px;">← Kembali</a>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
@endsection
