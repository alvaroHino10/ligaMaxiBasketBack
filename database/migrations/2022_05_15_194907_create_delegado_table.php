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
            $table->foreignId('cod_preinscrip')->references('cod_preinscrip')->on('preinscripcion');
            $table->string('nombre_deleg',80);
            $table->string('ap_deleg',80);
            $table->string('correo_deleg',100);
            $table->string('telf_deleg',20);
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
        Schema::dropIfExists('delegado');
    }
}
