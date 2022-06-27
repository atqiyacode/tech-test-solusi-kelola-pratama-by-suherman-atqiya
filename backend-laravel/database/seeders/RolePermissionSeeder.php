<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::updateOrCreate(['name' => 'get-list']);
        Permission::updateOrCreate(['name' => 'can-show']);
        Permission::updateOrCreate(['name' => 'can-create']);
        Permission::updateOrCreate(['name' => 'can-update']);
        Permission::updateOrCreate(['name' => 'can-delete']);

        $admin = Role::updateOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([
            'get-list',
            'can-show',
            'can-create',
            'can-update',
            'can-delete',
        ]);

        $user = Role::updateOrCreate(['name' => 'user']);
        $user->givePermissionTo([
            'can-show',
            'can-create',
        ]);
    }
}
