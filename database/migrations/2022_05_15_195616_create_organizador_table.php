<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizador', function (Blueprint $table) {
            $table->id('cod_organiz');
            $table->string('nombre_organiz',80);
            $table->string('ap_organiz',80);
            $table->string('correo_organiz',100);
            $table->string('telf_organiz',20);
            $table->string('num_iden_organiz',80);
            $table->string('sexo_organiz',1);
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
        Schema::dropIfExists('organizador');
    }
}
