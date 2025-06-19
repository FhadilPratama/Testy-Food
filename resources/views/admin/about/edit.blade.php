@extends('layouts.app')

@section('title', 'Edit Tentang')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i> Edit Data Tentang</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $about->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi 2</label>
                    <textarea name="description_2" class="form-control" rows="3">{{ $about->description_2 }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Visi</label>
                    <textarea name="visi" class="form-control" rows="3">{{ $about->visi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Misi</label>
                    <textarea name="misi" class="form-control" rows="3">{{ $about->misi }}</textarea>
                </div>

                <h5 class="fw-semibold mb-3">Upload Gambar</h5>
                <div class="row text-center">
                    @foreach(['image1', 'image2', 'image3', 'image4', 'image5'] as $image)
                        <div class="col-6 col-md-2 mb-4">
                            <div class="border p-2 rounded shadow-sm">
                                <strong>{{ ucfirst($image) }}</strong><br>
                                @if($about->$image)
                                    <img src="{{ asset('storage/' . $about->$image) }}" class="img-fluid mt-2 mb-2" style="max-height: 100px;">
                                @endif
                                <input type="file" name="{{ $image }}" class="form-control form-control-sm">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
