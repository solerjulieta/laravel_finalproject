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
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->unsignedBigInteger('horario_id')->after('modalidad_id');

            $table->foreign('horario_id')->references('horario_id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropForeign(['horario_id']);
        });
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropColumn('horario_id');
        });
    }
};
