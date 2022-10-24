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
        Schema::create('lugaresturisticos_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEvento');
            $table->unsignedBigInteger('idLugarTuristico');
            $table->foreign('idEvento')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('idLugarTuristico')->references('id')->on('lugarTuristicos')->onDelete('cascade');
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
        Schema::dropIfExists('lugaresturisticos_eventos');
    }
};
