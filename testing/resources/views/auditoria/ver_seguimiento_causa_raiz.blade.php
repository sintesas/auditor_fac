@extends('partials.card')

@extends('layout')

@section('title')
	Seguimiento Causa Raiz
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('seguimientocausaraiz') }}

		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


		<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Codigo Auditoria</th>
							<th>Anotación</th>
							<th>Causa Raiz</th>
							<th>Porcentaje</th>
							<th>Estado</th>
							<th>Fecha Seguimiento</th>
							<th style="width: 120px;">Acción</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($seguimientos as $seguimiento)
						<tr>
							<td>{{$seguimiento->Codigo}}</td>
							<td>{{$seguimiento->NoAnota}}</td>
							<td>{{$seguimiento->IdCausaRaiz}}</td>
							<td>{{$seguimiento->Porcentaje}} %</td>
							<td>{{$seguimiento->NombreEstado}}</td>
							<td>{{$seguimiento->FechaSeguimiento}}</td>
							

							<td>
							
								<div class="col-sm-6">

									{!! Form::open(['route' => ['seguimientoCausaRaiz.destroy', $seguimiento->IdSeguimiento], 'method' => 'DELETE']) !!}									

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>

								<div class="col-sm-6">

									<a href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>
	
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				{{-- <div class="text-center">
				{!! $seguimientos->links(); !!}
				</div> --}}
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