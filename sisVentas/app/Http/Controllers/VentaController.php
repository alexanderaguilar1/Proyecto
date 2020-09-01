<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\facedes\Redirect;
use Illuminate\Support\facedes\input;
use sisVentas\Http\requests\ArticuloFormController;
use sisVentas\Venta;
use DB;

class VentaController extends Controller
{
    public function __construct() //costructor
    {

    }
    public function index(Request $request) //funcion principal
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $articulos=DB::table('venta as a')
            ->join('persona as c', 'a.idventa','=','c.idcliente')
            ->select('a.idventa','a.tipo_comprobante','a.serie_comprobante','a.num_comprobante','a.fecha_hora','a.saldo_actual','c.nombre as persona')
            ->where('a.idventa','LIKE','%'.$query.'%')
            ->orwhere('a.num_comprobante','LIKE','%'.$query.'%')
            ->orderBy('a.idventa','desc')
            ->paginate(7);
            return view ('almacen.venta.index',["ventas"=>$ventas,"searchText"=>$query]); //retornar vista
        }
    }
    public function create() //crear objeto
    {
    	$ventas=DB::table('venta')->where('condicion','=','1')->get();
        return view("almacen.venta.create",["ventas"=>$ventas]);
    }
    public function store (VentaFormRequest $request) //para almacenar
    {
        $venta=new venta;
        $venta->idcliente=$request->get('idcliente');
        $venta->tipo_comprobante=$request->get('tipo_comprobante');
        $venta->serie_comprobante=$request->get('serie_comprobante');
        $venta->num_comprobante=$request->get('num_comprobante');
        $venta->fecha_hora=$request->get('fecha_hora');
        $venta->saldo_actual=$request->get('saldo_actual');
               
        $venta->save();
        return Redirect::to('almacen/venta');


    }
    public function show($id) //mostrar
    {
        return view("almacen.venta.show",["venta"=>Venta::findOrFail($id)]);
    }
    public function edit($id) //editar 
    {
    	$venta=Venta::findOrFail($id);
    	$ventas=DB::table('venta')->where('condicion','=','1')->get();
        return view("almacen.venta.edit",["venta"=>$venta,"persona"=>$persona]);
    }
    public function update(ArticuloFormRequest $request,$id) //cambiar o attualizar
    {
        $venta=Venta::findOrFail($id);
		$venta->idcliente=$request->get('idcliente');
		$venta->tipo_comprobante=$request->get('tipo_comprobante');
		$venta->serie_comprobante=$request->get('serie_comprobante');
		$venta->num_comprobante=$request->get('num_comprobante');
		$venta->fecha_hora=$request->get('fecha_hora');
		$venta->saldo_actual=$request->get('saldo_actual');
       	$venta->update();

        return Redirect::to('almacen/venta');
    }
    public function destroy($id) //destruir objeto
    {
        $venta=Venta::findOrFail($id);
        //$venta->estado='inactivo';
        $venta->update();
        return Redirect::to('almacen/venta');
    }
}
