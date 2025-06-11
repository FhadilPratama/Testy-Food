@extends('layouts.app')

@section('title', 'Role Management')

@section('content')
<div class="container">
    <h1>Role Management</h1>

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create New Role</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
