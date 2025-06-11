<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role SuperAdmin & Admin jika belum ada
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Buat User SuperAdmin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@testyfood.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // default password: password
            ]
        );
        $superAdmin->assignRole($superAdminRole);

        // Buat User Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@testyfood.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // default password: password
            ]
        );
        $admin->assignRole($adminRole);
    }
}
