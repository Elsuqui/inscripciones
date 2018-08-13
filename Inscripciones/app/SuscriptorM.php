<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuscriptorM extends Model
{
    //

    /*Schema::create('suscriptores', function (Blueprint $table) {
                $table->bigIncrements('idSuscriptor');
                $table->string('nombre');
                $table->string('email');
                $table->integer('numero');
                $table->timestamps();
            });*/
    protected $table='suscriptores';
            protected $fillable = [
        'idSuscriptor', 'nombre', 'email','numero'
    ];

}
