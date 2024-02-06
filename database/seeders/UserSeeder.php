<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nit' => 77168558,
            'username' => 'admin',
            'firstname' => 'Administrativo' ,
            'lastname' => 'Intesa',
            'email' => 'intesa.academia@gmail.com',
            'password' => 'Admin2024!',
            'password_verified_at' => 'Admin2024!'
        ]);
        $user->assignRole('Administrador');

        $user2 = User::create([
            'nit' => '1003378106',
            'username' => 'Estudiante',
            'firstname' => 'Estudiante Prueba' ,
            'lastname' => 'Intesata Romeralitia',
            'email' => 'student@argon.com',
            'password' => 'secret',
            'password_verified_at' => 'secret'
        ]);
        $user2->assignRole('Estudiante');

        $user3 = User::create([
            'nit' => '7435245',
            'username' => 'Profesor',
            'firstname' => 'Profesor Prueba' ,
            'lastname' => 'Pineda Marquez',
            'email' => 'profesor@argon.com',
            'password' => 'secret',
            'password_verified_at' => 'secret'
        ]);
        $user3->assignRole('Profesor');
    }
}
