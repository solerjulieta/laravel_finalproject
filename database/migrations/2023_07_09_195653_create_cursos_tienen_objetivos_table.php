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
        Schema::create('cursos_tienen_objetivos', function (Blueprint $table) {
            $table->foreignId('curso_id')->constrained('cursos', 'curso_id');

            $table->unsignedSmallInteger('objetivo_id');
            $table->foreign('objetivo_id')->references('objetivo_id')->on('objetivos');

            $table->primary(['curso_id', 'objetivo_id']);

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
        Schema::dropIfExists('cursos_tienen_objetivos');
    }
};
