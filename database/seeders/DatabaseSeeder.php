<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolesSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(PerfilSeeder::class);
        $this->call(DuracionSeeder::class);
        $this->call(ObjetivosSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(DiasSeeder::class);
        $this->call(HorasSeeder::class);
        $this->call(HorariosSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(CursosTienenObjetivosSeeder::class);
        $this->call(CursosTienenModalidadesSeeder::class);
        $this->call(CursosTienenHorariosSeeder::class);
        $this->call(InscripcionesSeeder::class);
        $this->call(EtiquetasSeeder::class);
        $this->call(EntradasSeeder::class);
        $this->call(EntradasTienenEtiquetasSeeder::class);
    }
}
