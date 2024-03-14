<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [   
                'curso_id' => 1,
                'duracion_id' => 2,
                'nombre' => 'Barista',
                'descripcion' => 'Este curso está orientado a todos aquellos que trabajan detrás de la barra, en el servicio de sala o en una modalidad cafetería. En el mismo aprenderán todos los conocimientos útiles para dicha actividad, tendrá contacto con la máquina expreso y todos los utensilios que se requieren para tal fin. Se impartirán además nociones sobre los diferentes granos de café y sus respectivos tostados. La modalidad es teórico-práctica.',
                'precio' => 15000,
                'fecha_inicio' => '2024-02-06',
                'portada' => 'portada-barista.jpg',
                'portada_descripcion' => 'Barista preparando un café.',
                'img' => 'barista.jpg',
                'img_descripcion' => 'Barista preparando un café.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'curso_id' => 2,
                'duracion_id' => 3,
                'nombre' => 'Bartender',
                'descripcion' => 'Las bebidas cumplen un papel importante en el desarrollo de una carta, como complemento de distintas creaciones culinarias, pudiendo incluso llegar a potenciar (o degradar) aspectos de un menú, pudiendo ser utilizadas tanto en aperitivos, lunchs, platos de diferentes cocinas regionales o internacionales. El bartender es un profesional responsable y creativo dentro del mundo de las bebidas, siendo absolutamente instruido en el arte de crear nuevos sabores a partir de no solo de bebidas alcohólicas, sino también de un sin número de productos como infusiones, frutas exóticas, verduras, especias, etc.',
                'precio' => 16000,
                'fecha_inicio' => '2024-02-13',
                'portada' => 'portada-bartender.jpg',
                'portada_descripcion' => 'Bartender preparando un trago.',
                'img' => 'bartender.jpg',
                'img_descripcion' => 'Bartender preparando un trago.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'curso_id' => 3,
                'duracion_id' => 4,
                'nombre' => 'Catering para Eventos',
                'descripcion' => 'Este curso permite a los alumnos no solo capacitarse en las técnicas aplicables en un catering sino además en la posibilidad de emprendimientos gastronómicos. Se recorrerán todos los aspectos a tener en cuenta para el desarrollo de un evento, desde la cocina, pasando por la producción en cantidades, almacenamiento, servicio y despacho.',
                'precio' => 14800,
                'fecha_inicio' => '2024-02-06',
                'portada' => 'portada-catering-para-eventos.jpg',
                'portada_descripcion' => 'Mesa con entradas para picar.',
                'img' => 'catering-para-eventos.jpg',
                'img_descripcion' => 'Mesa con entradas para picar.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'curso_id' => 4,
                'duracion_id' => 3,
                'nombre' => 'Decoración de tortas',
                'descripcion' => 'En este curso nos meteremos en el mundo del azúcar y las múltiples variedades de masas y coberturas que son la base de bellas estructuras de decoración en tortas para múltiples eventos.',
                'precio' => 12500,
                'fecha_inicio' => '2024-02-20',
                'portada' => 'portada-decoracion-tortas.jpg',
                'portada_descripcion' => 'Torta de chocolate con frutos del bosque.',
                'img' => 'decoracion-tortas.jpg',
                'img_descripcion' => 'Torta de chocolate con frutos del bosque.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'curso_id' => 5,
                'duracion_id' => 4,
                'nombre' => 'Maestro panadero',
                'descripcion' => 'El desarrollo de esta carrera permitirá al alumno incorporar los conocimientos imprescindibles en el desarrollo de la panadería, en cuanto a técnicas de elaboración y correcto deshorneado, y posterior guardado de los productos elaborados.',
                'precio' => 15000,
                'fecha_inicio' => '2024-02-20',
                'portada' => 'portada-maestro-panadero.jpg',
                'portada_descripcion' => 'Panadero preparando panes.',
                'img' => 'maestro-panadero.jpg',
                'img_descripcion' => 'Panadero preparando panes.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   
                'curso_id' => 6,
                'duracion_id' => 4,
                'nombre' => 'Maestro pizzero',
                'descripcion' => 'El desarrollo de este curso permitirá al alumno incorporar conocimientos a cerca de la elaboración artesanal de los productos que se encuentran en una pizzería, sandwichería, lomitería. Además, le permitirá adquirir técnicas de elaboración y almacenamiento de los productos elaborados manejando los principios básicos de bromatología, higiene y seguridad de los alimentos. Este curso está destinado a todos aquellos que deseen realizar un microemprendimiento, ya sea cocinar para eventos particulares o en un local comercial o simplemente adquirir los conocimientos teóricos prácticos por gusto personal.',
                'precio' => 18500,
                'fecha_inicio' => '2024-02-20',
                'portada' => 'portada-maestro-pizzero.jpg',
                'portada_descripcion' => 'Maestro pizzero cortando una pizza en primer plano.',
                'img' => 'maestro-pizzero.jpg',
                'img_descripcion' => 'Maestro pizzero cortando una pizza en primer plano.',
                'mostrar' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
