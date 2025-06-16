@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
    <h1>Daftar Berita</h1>

    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-square-fill me-1"></i> Tambah Berita
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ Str::limit($berita->konten, 100) }}</td><!-- tampil 100 karakter saja -->
                            <td>
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" width="100" class="img-thumbnail">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square-fill me-1"></i> Edit
                                </a>

                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus berita?')">
                                        <i class="bi bi-trash-fill me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($beritas->isEmpty())
                <div class="alert alert-info mt-3">
                    Belum ada berita yang tersedia.
                </div>
            @endif
        </div>
    </div>
@endsection