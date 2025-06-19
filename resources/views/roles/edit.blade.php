@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container">
    <h1>Edit Role: {{ $role->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <div class="mb-3">
            <label>Assign Permissions</label><br>
            @foreach($permissions as $permission)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                        id="perm_{{ $permission->id }}" class="form-check-input"
                        {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
