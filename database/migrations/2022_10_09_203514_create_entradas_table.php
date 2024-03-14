<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('entrada_id');
            $table->string('titulo', 150);
            $table->date('fecha_publicacion')->default(Carbon::now());
            $table->string('intro', 255);
            $table->text('sinopsis');
            $table->text('cuerpo');
            $table->string('img', 255)->nullable();
            $table->string('img_descripcion', 255)->nullable();
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
        Schema::dropIfExists('entradas');
    }
};
