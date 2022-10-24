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
        Schema::create('comentariolugars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLugarComentario');
            $table->foreign('idLugarComentario')->references('id')->on('lugarturisticos');
            $table->unsignedBigInteger('idUsuarioLugar');
            $table->foreign('idUsuarioLugar')->references('id')->on('users')->onDelete('cascade');
            $table->string('comentario');
            $table->integer('puntuacion');
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
        Schema::dropIfExists('comentariolugars');
    }
};
