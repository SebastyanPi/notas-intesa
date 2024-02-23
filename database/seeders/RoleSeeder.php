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

        

        //Permisos de Administrador

        Permission::create(['name' => 'virtual-reality'])->assignRole($role1);
        Permission::create(['name' => 'rtl'])->assignRole($role1);
        Permission::create(['name' => 'profile'])->syncRoles([$role1]);
        Permission::create(['name' => 'profile.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'profile-static'])->syncRoles([$role1]);
        Permission::create(['name' => 'sign-in-static'])->syncRoles([$role1]);
        Permission::create(['name' => 'sign-up-static'])->syncRoles([$role1]);
        Permission::create(['name' => 'module.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'module.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'module.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'module.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'program.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.modules.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.groups'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'program.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'schedule.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'schedule.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'schedule.update'])->syncRoles([$role1]);

        Permission::create(['name' => 'group.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.qualification'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.qualification.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.qualification.pdf'])->syncRoles([$role1]);

        Permission::create(['name' => 'user.register'])->syncRoles([$role1]);
        Permission::create(['name' => 'user.list'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.delete'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.new'])->syncRoles([$role1]);

        Permission::create(['name' => 'group.add'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.add.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'group.delete.user'])->syncRoles([$role1]);

        Permission::create(['name' => 'teacher.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'teacher.index.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'teacher.create'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'student.index.pdf'])->syncRoles([$role1]);
        Permission::create(['name' => 'student.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'student.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'student.enroll'])->syncRoles([$role1]);

        //Permisos para Estudiantes
        Permission::create(['name' => 'page_student.index'])->syncRoles([$role2]);

        //Permisos para Profesor
        Permission::create(['name' => 'user.teacher.index'])->assignRole($role3);
        Permission::create(['name' => 'user.teacher.notas'])->assignRole($role3);
        //Permission::create(['name' => 'user.teacher.index'])->assignRole($role3);


    }
}
