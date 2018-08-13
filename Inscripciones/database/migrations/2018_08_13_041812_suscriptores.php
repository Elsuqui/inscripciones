<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Suscriptores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creacion de tabla de suscriptores
        if(!Schema::hasTable('suscriptores'))
        {
            Schema::create('suscriptores', function (Blueprint $table) {
                $table->bigIncrements('idSuscriptor');
                $table->string('nombre');
                $table->string('email');
                $table->integer('numero');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscriptores');
    }
}
