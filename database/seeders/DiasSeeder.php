<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dias')->insert([
            [
                'dia_id' => 1,
                'nombre' => 'Domingo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 2,
                'nombre' => 'Lunes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 3,
                'nombre' => 'Martes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 4,
                'nombre' => 'Miércoles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 5,
                'nombre' => 'Jueves',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 6,
                'nombre' => 'Viernes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dia_id' => 7,
                'nombre' => 'Sábado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
