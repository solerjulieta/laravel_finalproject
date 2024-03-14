<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'usuario_id' => 1,
                'rol_id' => 1,
                'email' => 'admin@admin.com',
                'password' => Hash::make('1234'),
                'nombre' => 'Julieta',
                'apellido' => 'Soler',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'rol_id' => 2,
                'email' => 'user@user.com',
                'password' => Hash::make('5678'),
                'nombre' => 'Pablo',
                'apellido' => 'Quiroga',
                'created_at' => now(),
                'updated_at' => now(),                
            ],
            [
                'usuario_id' => 3,
                'rol_id' => 2,
                'email' => 'emma@watson.com',
                'password' => Hash::make('5678'),
                'nombre' => 'Emma',
                'apellido' => 'Watson',
                'created_at' => now(),
                'updated_at' => now(),                
            ],
            [
                'usuario_id' => 4,
                'rol_id' => 2,
                'email' => 'bryan@cranston.com',
                'password' => Hash::make('5678'),
                'nombre' => 'Bryan',
                'apellido' => 'Cranston',
                'created_at' => now(),
                'updated_at' => now(),                
            ],
        ]);
    }
}
