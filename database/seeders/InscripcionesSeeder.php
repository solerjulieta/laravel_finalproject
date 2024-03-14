<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscripcionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscripciones')->insert([
            [
                'inscripcion_id' => 1,
                'usuario_id' => 2, 
                'curso_id' => 5,
                'modalidad_id' => 1,
                'horario_id' => 9,
                'curso' => 'Maestro panadero',
                'precio' => 15000,
                'fecha_inicio' => '2024-02-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inscripcion_id' => 2,
                'usuario_id' => 3, 
                'curso_id' => 5,
                'modalidad_id' => 1,
                'horario_id' => 10,
                'curso' => 'Maestro panadero',
                'precio' => 15000,
                'fecha_inicio' => '2024-02-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inscripcion_id' => 3,
                'usuario_id' => 4, 
                'curso_id' => 2,
                'modalidad_id' => 2,
                'horario_id' => 3,
                'curso' => 'Bartender',
                'precio' => 16000,
                'fecha_inicio' => '2024-02-13',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inscripcion_id' => 4,
                'usuario_id' => 4, 
                'curso_id' => 6,
                'modalidad_id' => 1,
                'horario_id' => 12,
                'curso' => 'Maestro pizzero',
                'precio' => 18500,
                'fecha_inicio' => '2024-02-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
