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

     

        /*for ($i=0; $i < 101; $i++) { 
            $user1 = User::create([
                'nit' => '1003378106'.$i,
                'username' => 'Estudiante'.$i ,
                'firstname' => 'Estudiante'.$i.' Gabriel' ,
                'lastname' => 'Intesata Romeralitia',
                'email' => 'student'.$i.'@argon.com',
                'password' => 'secret',
                'password_verified_at' => 'secret'
            ]);
            $user1->assignRole('Estudiante');
        }


        for ($i=0; $i < 101; $i++) {
            $user2 = User::create([
                'nit' => '7435245'.$i,
                'username' => 'Profesor'.$i,
                'firstname' => 'Profesor'.$i.' Gabriel' ,
                'lastname' => 'Pineda Marquez',
                'email' => 'profesor'.$i.'@argon.com',
                'password' => 'secret',
                'password_verified_at' => 'secret'
            ]);
            $user2->assignRole('Profesor');
        }*/

        //User::factory(20)->create();

        /*DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret')
        ]);*/
    }
}
