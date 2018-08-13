<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuscriptorM extends Model
{
    //

    /*Schema::create('suscriptores', function (Blueprint $table) {
                $table->bigIncrements('idSuscriptor');
                $table->string('primer_nombre');
                $table->string('segundo_nombre')->nullable();
                $table->string('primer_apellido');
                $table->string('segundo_apellido')->nullable();
                $table->string('email');
                $table->string('telefono');
                $table->integer('numero');
                $table->timestamps();
            });*/
    protected $table='suscriptores';
            protected $fillable = [
        'primer_nombre', 'segundo_nombre', 'primer_apellido','segundo_apellido','email',
        'telefono','numero'
    ];

}
