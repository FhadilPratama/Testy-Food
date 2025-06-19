@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 mb-0">Tambah Berita</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        @error('judul') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten</label>
                        <textarea id="konten" name="konten" rows="5" class="form-control"
                            required>{{ old('konten') }}</textarea>
                        @error('konten') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar (opsional)</label>
                        <input type="file" id="gambar" name="gambar" class="form-control">
                        @error('gambar') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Simpan
                        </button>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection