<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTienenModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos_tienen_modalidades')->insert([
            [
                'curso_id' => 1,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 1,
                'modalidad_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'modalidad_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 3,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 4,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 5,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 6,
                'modalidad_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
