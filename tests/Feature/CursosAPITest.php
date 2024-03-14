<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CursosAPITest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function asAdmin(): self
    {
        $usuario = new Usuario();
        $usuario->usuario_id = 1;
        $usuario->rol_id = 1;
        // Pedimos realizar esta petición como un usuario autenticado y administrador.
        return $this->actingAs($usuario);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_puedo_obtener_todos_los_cursos()
    {
        $response = $this->getJson('/api/cursos');

        $response
           ->assertStatus(200)
           ->assertJsonCount(6, 'data')
           ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'curso_id',
                        'nombre',
                        'descripcion',
                        'precio',
                        'fecha_inicio',
                        'portada',
                        'img',
                        'img_descripcion',
                    ]
                ]
           ]);
    }

    public function test_puedo_obtener_un_curso_por_su_id()
    {
        $response = $this->getJson('/api/cursos/1');

        $response
           ->assertStatus(200)
           ->assertJsonStructure([
               'data' => [
                    'curso_id',
                    'nombre',
                    'descripcion',
                    'precio',
                    'fecha_inicio',
                    'portada',
                    'img',
                    'img_descripcion',
               ]
           ])
           ->assertJson(fn (AssertableJson $json) => 
                $json
                   ->where('data.nombre', 'Barista')
                   ->where('data.descripcion', 'Este curso está orientado a todos aquellos que trabajan detrás de la barra, en el servicio de sala o en una modalidad cafetería. En el mismo aprenderán todos los conocimientos útiles para dicha actividad, tendrá contacto con la máquina expreso y todos los utensilios que se requieren para tal fin. Se impartirán además nociones sobre los diferentes granos de café y sus respectivos tostados. La modalidad es teórico-práctica.')
                   ->etc()
            );
    }

    public function test_si_pido_un_curso_que_no_existe_obtengo_un_404()
    {
        $response = $this->getJson('/api/cursos/125');

        $response
            ->assertStatus(404);
    }

    public function test_puedo_crear_un_curso()
    {
        $response = $this
            ->asAdmin()
            ->postJson('/api/cursos', [
                'duracion_id' => 2,
                'nombre' => 'Cocina Sushi',
                'descripcion' => 'Este curso está diseñado tanto para aficionados, así como también para cocineros, alumnos y profesionales. El sushi es el plato japonés más famoso fuera de Japón y uno de los más populares entre los japoneses que disfrutan del sushi en ocasiones especiales. Y como tal, fue evolucionado fuera de ese país, influenciado por distintas culturas occidentales, especialmente en EE.UU. El nombre sushi es una denominación genérica de distintos tipos, combinaciones de ingredientes y formas de una comida típica japonesa, y básicamente están hechas a base de arroz y diferentes frutos del mar y vegetales.',
                'precio' => 38400,
                'fecha_inicio' => '2023-08-07',
            ]);

        $response
           ->assertStatus(200)
           ->assertJson(fn (AssertableJson $json) =>
              $json
                  ->where('status', 0)
                  ->where('data.curso_id', 7)
                  ->where('data.duracion_id', 2)
                  ->where('data.nombre', 'Cocina Sushi')
                  ->where('data.descripcion', 'Este curso está diseñado tanto para aficionados, así como también para cocineros, alumnos y profesionales. El sushi es el plato japonés más famoso fuera de Japón y uno de los más populares entre los japoneses que disfrutan del sushi en ocasiones especiales. Y como tal, fue evolucionado fuera de ese país, influenciado por distintas culturas occidentales, especialmente en EE.UU. El nombre sushi es una denominación genérica de distintos tipos, combinaciones de ingredientes y formas de una comida típica japonesa, y básicamente están hechas a base de arroz y diferentes frutos del mar y vegetales.')
                  ->where('data.precio', 38400)
                  ->where('data.fecha_inicio', '2023-08-07')
         );
    }

    /**
     * Valores para probar las reglas de validación.
     */
    public function validacionTestProvider(): array 
    {
        return[
            // Prueba de campos requeridos.
            [
                ['duracion_id' => '', 'nombre' => '', 'descripcion' => '', 'precio' => '', 'fecha_inicio' => ''], //Campos a testear
                ['duracion_id', 'nombre', 'descripcion', 'precio', 'fecha_inicio'], //Claves que deben fallar
            ],
            // Prueba de los tipos de datos y cantidad de caracteres.
            [
                ['duracion_id' => 'a', 'nombre' => 's', 'descripcion' => 'a', 'precio' => 'a', 'fecha_inicio' => 'a'],
                ['duracion_id', 'nombre', 'descripcion', 'precio', 'fecha_inicio'],
            ],
            // Prueba de que el precio debe ser mayor a 0, y que las FKs sean valores que
            // existan en sus respectivas tablas.
            [
                ['duracion_id' => 166, 'nombre' => 'Street Food', 'descripcion' => 'Este curso a punta a conocer y cocinar con sus propias modalidades platos rápidos, y por sobre todo muy sabrosos de la mayor parte del mundo.', 'precio' => -500, 'fecha_inicio' => '2023-02-01'],
                ['duracion_id', 'precio'],
            ],
        ];
    }

    /**
     * @dataProvider validacionTestProvider
     */
    public function test_si_trato_de_crear_un_curso_con_datos_incorrectos_obtengo_mensajes_de_error_de_validacion(array $data, array $camposQueFallan)
    {
        $response = $this->asAdmin()->postJson('/api/cursos', $data);

        $response 
            ->assertStatus(422)
            ->assertJsonValidationErrors($camposQueFallan);
    }

    public function test_no_puedo_crear_un_curso_sin_autenticarme_y_ser_administrador()
    {
        $response = $this->postJson('/api/cursos', [
            'duracion_id' => 2,
            'nombre' => 'Cocina Sushi',
            'descripcion' => 'Este curso está diseñado tanto para aficionados, así como también para cocineros, alumnos y profesionales. El sushi es el plato japonés más famoso fuera de Japón y uno de los más populares entre los japoneses que disfrutan del sushi en ocasiones especiales. Y como tal, fue evolucionado fuera de ese país, influenciado por distintas culturas occidentales, especialmente en EE.UU. El nombre sushi es una denominación genérica de distintos tipos, combinaciones de ingredientes y formas de una comida típica japonesa, y básicamente están hechas a base de arroz y diferentes frutos del mar y vegetales.',
            'precio' => 38400,
            'fecha_inicio' => '2023-08-07',
        ]);

        $response
            ->assertStatus(401); // Unauthorized
    }

    public function test_puedo_editar_un_curso()
    {
        $response = $this->asAdmin()->putJson('/api/cursos/1', [
            'precio' => 26500,
            'fecha_inicio' => '2023-08-07'
        ]);

        //$response->dump();

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    'curso_id',
                    'duracion_id',
                    'nombre',
                    'descripcion',
                    'precio',
                    'fecha_inicio',
                ]
            ])
            ->assertJson(fn (AssertableJson $json) => 
                $json
                   ->where('data.nombre', 'Barista')
                   ->where('data.precio', 26500)
                   ->where('data.fecha_inicio', '2023-08-07')
                   ->etc()
            );
    }

    /**
     * @dataProvider validacionTestProvider
     */
    public function test_si_trato_de_editar_un_curso_con_datos_incorrectos_obtengo_mensajes_de_error_de_validacion(array $data, array $camposQueFallan)
    {
        $response = $this->asAdmin()->putJson('/api/cursos/1', $data);

        $response 
            ->assertStatus(422)
            ->assertJsonValidationErrors($camposQueFallan);
    }

    public function test_no_puedo_editar_un_curso_sin_autenticarme_y_ser_administrador()
    {
        $response = $this->putJson('/api/cursos/1', [
            'precio' => 26500,
            'fecha_inicio' => '2023-08-07'
        ]);

        $response
            ->assertStatus(401); // Unauthorized
    }

    public function test_puedo_eliminar_un_curso()
    {
        $response = $this->asAdmin()->deleteJson('/api/cursos/1');

        $response
           ->assertStatus(200)
           ->assertJson([
                'status' => 0,
           ]);

        $responseCheck = $this->getJson('/api/cursos/1');

        $responseCheck
            ->assertStatus(404);
    }

    public function test_no_puedo_eliminar_un_curso_sin_autenticarme_y_ser_administrador()
    {
        $response = $this->deleteJson('/api/cursos/1');

        $response
            ->assertStatus(401); // Unauthorized
    }

}
