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
        Schema::create('recuperar_passwords', function (Blueprint $table) {
            $table->smallIncrements('recuperar_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('token', 255);
            $table->datetime('expiracion');
            $table->timestamps();

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recuperar_passwords');
    }
};
