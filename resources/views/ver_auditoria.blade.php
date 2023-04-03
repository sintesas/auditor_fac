@extends('partials.card')

@extends('layout')

@section('title')
	Tablas Crear Inspección
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
							<th><b>Nombre inspección</b></th>
							<th><b>Fecha inicio</b></th>
							<th><b>Tipo de inspección</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($audiorias as $audioria)
						<tr>
							<td>{{$audioria->Codigo}}</td>
							<td>{{$audioria->NombreAuditoria}}</td>
							<td>{{$audioria->FechaInicio}}</td>
							@foreach ($tiposAuditoria as $tipoAuditoria)
								@if ($tipoAuditoria->IdTipoAuditoria == $audioria->IdTipoAuditoria) 
									<td>{{$tipoAuditoria->TipoAuditoria}}</td>
								@endif
							@endforeach	

							<td>
								@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true || $gl_perfil[24] == true)
								<div class="col-sm-6">

									{!! Form::open(['route' => ['auditoria.destroy', $audioria->IdAuditoria], 'method' => 'DELETE']) !!}

									{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}

									{!! Form::close() !!}
								</div>
							@endif

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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
	$(document).ready(function(){
		$('#datatable1').DataTable({
			        dom: '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-4"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [
                
                'excelHtml5',
                
            ]
		});
     $(".dt-button.buttons-excel.buttons-html5").addclass('btn btn-info')
	});
</script>

@endsection()
@endsection()