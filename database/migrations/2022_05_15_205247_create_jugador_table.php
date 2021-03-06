<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador', function (Blueprint $table) {
            $table->id('cod_jug');
            $table->foreignId('cod_equi_data')->references('cod_equi_data')->on('equipo_data');
            $table->string('nombre_jug',80);
            $table->string('prim_ap_jug',80);
            $table->string('seg_ap_jug',80);
            $table->string('correo_jug',100);
            $table->string('num_iden_jug',20);
            $table->string('nacion_jug',50);
            $table->string('est_civil_jug',20);
            $table->date('fecha_nac_jug');
            $table->string('telf_jug',20);
            $table->string('sexo_jug',1);
            $table->string('dom_jug',200);//domicilio
            $table->integer('num_equi_jug');
            $table->string('link_img_jug',300);
            $table->timestamp('fecha_inscrip_jug')->useCurrent();
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
        Schema::dropIfExists('jugador');
    }
}
