<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            [
                'horario_id' => 1,
                'dia_id' => 4,
                'hora_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 2,
                'dia_id' => 5,
                'hora_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 3,
                'dia_id' => 2,
                'hora_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 4,
                'dia_id' => 6,
                'hora_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 5,
                'dia_id' => 4,
                'hora_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 6,
                'dia_id' => 4,
                'hora_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 7,
                'dia_id' => 3,
                'hora_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 8,
                'dia_id' => 7,
                'hora_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 9,
                'dia_id' => 2,
                'hora_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 10,
                'dia_id' => 3,
                'hora_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 11,
                'dia_id' => 6,
                'hora_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'horario_id' => 12,
                'dia_id' => 6,
                'hora_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
