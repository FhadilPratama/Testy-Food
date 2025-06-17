@extends('layouts.app')

@section('title', 'Daftar Kontak')

@section('content')
    <div class="container-fluid py-3">
        <h3>Daftar Kontak</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Tambah Kontak</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Subject</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->message, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada pesan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $contacts->links() }}
    </div>
@endsection
