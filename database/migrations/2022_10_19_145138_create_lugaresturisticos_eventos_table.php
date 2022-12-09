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
            $table->foreignId('evento_id')->nullable()->constrained('eventos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('lugarturistico_id')->nullable()->constrained('lugarturisticos')->cascadeOnUpdate()->cascadeOnDelete();
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
