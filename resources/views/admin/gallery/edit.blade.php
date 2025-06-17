@extends('layouts.app')

@section('title', 'Edit Gallery')

@section('content')
    <h1>Edit Gallery</h1>

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <span class="text-danger mt-1 d-block">{{ $message }}</span>
            @enderror

            @if ($gallery->image_path)
                <img src="{{ asset('storage/' . $gallery->image_path) }}" width="100" class="img-thumbnail mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul (opsional)</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}"> 
            @error('title')
                <span class="text-danger mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
