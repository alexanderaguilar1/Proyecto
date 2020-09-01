<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table='Venta';

    protected $primaryKey='idventa';

    public $timestamps=false;


    protected $fillable =[
    	'idcliente',
    	'tipo_comprobante',
    	'serie_comprobante',
    	'num_comprobante',
    	'fecha_hora',
    	'saldo_actual'
    ];

    protected $guarded =[

    ];
}
