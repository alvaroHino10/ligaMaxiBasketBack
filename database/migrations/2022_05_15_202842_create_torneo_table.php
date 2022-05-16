<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneo', function (Blueprint $table) {
            $table->id('cod_torn');
            $table->foreignId('cod_organiz')->references('cod_organiz')->on('organizador');
            $table->string('nombre_torn',80);
            $table->string('ciud_torn',50);
            $table->string('pais_torn',50);
            $table->date('fecha_ini_torn');
            $table->date('fecha_fin_torn');
            $table->string('gestion_torn',20);
            $table->date('fecha_ini_preinscrip');
            $table->date('fecha_fin_preinscrip');
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
        Schema::dropIfExists('torneo');
    }
}
