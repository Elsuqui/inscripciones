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
                $table->bigIncrements('id');
                $table->integer('id_user')->unsigned();
                $table->string('primer_nombre');
                $table->string('segundo_nombre')->nullable();
                $table->string('primer_apellido');
                $table->string('segundo_apellido')->nullable();
                $table->string('email');
                $table->string('telefono');
                $table->integer('numero');
                $table->foreign('id_user')->references('id')->on('users');
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
