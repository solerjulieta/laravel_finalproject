<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidades')->insert([
            [
                'modalidad_id' => 1,
                'nombre' => 'Presencial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'modalidad_id' => 2,
                'nombre' => 'Virtual',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
