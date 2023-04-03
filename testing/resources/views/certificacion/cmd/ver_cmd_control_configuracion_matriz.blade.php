@extends('partials.card')

@extends('layout')

@section('title')
	Ver Niveles
@endsection()

@section('content')
	
	@section('card-content')
		@section('card-title')
		{{-- {{ Breadcrumbs::render('progMatrizCumplimiento') }} --}}
		Niveles Control Configuración
		@endsection()

		@section('card-content')
			{{-- <h4><strong>Programa:</strong> {{$programa->Consecutivo}} -  <strong>Base Certificación:</strong> {{$baseCerti->Nombre}}</h4> --}}

		<div class="col-lg-12">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Nivel</b></th>
							<th style="width: 120px;"><b>Evidencias</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cmdMatrizNiveles as $cmdMatrizNivel)	
						
						<tr>

							<td><div class="row"><div class="col-sm-12">{{$cmdMatrizNivel->CMDNivel}}</div></div></td>

							<td>

								<div class="col-sm-6">

									<a href="{{route('cmdEvidencias.show', $cmdMatrizNivel->IdCMDRequisitos) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>

								</div>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div><!--end .table-responsive -->
			{{-- submit button --}}
		
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("cmdcontrolconfiguracion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div><!--end .col -->
				
		@endsection()


	@endsection()

@section('addjs')

@endsection()
	

@endsection()