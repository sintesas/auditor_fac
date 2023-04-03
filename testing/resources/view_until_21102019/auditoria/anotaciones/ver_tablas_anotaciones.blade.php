@extends('partials.card_big')

@extends('layout')

@section('title')
	Tablas Anotaciones
@endsection()

@section('addcss')
	
	<style>
		.cal {
		  float: left;
		  width: 20px;
		  height: 20px;
		  margin: 5px;
		  border: 1px solid rgba(0, 0, 0, .2);
		}

		.yellow {
		  background: #ffe316;
		}

		.orange {
		  background: #ff6b16;
		}

		.red {
		  background: #a50000;
		}
	</style>

@endsection()


@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('anotacion')}}

		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("anotacion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Auditoría</b></th>
							<th><b>Plazo</b></th>
							<th><b>NoAnota</b></th>
							<th><b>Fecha</b></th>
							<th><b>Anotacion</b></th>
							<th><b>Referencia</b></th>
							<th "><b>ACR</b></th>
							<th style="width: 120px;"><b>Acciones</b></th>
							<th><b>Estado</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($anotaciones as $anotacion)
						@if($anotacion->EstadoAnotacion!='0')
						<tr>
							<td>
								 {{$anotacion->auditorias->Codigo}}
							</td>
							<td>
								@if( (((strtotime(now())) - (strtotime($anotacion->Fecha)))/86400) > 1000)
								<div class="cal red"></div>
								@else()
								<div class="cal yellow"></div>
								@endif()
							</td>
							<td>{{$anotacion->NoAnota}}</td>
							<td>
								{{date('M j, Y ',strtotime($anotacion->Fecha))}}
							</td>
							<td>{{$anotacion->Anotacion}}</td>
							<td>{{$anotacion->Referencia}}</td>
							
							<td>
								<div class="col-sm-1">
									<a href="{{route('causaRaiz.show', $anotacion->IdAnotacion) }}" class="btn btn-default btn-group-xs"><span class="fa fa-gear"></span></a>
								</div>
							</td>
							
							<td>
								<div class="col-sm-6">
									{!! Form::open(['route' => ['anotacion.destroy', $anotacion->IdAnotacion], 'method' => 'DELETE']) !!}
									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton', 'style' => 'padding-right: 15px ;']) !!}
									{!! Form::close() !!}
								</div>

								<div class="col-sm-6">
									<a href="{{route('anotacion.edit', $anotacion->IdAnotacion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
							<td>
								<label style="margin-bottom: 50%;" class="checkbox-inline checkbox-styled">
									
									{{ Form::checkbox('EstadoAnotacion','1', null, ['class' => 'EstadoAnotacion', 'id' => 'EstadoAnotacion', 'data-id' => $anotacion->IdAnotacion]) }}
								</label>
							</td>
							
						</tr>
						@endif
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