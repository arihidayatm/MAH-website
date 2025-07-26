<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        // Pastikan Spatie Permission sudah diinisialisasi
        if (!class_exists(PermissionRegistrar::class)) {
            $this->command->error('Spatie Permission package is not installed or configured properly.');
            return;
        }
        // Reset permission cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat permission awal jika belum ada
        $permissions = [
            'manage users',
            'manage settings',
            'manage content',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'admin',
            ]);
        }

        // Buat role admin jika belum ada
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'admin',
        ]);

        // Beri semua permission ke role admin
        $adminRole->syncPermissions(Permission::where('guard_name', 'admin')->get());

        // Buat user admin jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'admin@creativetechdigital.com'],
            [
                'id'         => 99,
                'name'       => 'Super Admin',
                'username'   => 'creativetechdigital',
                'password'   => Hash::make('password'),
                // 'avatar'     => 'avatar.png',
                'created_at' => now(),
            ]
        );

        // Assign role admin ke user (jika belum)
        if (!$user->hasRole('admin')) {
            $user->assignRole($adminRole);
        }

        $this->command->info('✅ SuperUserSeeder: admin user, role, and permissions seeded.');
    }
}
