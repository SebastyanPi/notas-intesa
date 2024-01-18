<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $program1 = Program::create(['name' => 'Asistente Administrativo','type' => 'Tecnico']);
        $program2 = Program::create(['name' => 'Seguridad Laboral','type' => 'Tecnico']);
        $program3 = Program::create(['name' => 'Auxiliar de Primera Infancia','type' => 'Tecnico']);
        $program4 = Program::create(['name' => 'Mecanica Diesel Automotriz','type' => 'Tecnico']);
        $program5 = Program::create(['name' => 'Maquinaria Pesada','type' => 'Tecnico']);

        $program6 = Program::create(['name' => 'Pedagogia Infantil','type' => 'Diplomado']);
        $program7 = Program::create(['name' => 'Sistema de Seguridad y Salud en el Trabajo','type' => 'Diplomado']);
        $program8 = Program::create(['name' => 'Normas NIFF','type' => 'Diplomado']);

        $program9 = Program::create(['name' => 'Auxiliar Contable','type' => 'Curso']);
        $program10 = Program::create(['name' => 'Operador de Retroexcavadora','type' => 'Curso']);
        $program11 = Program::create(['name' => 'Operador de Montacarga','type' => 'Curso']);

        $program12 = Program::create(['name' => 'Normatividad de Seguridad en el Trabajo','type' => 'Seminario']);
        $program13 = Program::create(['name' => 'Inyeccion Electronica','type' => 'Seminario']);

        $program12 = Program::create(['name' => 'Capacitación: El Saber Hacer','type' => 'Otro']);
        $program13 = Program::create(['name' => 'Capacitación: Ingles II','type' => 'Otro']);
    }
}
