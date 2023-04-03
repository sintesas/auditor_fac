@extends('partials.card')

@extends('layout')

@section('title')
Informe Empresas Por Sector
@endsection()

@section('content')

@section('card-content')
@section('card-title')
{{ Breadcrumbs::render('ver_empresas_sector') }}
@endsection()

@section('card-content')


<div class="col-lg-12">
	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Oferta Comercial</b></th>
					<th><b>Descripción</b></th>
					<th style="width: 120px;"><b>Acción</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($ofertaSectorAeronautico as $OfertasSectorAeronautico)
				<tr>
					<td>{{$OfertasSectorAeronautico->OfertaComercial}}</td>
					<td>{{$OfertasSectorAeronautico->Descripcion}}</td>

					<td>
						<div class="col-sm-6">
							<a href="{{route('informeofertasporcapacidad.show', $OfertasSectorAeronautico->IdOfertaComercial) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-search"></i></div></a>
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