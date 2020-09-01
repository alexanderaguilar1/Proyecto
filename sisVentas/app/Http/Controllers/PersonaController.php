<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\facedes\Redirect;
use Illuminate\Support\facedes\input;
use sisVentas\Http\requests\ArticuloFormController;
use sisVentas\Persona;
use DB;

class PersonaController extends Controller
{
    public function __construct() //costructor
    {

    }
    public function index(Request $request) //funcion principal
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $personas=DB::table('persona')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view ('almacen.persona.index',["personas"=>$personas,"searchText"=>$query]); //retornar vista
        }
    }
    public function create() //crear objeto
    {
        return view("almacen.persona.create");
    }
    public function store (PersonaFormRequest $request) //para almacenar
    {
        $persona=new persona;
        $persona->tipo_persona=$request->get('tipo_persona');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->condicion='1';
        $persona->save();
        return Redirect::to('almacen/persona');

    }
    public function show($id) //mostrar
    {
        return view("almacen.persona.show",["persona"=>Persona::findOrFail($id)]);
    }
    public function edit($id) //editar 
    {
        return view("almacen.persona.edit",["persona"=>persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request,$id) //cambiar o attualizar
    {
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona=$request->get('tipo_persona');
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $categoria->update();
        return Redirect::to('almacen/persona');
    }
    public function destroy($id) //destruir objeto
    {
        $persona=Persona::findOrFail($id);
        $persona->condicion='0';
        $persona->update();
        return Redirect::to('almacen/persona');
    }
}
