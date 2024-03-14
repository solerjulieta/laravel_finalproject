<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('curso_id');
            $table->string('nombre', 50);
            $table->text('descripcion');
            $table->unsignedInteger('precio');
            $table->date('fecha_inicio');
            $table->string('portada', 255)->nullable();
            $table->string('portada_descripcion', 255)->nullable();
            $table->string('img', 255)->nullable();
            $table->string('img_descripcion', 255)->nullable();
            $table->boolean('mostrar')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
