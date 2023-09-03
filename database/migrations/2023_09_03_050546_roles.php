<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table){
            $table->id();
                $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
        Schema::create('chofer', function (Blueprint $table){
            $table->id();
                $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
        Schema::create('almacenero', function (Blueprint $table){
            $table->id();
                $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
        Schema::dropIfExists('chofer');
        Schema::dropIfExists('almacenero');

    }
}
