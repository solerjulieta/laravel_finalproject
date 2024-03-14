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
        Schema::create('cursos_tienen_horarios', function (Blueprint $table) {
            $table->foreignId('horario_id')->constrained('horarios', 'horario_id');
            $table->foreignId('curso_id')->constrained('cursos', 'curso_id');

            $table->primary(['horario_id', 'curso_id']);
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
        Schema::dropIfExists('cursos_tienen_horarios');
    }
};
