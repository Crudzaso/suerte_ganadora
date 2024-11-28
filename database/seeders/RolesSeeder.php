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
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'organizador']);
        Role::create(['name' => 'cliente']);
        Role::create(['name' => 'invitado']);

        /**Permissions for users management*/
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.delete']);

        /**Permissions for raffles management*/
        Permission::create([''])

    }
}

