<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlmacenContieneBulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_contiene_bulto', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_bulto');
            $table->foreign('id_bulto')->references('id')->on('bulto')->unique('bulto_fecha');
            $table->timestamp('fecha_inicio')->unique('bulto_fecha');
            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id')->on('almacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacen_contiene_bulto');
    }
}
