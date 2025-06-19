@extends('layouts.app')

@section('title', 'Detail Kontak')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-info-circle me-2"></i> Detail Kontak
            </h5>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-light btn-sm text-primary">
                <i class="bi bi-arrow-left-circle me-1"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3 text-muted">Nama</dt>
                <dd class="col-sm-9">{{ $contact->name }}</dd>

                <dt class="col-sm-3 text-muted">Email</dt>
                <dd class="col-sm-9">{{ $contact->email }}</dd>

                <dt class="col-sm-3 text-muted">Subjek</dt>
                <dd class="col-sm-9">{{ $contact->subject }}</dd>

                <dt class="col-sm-3 text-muted">Pesan</dt>
                <dd class="col-sm-9">{{ $contact->message }}</dd>

                <dt class="col-sm-3 text-muted">Tanggal Dikirim</dt>
                <dd class="col-sm-9">{{ $contact->created_at->format('d M Y, H:i') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
