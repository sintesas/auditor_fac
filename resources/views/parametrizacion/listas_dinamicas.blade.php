@extends('partials.card')

@extends('layout')

@section('title')
	Listas Dinámicas
@endsection()

@section('content')

	@section('card-content')

		@section('card-title')
			{{Breadcrumbs::render('listas_dinamicas')}}
			{{-- onclick="window.location='{{ route("crear_listas_dinamicas") }}'" --}}
			<button type="button"  class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endsection()

		@section('card-content')
			<div class="col-lg-12">
			<div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead>
						<tr>
							<th><b>Nombre Lista</b></th>
							<th style="width: 120px;"><b>Acción</b></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($listasDinamicas as $item)
						<tr>
							<td>{{ $item->nombre_lista }}
							<td>
								<div class="col-sm-12">
									<a href="javascript:void(0)" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil"></i></div></a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
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
