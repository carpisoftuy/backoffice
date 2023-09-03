<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ubicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table){
            $table->id();
            $table->string('direccion', 256);
            $table->string('codigo_postal', 8);
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 10,8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
