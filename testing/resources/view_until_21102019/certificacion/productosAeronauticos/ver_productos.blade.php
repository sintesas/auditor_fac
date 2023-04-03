@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Producto
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('productos')}} 

		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("productos.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Nombre</b></th>
							<th><b>ParteNumero</b></th>
							<th><b>NSN</b></th>
							<th><b>CodigoSAP</b></th>
							<th><b>Unidad</b></th>
							{{-- <th style="width: 120px;"><b>Matriz de Impacto</b></th> --}}
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($productos as $producto)
						<tr>
							<td>{{$producto->Nombre}}</td>
							<td>{{$producto->ParteNumero}}</td>
							<td>{{$producto->NSN}}</td>
							<td>{{$producto->CodigoSAP}}</td>
							<td>{{$producto->NombreUnidad}}</td>
							{{-- <td>
								<div class="col-sm-6">
									<a href="{{route('productos.show', $producto->IdDemandaPotencial) }}" class="btn btn-default btn-group-xs"><span class="fa fa-gear"></span></a>
								</div>
							</td> --}}
							<td>
								<div class="col-sm-6">
									@if($producto->Activo)
									{!! Form::open(['route' => ['productos.destroy', $producto->IdDemandaPotencial], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
									@else
									{!! Form::open(['route' => ['productos.show', $producto->IdDemandaPotencial], 'method' => 'GET']) !!}

									{!!Form::submit('✓', ['class' => 'btn btn-success','style'=>'height: 36px;width: 36px;']) !!}

									{!! Form::close() !!}
									@endif
								</div>


								<div class="col-sm-6">

									<a href="{{route('productos.edit', $producto->IdDemandaPotencial) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
	
							</td>
							{{-- <td>{{$ata->Activo}}</td> --}}
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!--end .table-responsive -->
		</div><!--end .col -->
		@endsection()

	@endsection()
	@section('addjs')

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>

@endsection()
@endsection()