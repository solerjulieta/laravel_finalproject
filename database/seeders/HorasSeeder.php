<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horas')->insert([
            [
                'hora_id' => 1,
                'ingreso' => '9:30:00',
                'egreso' => '13:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 2,
                'ingreso' => '10:00:00',
                'egreso' => '12:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 3,
                'ingreso' => '12:30:00',
                'egreso' => '13:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 4,
                'ingreso' => '12:30:00',
                'egreso' => '14:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 5,
                'ingreso' => '14:00:00',
                'egreso' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 6,
                'ingreso' => '16:00:00',
                'egreso' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 7,
                'ingreso' => '17:30:00',
                'egreso' => '20:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 8,
                'ingreso' => '19:00:00',
                'egreso' => '20:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 9,
                'ingreso' => '19:00:00',
                'egreso' => '21:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 10,
                'ingreso' => '19:00:00',
                'egreso' => '22:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hora_id' => 11,
                'ingreso' => '20:00:00',
                'egreso' => '22:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
