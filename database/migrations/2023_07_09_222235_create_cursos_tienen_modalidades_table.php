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
        Schema::create('cursos_tienen_modalidades', function (Blueprint $table) {
            $table->foreignId('curso_id')->constrained('cursos', 'curso_id');

            $table->unsignedTinyInteger('modalidad_id');
            $table->foreign('modalidad_id')->references('modalidad_id')->on('modalidades');

            $table->primary(['curso_id', 'modalidad_id']);
            
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
        Schema::dropIfExists('cursos_tienen_modalidades');
    }
};
