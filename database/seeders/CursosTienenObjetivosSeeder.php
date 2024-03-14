<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTienenObjetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos_tienen_objetivos')->insert([
            [
                'curso_id' => 1,
                'objetivo_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 1,
                'objetivo_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 2,
                'objetivo_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 3,
                'objetivo_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 3,
                'objetivo_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 3,
                'objetivo_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 4,
                'objetivo_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 4,
                'objetivo_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 4,
                'objetivo_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 4,
                'objetivo_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 5,
                'objetivo_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 5,
                'objetivo_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 5,
                'objetivo_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 6,
                'objetivo_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 6,
                'objetivo_id' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 6,
                'objetivo_id' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'curso_id' => 6,
                'objetivo_id' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
