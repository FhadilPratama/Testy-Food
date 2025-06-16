@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
    <h1>Tambah Berita</h1>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}"
                required>
            @error('judul')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea id="konten" name="konten" class="form-control" rows="5" required>{{ old('konten') }}</textarea>
            @error('konten')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input id="gambar" name="gambar" class="form-control" type="file">
            @error('gambar')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
