<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntajePartidoEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntaje_partido_equipo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_part')->references('cod_part')->on('partido');
            $table->foreignId('cod_equi_data')->references('cod_equi_data')->on('equipo_data');
            $table->integer('puntaje_periodo_1')->default(0);
            $table->integer('puntaje_periodo_2')->default(0);
            $table->integer('puntaje_periodo_3')->default(0);
            $table->integer('puntaje_periodo_4')->default(0);
            $table->integer('puntaje_tiempo_extra')->default(0);
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
        Schema::dropIfExists('puntaje_partido_equipo');
    }
}
