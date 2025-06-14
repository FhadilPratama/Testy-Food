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

            @foreach(['image1', 'image2', 'image3'] as $image)
                <div class="mb-3">
                    <label>{{ ucfirst($image) }}</label><br>
                    @if($about->$image)
                        <img src="{{ asset('storage/' . $about->$image) }}" width="150"><br>
                    @endif
                    <input type="file" name="{{ $image }}">
                </div>
            @endforeach

            @foreach(['image4', 'image5'] as $image)
                <div class="mb-3">
                    <label>{{ ucfirst($image) }}</label><br>
                    @if($about->$image)
                        <img src="{{ asset('storage/' . $about->$image) }}" width="150"><br>
                    @endif
                    <input type="file" name="{{ $image }}">
                </div>
            @endforeach


            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
@endsection