@extends('layouts.app')

@section('title', 'Form Kontak')

@section('content')
<div class="container-fluid py-3">
    <h3>Form Kontak Baru</h3>

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
