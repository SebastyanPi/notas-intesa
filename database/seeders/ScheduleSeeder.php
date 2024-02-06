<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schedule::create(['name' => 'Martes y Jueves de 6:30pm - 8:30pm']);
        schedule::create(['name' => 'Martes y Jueves de 7:00pm - 9:00pm']);
        schedule::create(['name' => 'Sabado de 8:00am - 11:30am']);
    }
}
