@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar TC: {{ $venta->serie_comprobante}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($venta,['method'=>'PATCH','route'=>['almacen.venta.update',$venta->idventa
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipo_comprobante">tipo_comprobante</label>
            	<input type="text" tipo_comprobante="tipo_comprobante" class="form-control" value="{{$venta->tipo_comprobante}}" placeholder="tipo_comprobante...">
            </div>
            <div class="form-group">
            	<label for="serie_comprobante">serie_comprobante</label>
            	<input type="text" serie_comprobante="serie_comprobante" class="form-control" value="{{$venta->serie_comprobante}}" placeholder="serie_comprobante...">
            </div>
            <div class="form-group">
            	<label for="num_comprobante">num_comprobante</label>
            	<input type="text" num_comprobante="num_comprobante" class="form-control" value="{{$venta->num_comprobante}}" placeholder="num_comprobante...">
            </div>
        	<div class="form-group">
            	<label for="fecha_hora">fecha_hora</label>
            	<input type="text" fecha_hora="fecha_hora" class="form-control" value="{{$venta->fecha_hora}}" placeholder="fecha_hora...">
            </div>
            <div class="form-group">
            	<label for="saldo_actual">saldo_actual</label>
            	<input type="text" saldo_actual="saldo_actual" class="form-control" value="{{$venta->saldo_actual}}" placeholder="saldo_actual...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection