@extends('layouts.app')

@section('title', 'Daftar Gallery')

@section('content')
    <h1>Daftar Gallery</h1>

    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-square-fill me-1"></i> Tambah Gallery
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $gallery)
                        <tr>
                            <td>{{ $loop->iteration + ($galleries->currentPage() - 1) * $galleries->perPage() }}</td>
                            <td>
                                @if ($gallery->image_path)
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" width="100" class="img-thumbnail">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square-fill me-1"></i> Edit
                                </a>

                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus gallery?')">
                                        <i class="bi bi-trash-fill me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($galleries->isEmpty())
                <div class="alert alert-info mt-3">
                    Belum ada gallery yang tersedia.
                </div>
            @endif
            <!-- Tombol pagination -->
            <div class="d-flex justify-content-center mt-4">
                @if ($galleries->hasPages())
                    {{ $galleries->links() }}
                @endif
            </div>

        </div>
    </div>
@endsection