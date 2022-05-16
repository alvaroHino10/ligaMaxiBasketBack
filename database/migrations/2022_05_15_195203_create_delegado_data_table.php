<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelegadoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegado_data', function (Blueprint $table) {
            $table->id('cod_deleg_data');
            $table->foreignId('cod_deleg')->references('cod_deleg')->on('delegado');
            $table->string('num_iden_deleg_data',20);
            $table->date('fecha_nac_deleg_data');
            $table->string('sexo_deleg_data',1);
            $table->string('link_img_deleg_data',300);
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
        Schema::dropIfExists('delegado_data');
    }
}
