@extends('layouts.app')

@section('title', 'Tambah Gallery')

@section('content')
    <h1>Tambah Gallery</h1>

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <span class="text-danger mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Judul (opsional)</label>
            <input type="text" name="title" id="title" class="form-control">
            @error('title')
                <span class="text-danger mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
