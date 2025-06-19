@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Daftar Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-square me-1"></i> Tambah Berita
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($beritas->isEmpty())
                <div class="alert alert-info mb-0">Belum ada berita yang tersedia.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Judul</th>
                                <th>Konten</th>
                                <th>Gambar</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-start">{{ $berita->judul }}</td>
                                    <td class="text-start">{{ Str::limit($berita->konten, 100) }}</td>
                                    <td>
                                        @if ($berita->gambar)
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="100" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Yakin ingin menghapus berita?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash-fill me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
