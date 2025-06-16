@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
    <h1>Edit Berita</h1>

    <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input id="judul" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}"> 
            @error('judul')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea id="konten" name="konten" class="form-control" rows="5">{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input id="gambar" name="gambar" type="file" class="form-control">
            @error('gambar')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" width="200" class="img-fluid mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
