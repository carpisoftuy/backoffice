<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaqueteEntregado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_entregado', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('paquete_para_entregar');
            $table->timestamp('fecha_entregado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_entregado');
    }
}