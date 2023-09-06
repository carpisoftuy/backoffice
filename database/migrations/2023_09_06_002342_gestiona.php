<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gestiona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestiona', function (Blueprint $table){
            $table->id();
            $table->foreign('id_usuario')->references('id')->on('almacenero')->unique();
            $table->timestamp('fecha_inicio')->unique();
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
        Schema::dropIfExists('gestiona');
    }
}
