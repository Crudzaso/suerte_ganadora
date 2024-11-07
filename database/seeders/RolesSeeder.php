<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
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
    }
}

