<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BultoContiene extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulto_contiene', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_paquete');
            $table->foreign('id_paquete')->references('id')->on('paquete')->unique('paquete_fecha');
            $table->timestamp('fecha_inicio')->unique('paquete_fecha');
            $table->unsignedBigInteger('id_bulto');
            $table->foreign('id_bulto')->references('id')->on('bulto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulto_contiene');
    }
}
