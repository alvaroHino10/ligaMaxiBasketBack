<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id('cod_estadist');
            $table->foreignId('cod_jug')->references('cod_jug')->on('jugador');
            $table->integer('cant_cnsta_simple')->default(0);
            $table->integer('cant_cnsta_doble')->default(0);
            $table->integer('cant_cnsta_triple')->default(0);
            $table->integer('rebotes')->default(0);
            $table->integer('faltas')->default(0);
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
        Schema::dropIfExists('estadisticas');
    }
}
