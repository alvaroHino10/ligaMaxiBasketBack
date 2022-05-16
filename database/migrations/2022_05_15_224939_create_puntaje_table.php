<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntaje', function (Blueprint $table) {
            $table->id('cod_punt');
            $table->foreignId('cod_jug')->references('cod_jug')->on('jugador');
            $table->string('periodo',20);
            $table->integer('cant_cnsta_simple');
            $table->integer('cant_cnsta_doble');
            $table->integer('cant_cnsta_triple');
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
        Schema::dropIfExists('puntaje');
    }
}
