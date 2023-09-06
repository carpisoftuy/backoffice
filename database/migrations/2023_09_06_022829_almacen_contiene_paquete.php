<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlmacenContienePaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_contiene_paquete', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_paquete');
            $table->foreign('id_paquete')->references('id')->on('paquete')->unique('paquete_fecha');
            $table->timestamp('fecha_inicio')->unique('paquete_fecha');
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
        Schema::dropIfExists('almacen_contiene_paquete');
    }
}
