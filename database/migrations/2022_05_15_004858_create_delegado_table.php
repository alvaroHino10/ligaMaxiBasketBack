<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegado', function (Blueprint $table) {
            $table->id('cod_deleg');
            $table->string('nombre_deleg',80);
            $table->string('ap_deleg',80);
            $table->string('num_iden_deleg',20);
            $table->string('correo_deleg',100);
            $table->string('telf_deleg',20);
            $table->date('fecha_nac_deleg');
            $table->string('sexo_deleg',1);
            $table->string('link_img_deleg',300);
            $table->timestamps();
        });

    }
    //preinscripcion_tabledelegado_table
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delegado');
    }
}
