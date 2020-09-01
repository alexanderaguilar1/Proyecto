<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class tc extends Model
{
    protected $table='persona';
    protected $primaryKey='idpersona';
    public $timestamps=false;

    protected $table='venta';
    protected $primaryKey='idventa';
    public $timestamps=false;

    protected $fillable =[
    	'idpersona',
    	'nombre',
    	'idventa',
    	'fecha_hora',
    	'saldo_actual',
    	'condicion'
    ];

    protected $guarded =[

    ];
}
