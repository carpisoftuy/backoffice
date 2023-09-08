<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulto', function (Blueprint $table){
            $table->id();
            $table->timestamp('fecha_armado');
            $table->int('volumen');
            $table->int('peso');
            $table->int('almacen_destino');
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
        Schema::dropIfExists('bulto');
    }
}
