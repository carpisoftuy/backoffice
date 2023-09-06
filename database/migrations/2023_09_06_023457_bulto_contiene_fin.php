<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BultoContieneFin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulto_contiene_fin', function (Blueprint $table){
            $table->id();
            $table->foreign('id')->references('id')->on('bulto_contiene');
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
        Schema::dropIfExists('bulto_contiene_fin');
    }
}
