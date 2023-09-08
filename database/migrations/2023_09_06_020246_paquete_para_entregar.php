<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaqueteParaEntregar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_para_entregar', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('paquete');
            $table->unsignedBigInteger('ubicacion_destino');
            $table->foreign('ubicacion_destino')->references('id')->on('ubicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_para_entregar');
    }
}
