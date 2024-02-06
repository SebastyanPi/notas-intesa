<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProgramSeeder::class);
        //$this->call(ModuleSeeder::class);
        $this->call(ScheduleSeeder::class);
        //$this->call(GroupSeeder::class);
        //$this->call(GroupStudentSeeder::class);
        //$this->call(QualificationSeeder::class);



        /*$this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProgramSeeder::class);
        //$this->call(ModuleSeeder::class);
        $this->call(ScheduleSeeder::class);
        //$this->call(GroupSeeder::class);
        //$this->call(GroupStudentSeeder::class);
        //$this->call(QualificationSeeder::class);*/
    }
}
