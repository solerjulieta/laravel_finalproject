<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil')->insert([
            [
                'perfil_id' => 1,
                'usuario_id' => 1,
                'avatar' => 'user1.jpg',
                'bio' => 'Lorem ipsum lorem ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
