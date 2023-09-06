<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaqueteParaRecoger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_para_recoger', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('paquete');
            $table->unsignedBigInteger('almacen_destino');
            $table->foreign('almacen_destino')->references('id')->on('almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_para_recoger');
    }
}
