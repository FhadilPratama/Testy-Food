<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    // Tampilkan semua roles
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return response()->json($roles);
    }

    // Buat role baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->name]);

        return response()->json(['message' => 'Role created successfully', 'role' => $role]);
    }

    // Tambahkan permission ke role
    public function addPermission(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $permission = Permission::firstOrCreate(['name' => $request->permission]);

        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission added successfully']);
    }

    // Lihat permission dari role
    public function show($roleId)
    {
        $role = Role::with('permissions')->findOrFail($roleId);
        return response()->json($role);
    }
}
