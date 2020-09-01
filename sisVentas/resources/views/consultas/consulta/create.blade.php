@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
			<h3>Generar Consulta</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'consultas/Consulta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="idasociado">Codigo del asociado</label>
            	<input type="int" name="id_asociado" class="form-control" placeholder="id_asociado...">
            </div>
            <div class="form-group">
            	<label for="nombre_asociado">nombre_asociado</label>
            	<input type="text" name="nombre_asociado" class="form-control" placeholder="nombre_asociado...">
            </div>
            <div class="form-group">
            	<label for="no_tc">Número de TC</label>
            	<input type="text" name="no_tc" class="form-control" placeholder="Numero de TC...">
            </div>
            <div class="form-group">
            	<label for="fecha_hora">Fecha Emisión TC</label>
            	<input type="datatime" name="fecha_hora" class="form-control" placeholder="fecha...">
            </div>
            <div class="form-group">
            	<label for="monto">Monto</label>
            	<input type="int" name="monto" class="form-control" placeholder="monto...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Generar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection