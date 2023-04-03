@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Auditoria
@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{Breadcrumbs::render('auditoria')}} 

		<!-- The Modal -->
		<button type="button" onclick="window.location='{{ route("auditoria.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>


		@endsection()

		@section('card-content')


			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Codigo</b></th>
							<th><b>Empresa</b></th>
							<th><b>Nombre Auditoria</b></th>
							<th><b>Marco Legal</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($audiorias as $audioria)
						<tr>
							<td>{{$audioria->Codigo}}</td>
							<td>{{$audioria->SiglasNombreClave}}</td>
							<td>{{$audioria->NombreAuditoria}}</td>
							<td>{{$audioria->MarcoLegal}}</td>

							<td>
								<div class="col-sm-6">

									{!! Form::open(['route' => ['auditoria.destroy', $audioria->IdAuditoria], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>


								<div class="col-sm-6">

									<a href="{{route('auditoria.edit', $audioria->IdAuditoria) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

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