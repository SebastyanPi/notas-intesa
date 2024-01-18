<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Estudiante']);
        $role3 = Role::create(['name' => 'Profesor']);

        Permission::create(['name' => 'profile'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'profile.update'])->assignRole($role1);
        Permission::create(['name' => 'profile-static'])->assignRole($role1);
    }
}
