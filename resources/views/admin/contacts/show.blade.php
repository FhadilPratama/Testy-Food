@extends('layouts.app')

@section('title', 'Detail Kontak')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Kontak</h4>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ $contact->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $contact->email }}</dd>

                <dt class="col-sm-3">Subjek</dt>
                <dd class="col-sm-9">{{ $contact->subject }}</dd>

                <dt class="col-sm-3">Pesan</dt>
                <dd class="col-sm-9">{{ $contact->message }}</dd>

                <dt class="col-sm-3">Tanggal Dikirim</dt>
                <dd class="col-sm-9">{{ $contact->created_at->format('d M Y, H:i') }}</dd>
            </dl>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mt-3">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
