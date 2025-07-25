<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperUserSeeder extends Seeder
{
    /** Run the database seeds. */
    public function run(): void
    {
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::create([
            'id'           => 99,
            'name'         => 'Admin',
            'email'        => 'admin@creativetechdigital.com',
            'username'     => 'creativetechdigital',
            'password'     => bcrypt('Zhukov28#'),
            // 'avatar'       => 'avatar.png',
            'created_at'   => now(),
        ]);

        $role = Role::create([
            'guard_name' => 'admin',
            'name'       => 'admin',
        ]);

        $role->givePermissionTo(Permission::where('guard_name', 'admin')->get());

        $user->assignRole($role);
    }
}
