<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Informacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion', function(Blueprint $table){
            $table->id('id_informacion');
            $table->unsignedBigInteger('id_usuario');
                $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->string('tipo', 16);
            $table->string('detalle', 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
