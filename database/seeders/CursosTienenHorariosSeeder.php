<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTienenHorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos_tienen_horarios')->insert([
            [
                'horario_id' => 1,
                'curso_id' => 1,
            ],
            [
                'horario_id' => 2,
                'curso_id' => 1,
            ],
            [
                'horario_id' => 3,
                'curso_id' => 2,
            ],
            [
                'horario_id' => 4,
                'curso_id' => 2,
            ],
            [
                'horario_id' => 5,
                'curso_id' => 3,
            ],
            [
                'horario_id' => 6,
                'curso_id' => 3,
            ],
            [
                'horario_id' => 7,
                'curso_id' => 4,
            ],
            [
                'horario_id' => 8,
                'curso_id' => 4,
            ],
            [
                'horario_id' => 9,
                'curso_id' => 5,
            ],
            [
                'horario_id' => 10,
                'curso_id' => 5,
            ],
            [
                'horario_id' => 11,
                'curso_id' => 6,
            ],
            [
                'horario_id' => 12,
                'curso_id' => 6,
            ],
        ]);
    }
}
