@extends('layouts.app')

@section('title', 'Daftar Gallery')

@section('content')
<div class="container-fluid px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Daftar Gallery</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-square-fill me-1"></i> Tambah Gallery
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($galleries->isEmpty())
                <div class="alert alert-info mb-0">Belum ada gallery yang tersedia.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Gambar</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration + ($galleries->currentPage() - 1) * $galleries->perPage() }}</td>
                                    <td>
                                        @if ($gallery->image_path)
                                            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="100" class="img-thumbnail rounded shadow-sm">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $galleries->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
