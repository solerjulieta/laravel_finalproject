<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('duracion')->insert([
            [
                'duracion_id' => 1,
                'duracion' => '1 mes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duracion_id' => 2,
                'duracion' => '2 meses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duracion_id' => 3,
                'duracion' => '3 meses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duracion_id' => 4,
                'duracion' => '4 meses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duracion_id' => 5,
                'duracion' => '5 meses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'duracion_id' => 6,
                'duracion' => '6 meses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
