<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etiquetas')->insert([
            [
                'etiqueta_id' => 1,
                'nombre' => 'Gastronomía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 2,
                'nombre' => 'Recetas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 3,
                'nombre' => 'Decoración',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 4,
                'nombre' => 'Pastelería',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'etiqueta_id' => 5,
                'nombre' => 'Tragos',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
