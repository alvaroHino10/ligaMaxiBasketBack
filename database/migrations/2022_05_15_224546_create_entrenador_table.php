<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrenadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenador', function (Blueprint $table) {
            $table->id('cod_entren');
            $table->foreignId('cod_equi_data')->references('cod_equi_data')->on('equipo_data');
            $table->string('nombre_entren',80);
            $table->string('ap_entren',80);
            $table->string('num_iden_entren',20);
            $table->date('fecha_nac_entren');
            $table->string('correo_entren',100);
            $table->string('telf_entren',20);
            $table->string('sexo_entren',1);
            $table->string('link_img_entren',300);
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
        Schema::dropIfExists('entrenador');
    }
}
