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
        Schema::create('entradas_tienen_etiquetas', function (Blueprint $table) {
            $table->foreignId('entrada_id')->constrained('entradas', 'entrada_id');
            $table->unsignedTinyInteger('etiqueta_id');
            $table->foreign('etiqueta_id')->references('etiqueta_id')->on('etiquetas');
            $table->primary(['entrada_id', 'etiqueta_id']);
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
        Schema::dropIfExists('entradas_tienen_etiquetas');
    }
};
