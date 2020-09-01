<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Categoria;//referencia al modelo
use Illuminate\Support\Facades\Redirect; 
use sisVentas\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller
{
    public function __construct() //costructor
    {

    }
    public function index(Request $request) //funcion principal
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view ('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]); //retornar vista
        }
    }
    public function create() //crear objeto
    {
        return view("almacen.categoria.create");
    }
    public function store (CategoriaFormRequest $request) //para almacenar
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');

    }
    public function show($id) //mostrar
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function edit($id) //editar 
    {
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id) //cambiar o attualizar
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
    public function destroy($id) //destruir objeto
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }





}
