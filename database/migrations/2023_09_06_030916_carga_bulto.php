<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CargaBulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_bulto', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_bulto');
            $table->foreign('id_bulto')->references('id')->on('bulto')->unique('bulto_fecha');
            $table->timestamp('fecha_inicio')->unique('bulto_fecha');
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id')->on('camion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga_bulto');
    }
}
