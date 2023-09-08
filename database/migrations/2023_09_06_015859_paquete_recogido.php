<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaqueteRecogido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_recogido', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('paquete_para_recoger');
            $table->timestamp('fecha_recogido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_recogido');
    }
}
