@extends('partials.card_big')

@extends('layout')

@section('title')
	Ver Requisitos Matriz
@endsection()

@section('content')
	
	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Matriz de Cumplimiento

		@endsection()

		@section('card-content')
			{{-- <h4><strong>Base Certificación:</strong> {{$baseCertificacion->Referencia}} - {{$baseCertificacion->Nombre}}</h4>
			<h4><strong>Sub-Parte:</strong> {{$subParte->SubParte}}</h4> --}}		

		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							{{-- datos		 --}}
							<th style="width: 120px;"><b>ID</b><p>Código del Requisito</p></th>
							<th style="width: 260px;"><b>Nombre General del Requisito</b><p>Trasnquiba Textualmente el Requisito</p></th>
							<th style="width: 450px;"><b>Descripcion del Requisito</b><p>Trasnquiba Textualmente el Requisito  desde su Fuente Manteniendo su Forma e Idioma Original</p></th>
							<th style="width: 330px;"><b>Guia Aplicable, Referencia & Obervaciones</b><p>AMC-GM / AC / Otro Material Guia</p></th>
							<th style="width: 120px;"><b>Estado Requisito</th>
							<th style="width: 120px;"><b>MoC</b><p>Código Medio de Cumplimiento</p></th>
							<th style="width: 120px;"><b>Estado MoC</th>
							<th style="width: 120px;"><b>Evidencias</b><p>Descripción Evidencia</p></th>
							<th style="width: 120px;"><b>Evidencias</b><p>Observaciones Evidencias</p></th>
							<th style="width: 120px;"><b>Estado Evidencias</th>
							<th style="width: 180px;"><b>Aprobación</b><p>Especialista en Certificación / Tecnico Control Aeronavegabilidad</p></th>
							<th style="width: 180px;"><b>Aprobación</b><p>Observaciones de la Aprobación</p></th>

							<th style="width: 180px;"><b>Aprobación</b><p>Nombres y Apellidos de Quien Aprueba</p></th>
							<th style="width: 180px;"><b>Aprobación</b><p>Fecha de la Aprobación</p></th>
							<th style="width: 180px;"><b>Aprobación</b><p>Firma de la Aprobación</p></th>

						</tr>
					</thead>
					<tbody>
						@foreach ($requsitos as $requsito)
						
						<tr>
							{{-- Requisitos --}}
							<td><div class="row"><div class="col-sm-12">{{$requsito->CodigoRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->NombreRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->DescripcioRequisito}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->GuiaAplicable}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->EstadoRequisito}}</div></div></td>
							{{-- MOCs --}}
							<td><div class="row"><div class="col-sm-12">{{$requsito->Numero}} - {{$requsito->Medio}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->EstadoMOC}}</div></div></td>
							{{-- Evidencias --}}
							<td><div class="row"><div class="col-sm-12">{{$requsito->DescripcionsEvidencia}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->ObervacionesEvidencia}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->EstadoEvidencia}}</div></div></td>
							{{-- Aprobacion --}}
							<td><div class="row"><div class="col-sm-12">{{$requsito->Aprobado}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->Obervaciones}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->NombresApellidos}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->Fecha}}</div></div></td>
							<td><div class="row"><div class="col-sm-12">{{$requsito->Firma}}</div></div></td>
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
		$('#datatable1').DataTable({
			 "scrollX": true,
			 "scrollY":        "400px",
        	 "scrollCollapse": true,
		});
	});
</script>

@endsection()
	

@endsection()