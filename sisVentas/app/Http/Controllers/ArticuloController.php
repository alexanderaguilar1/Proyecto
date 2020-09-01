<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\facedes\Redirect;
use Illuminate\Support\facedes\input;
use sisVentas\Http\requests\ArticuloFormController;
use sisVentas\Articulo;
use DB;

class ArticuloController extends Controller
{
    public function __construct() //costructor
    {

    }
    public function index(Request $request) //funcion principal
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $articulos=DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria','=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(7);
            return view ('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]); //retornar vista
        }
    }
    public function create() //crear objeto
    {
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.articulo.create",["categorias"=>$categorias]);
    }
    public function store (ArticuloFormRequest $request) //para almacenar
    {
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
        
        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_patch().'/imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->save();
        return Redirect::to('almacen/articulo');


    }
    public function show($id) //mostrar
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }
    public function edit($id) //editar 
    {
    	$articulo=Articulo::findOrFail($id);
    	$categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }
    public function update(ArticuloFormRequest $request,$id) //cambiar o attualizar
    {
        $articulo=Articulo::findOrFail($id);
		$Articulo->idcategoria=$request->get('idcategoria');
        $Articulo->codigo=$request->get('codigo');
        $Articulo->nombre=$request->get('nombre');
        $Articulo->stock=$request->get('stock');
        $Articulo->descripcion=$request->get('descripcion');
        $Articulo->estado='Activo';
       
        if(Input::hasfile('imagen')){
        	$file=Input::file('imagen');
        	$file->move(public_patch().'imagenes/articulos/',$file->getClientOriginalName());
        	$articulo->imagen=$file->getClientOriginalName();
        }
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
    public function destroy($id) //destruir objeto
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='inactivo';
        $categoria->update();
        return Redirect::to('almacen/articulo');
    }

}
