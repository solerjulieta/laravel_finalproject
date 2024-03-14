<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObjetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objetivos')->insert([
            [
                'objetivo_id' => 1,
                'objetivo' => 'Lograr el completo manejo de los equipos, un conocimiento acabado del tipo de molienda del café y la correcta interpretación de todas las opciones de preparación requeridas por los comensales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 2,
                'objetivo' => 'Incentivar a la investigación y el estudio de nuevas tendencias y preparaciones del café de especialidad.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 3,
                'objetivo' => 'Introducirse en el fascinante mundo de la coctelería, destilado y demás bebidas alcohólicas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 4,
                'objetivo' => 'Desarrollar un buen manejo y aprovechamiento de las mismas.',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'objetivo_id' => 5,
                'objetivo' => 'Incrementar la creatividad de los alumnos, de la mano del conocimiento.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 6,
                'objetivo' => 'Incrementar el placer propio y del comensal que disfrutará de las magníficas creaciones.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 7,
                'objetivo' => 'Aprender a trabajar con absoluta responsabilidad en el despacho de bebidas alcohólicas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],   
            [
                'objetivo_id' => 8,
                'objetivo' => 'Expresarse con propiedad, conocimiento y criterio sobre las distintas bebidas alcohólicas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 9,
                'objetivo' => 'Aprender sobre entremeses fríos y calientes: variedades y características.',
                'created_at' => now(),
                'updated_at' => now(),
            ],  
            [
                'objetivo_id' => 10,
                'objetivo' => 'Desarrollar la creatividad en el armado de centros de mesas, decoración y estructura.',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'objetivo_id' => 11,
                'objetivo' => 'Armado del menú y presentación de una carta acorde al evento.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 12,
                'objetivo' => 'Perfeccionamiento en técnica de trabajo en manga y cartuchos de papel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 13,
                'objetivo' => 'Desarrollar técnica de decoración sobre torta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],  
            [
                'objetivo_id' => 14,
                'objetivo' => 'Incrementar conocimiento de modelado con pasta de goma, pastillaje filipino, filigranas decorativas, pasta para modelar y pintura sobre torta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],    
            [
                'objetivo_id' => 15,
                'objetivo' => 'Los/as alumnos/as tendrán una formación en cuanto a higiene y seguridad y bromatología.',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'objetivo_id' => 16,
                'objetivo' => 'Distinguir los distintos tipos de masas desde las básicas a las enriquecidas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'objetivo_id' => 17,
                'objetivo' => 'El alumno tendrá total conocimiento sobre bollería francesa, facturería, panadería argentina, masas quebradas, merengues y panes.',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'objetivo_id' => 18,
                'objetivo' => 'El alumno tendrá total conocimiento sobre preparación de masas a mano y con máquina industrial.',
                'created_at' => now(),
                'updated_at' => now(),
            ],  
            [
                'objetivo_id' => 19,
                'objetivo' => 'Desarrollo y perfeccionamiento en variedades de salsas, toppings, combinación de sabores y especias.',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'objetivo_id' => 20,
                'objetivo' => 'Originalidad en la presentación y sabor.',
                'created_at' => now(),
                'updated_at' => now(),
            ],                    
        ]);
    }
}
