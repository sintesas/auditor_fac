@extends('partials.card')

@extends('layout')

@section('title')
Asignar Usuarios
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>

@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('asignar_usuario') }}

@endsection()

@section('card-content')

<h2>
	<div class="form-group">
		<b>{{$persona->Nombres}}  {{$persona->Apellidos}} </b> 
	</div>
</h2>

{!! Form::open(array('route' => 'asignarusuario.store')) !!}

		{{ csrf_field()}}

		<input type="hidden" name="nombres" value="{{$persona->Nombres}}" >
		<input type="hidden" name="apellidos" value="{{$persona->Apellidos}}">
		<input type="hidden" name="email" value="{{$persona->Email}}">
		<input type="hidden" name="IdPersonal" value="{{$persona->IdPersonal}}">


<div class="row">

	<div style="margin-top: 60px; margin-bottom: 60px;" class="card-body floating-label">

		<div class="row">
			
			<div class="col-sm-4">
				<div class="form-group">
					{{ Form::select('idrole', $roles->prepend('none')->pluck('name', 'id'), null, ['class' => 'form-control', 'id' => 'idrole', 'required']) }}
					<label for="roles">Rol</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="password" name="password" required>
					<label for="password">Contraseña</label>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<input class="form-control" type="password" name="passwordverify" required>
					<label for="password">Verificar Contraseña</label>
				</div>
			</div>			
		</div>

	</div>



	<div  class="row">
		<div class="col-sm-6">	
			{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
		</div>	
		<div class="col-sm-6">	
			{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}	
		</div>										
	</div>

</div>	

{!! Form::close() !!}

@endsection()

@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script src="{{URL::asset('js/edit.js')}}"></script>
 
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});


	
	
</script>



@endsection()


@endsection()