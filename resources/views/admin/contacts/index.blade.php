@extends('layouts.app')

@section('title', 'Daftar Kontak')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Kontak</h5>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Subject</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ Str::limit($contact->message, 60) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kontak ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada pesan yang masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
