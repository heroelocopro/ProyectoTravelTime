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
        Schema::create('sub_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEvento');
            $table->foreign('idEvento')->references('id')->on('eventos');
            $table->unsignedBigInteger('idLugar');
            $table->foreign('idLugar')->references('id')->on('lugarturisticos');
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('dia');
            $table->time('horaInicio');
            $table->time('horaFinal');
            $table->string('foto');
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
        Schema::dropIfExists('sub_eventos');
    }
};
