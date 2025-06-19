@extends('layouts.app')

@section('title', 'Roles')

@section('content')
<div class="container">
    <h1>Roles</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">+ Create Role</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Role</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete this role?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
