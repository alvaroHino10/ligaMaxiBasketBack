<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->id('cod_equi');
            $table->foreignId('cod_preinscrip')->references('cod_preinscrip')->on('preinscripcion');
            $table->foreignId('cod_torn')->references('cod_torn')->on('torneo');
            $table->string('nombre_equi',80);
            $table->string('categ_equi',5);
            $table->string('pais_equi',50);
            $table->string('discip_equi',50);
            $table->string('color_equi',15);
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
        Schema::dropIfExists('equipo');
    }
}
