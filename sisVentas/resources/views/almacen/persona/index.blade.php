@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Personas Asociadas<a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.categoria.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Tipo de Persona</th>
					<th>Nombre</th>
					<th>Tipo documento</th>
					<th>Número documento</th>
					<th>Dirección</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>

               @foreach ($personas as $per)
				<tr>
					<td>{{ $per->idpersona}}</td>
					<td>{{ $per->tipo_persona}}</td>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->tipo_documento}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->direccion}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->email}}</td>
					<td>
						<a href="{{URL::action('CategoriaController@edit',$per->idpersona)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.Persona.modal')
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>

@endsection