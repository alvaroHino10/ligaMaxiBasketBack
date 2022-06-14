<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlPartidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_partido', function (Blueprint $table) {
            $table->id('cod_contr_part');
            $table->string('nombre_contr_part',80);
            $table->string('prim_ap_contr_part',80);
            $table->string('seg_ap_contr_part',80);
            $table->string('num_iden_contr_part',20);
            $table->string('telf_contr_part',20);
            $table->date('fecha_nac_contr_part',80);
            $table->string('link_img_contr_part',300);
            $table->string('rol_contr_part',80);
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
        Schema::dropIfExists('control_partido');
    }
}
