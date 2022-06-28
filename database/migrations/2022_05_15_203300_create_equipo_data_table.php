<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_data', function (Blueprint $table) {
            $table->id('cod_equi_data');
            $table->foreignId('cod_equi')->references('cod_equi')->on('equipo');
            $table->string('pais_equi',50);
            $table->string('discip_equi',50);
            $table->string('color_equi',15);
            $table->integer('cant_jug_equip')->default(0);
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
        Schema::dropIfExists('equipo_data');
    }
}
