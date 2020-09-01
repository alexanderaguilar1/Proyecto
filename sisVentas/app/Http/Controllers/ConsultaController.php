<?php

namespace sisVentas\Http\Controllers;
use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Categoria;//referencia al modelo
use Illuminate\Support\Facades\Redirect; 
use sisVentas\Http\Requests\TcFormRequest;
use DB;

class ConsultaController extends Controller
{
   public function __construct() //costructor
    {

    }
    public function index(Request $request) //funcion principal
    {
        if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $persona=DB::table('persona')->where('idpersona','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view ('consultas.consulta.index',["persona"=>$consulta,"searchText"=>$query]); //retornar vista
        }

        else if ($request)
        {
            $query=trim($request->get('searchText')); //determina texto de busqueda
            $persona=DB::table('venta')->where('idventa','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idventa','desc')
            ->paginate(7);
            return view ('consultas.consulta.index',["persona"=>$consulta,"searchText"=>$query]); //retornar vista
        }


    }
    public function create() //crear objeto
    {
        return view("consultas.consulta.create");
    }
    public function store (CategoriaFormRequest $request) //para almacenar
    {
        $persona=new persona;
        $persona->nombre=$request->get('nombre');
        $persona->condicion='1';
        $persona->save();
        return Redirect::to('consultas/consulta');

        $venta=new venta;
        $venta->fecha_actual=$request->get('fecha_actual');
        $persona->condicion='1';
        $persona->save();
        return Redirect::to('consultas/consulta');

    }
    public function show($id) //mostrar
    {
        return view("consultas.consulta.show",["tc"=>Tc::findOrFail($id)]);
    }
    public function edit($id) //editar 
    {
        return view("consultas.consulta.edit",["tc"=>Tc::findOrFail($id)]);
    }
    public function update(TcFormRequest $request,$id) //cambiar o attualizar
    {
        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $categoria->update();
        return Redirect::to('consultas/consulta');
    }
    public function destroy($id) //destruir objeto
    {
        $persona=Persona::findOrFail($id);
        $persona->condicion='0';
        $persona->update();
        return Redirect::to('consultas/consulta');
    }

}
