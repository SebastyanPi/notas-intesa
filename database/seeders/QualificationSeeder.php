<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\qualification;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $calificacion = qualification::create([
            "user_id" => 2,
            "module_id" => 1,
            "group_id" => 1,
            "note1" => 34,
            "note2" => 45,
            "note3" => 23,
            "fails" => 0
        ]);

        $calificacion = qualification::create([
            "user_id" => 3,
            "module_id" => 2,
            "group_id" => 1,
            "note1" => 38,
            "note2" => 45,
            "note3" => 23,
            "fails" => 1
        ]);

        $calificacion = qualification::create([
            "user_id" => 3,
            "module_id" => 1,
            "group_id" => 1,
            "note1" => 34,
            "note2" => 45,
            "note3" => 23,
            "fails" => 0
        ]);

        $calificacion = qualification::create([
            "user_id" => 5,
            "module_id" => 2,
            "group_id" => 1,
            "note1" => 38,
            "note2" => 45,
            "note3" => 23,
            "fails" => 1
        ]);


    }
}
