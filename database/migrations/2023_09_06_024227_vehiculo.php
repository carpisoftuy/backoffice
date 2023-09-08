<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        chema::create('vehiculo', function (Blueprint $table){
            $table->id();
            $table->string('codigo_pais', 3)->unique();
            $table->string('matricula', 16);
            $table->int('capacidad_volumen');
            $table->int('capacidad_peso');
            $table->int('peso_ocupado');
            $table->int('volumen_ocupado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
}
