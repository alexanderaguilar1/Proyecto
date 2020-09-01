@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo TC</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>	

			{!!Form::open(array('url'=>'almacen/venta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group"> 
                <label>venta</label>
                <select name="idventa"class="form-control">
                    @foreach ($ventas as $ven)
                    <option values="{{$ven->idventa}}">{{$ven->idventa}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<label for="idcliente">ID cliente</label>
            	<input type="text" idcliente="idcliente" requerid value="{{old('idcliente')}}" class="form-Control" placeholder="idcliente...">
            </div>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="tipo_comprobante">tipo Comprobante</label>
                <input type="text" tipo_comprobante="tipo_comprobante" requerid value="{{old('tipo_comprobante')}}" class="form-Control" placeholder="tipo_comprobante...">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="serie_comprobante">Serie del Comprobante</label>
                <input type="text" name="serie_comprobante" requerid value="{{old('serie_comprobante')}}" class="form-Control" placeholder="serie_comprobante...">
            </div>
        </div>
		
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="num_comprobante">Número del Comprobante</label>
            	<input type="text" name="num_comprobante" requerid value="{{old('num_comprobante')}}" class="form-control" placeholder="num_comprobante...">
            </div>
    	</div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="fecha_hora">Fecha y Hora</label>
            	<input type="time" name="fecha_hora" requerid value="{{old('fecha_hora')}}" class="form-control" placeholder="fecha_hora...">
            </div>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
            	<label for="saldo_actual">saldo_actual</label>
            	<input type="decimal" name="saldo_actual" requerid value="{{old('saldo_actual')}}" class="form-control" placeholder="saldo_actual...">
            </div>
    	</div>    
		
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>
    </div>
    
			{!!Form::close()!!}		
              
@endsection