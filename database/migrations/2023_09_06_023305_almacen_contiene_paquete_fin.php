<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlmacenContienePaqueteFin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_contiene_paquete_fin', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('almacen_contiene_paquete');
            $table->timestamp('fecha_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacen_contiene_paquete_fin');
    }
}
