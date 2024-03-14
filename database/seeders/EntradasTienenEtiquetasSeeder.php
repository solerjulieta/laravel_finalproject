<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradasTienenEtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas_tienen_etiquetas')->insert([
            [
                'entrada_id' => 1,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 1,
                'etiqueta_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 2,
                'etiqueta_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 2,
                'etiqueta_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entrada_id' => 3,
                'etiqueta_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
