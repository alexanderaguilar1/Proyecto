@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de TC <a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.venta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Id Cliente</th>
					<th>Tipo comprobante</th>
					<th>Serie comprobante</th>
					<th>Número comprobante</th>
					<th>Fecha y hora</th>
					<th>Saldo actual</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->idcliente}}</td>
					<td>{{ $ven->tipo_comprobante}}</td>
					<td>{{ $ven->serie_comprobante}}</td>
					<td>{{ $ven->num_comprobante}}</td>
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->saldo_atual}}</td>
					
					<td>
						<a href="{{URL::action('VentaController@edit',$ven->idventa)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>

@endsection