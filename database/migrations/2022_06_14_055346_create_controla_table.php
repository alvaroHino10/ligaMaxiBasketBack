<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controla', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_contr_part')->references('cod_contr_part')->on('control_partido');
            $table->foreignId('cod_part')->references('cod_part')->on('partido');
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
        Schema::dropIfExists('controla');
    }
}
