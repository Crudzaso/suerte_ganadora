<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Crear los roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'client']);

        /**Permissions for users management*/
        Permission::create(['name' => 'users.index'])->assignRole($role1);
        Permission::create(['name' => 'users.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.create'])->assignRole($role1);
        Permission::create(['name' => 'users.delete'])->assignRole($role1);

        /**Permissions for raffles management*/
        Permission::create(['name' => 'rifas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rifas.edit'])->assignRole($role1);
        Permission::create(['name' => 'rifas.create'])->assignRole($role1);
        Permission::create(['name' => 'rifas.delete'])->assignRole($role1);

    }
}

