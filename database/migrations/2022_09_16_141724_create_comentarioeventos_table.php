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
        Schema::create('comentarioeventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEventoComentario');
            $table->foreign('idEventoComentario')->references('id')->on('eventos');
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
        Schema::dropIfExists('comentarioeventos');
    }
};
