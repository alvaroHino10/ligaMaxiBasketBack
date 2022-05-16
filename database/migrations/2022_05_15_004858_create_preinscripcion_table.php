<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreinscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripcion', function (Blueprint $table) {
            $table->id('cod_preinscrip');
            $table->string('num_transfer_preinscrip',20);
            $table->integer('costo_preinscrip');
            $table->date('fecha_preinscrip');
            $table->string('link_img_comprob',300);
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
        Schema::dropIfExists('preinscripcion');
    }
}
