@extends('layouts.app')

@section('title', 'Tentang')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-info-square-fill me-2"></i> Manajemen Tentang
            </h5>
            <a href="{{ route('admin.about.edit') }}" class="btn btn-light btn-sm text-primary">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover mb-4">
                <tr>
                    <th class="w-25">Judul</th>
                    <td>{{ $about->title }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $about->description }}</td>
                </tr>
                <tr>
                    <th>Deskripsi 2</th>
                    <td>{{ $about->description_2 }}</td>
                </tr>
                <tr>
                    <th>Visi</th>
                    <td>{{ $about->visi }}</td>
                </tr>
                <tr>
                    <th>Misi</th>
                    <td>{{ $about->misi }}</td>
                </tr>
            </table>

            <h5 class="fw-semibold mb-3">Gambar</h5>
            <div class="row text-center">
                @foreach(['image1', 'image2', 'image3', 'image4', 'image5'] as $image)
                    <div class="col-6 col-md-2 mb-4">
                        <div class="border p-2 rounded shadow-sm">
                            <strong>{{ ucfirst($image) }}</strong><br>
                            @if($about->$image)
                                <img src="{{ asset('storage/' . $about->$image) }}" class="img-fluid mt-2" style="max-height: 100px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
