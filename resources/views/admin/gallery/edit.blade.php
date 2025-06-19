@extends('layouts.app')

@section('title', 'Edit Gallery')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">Edit Gallery</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Baru (jika ingin diganti)</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($gallery->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="120" class="img-thumbnail shadow-sm">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul (opsional)</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
