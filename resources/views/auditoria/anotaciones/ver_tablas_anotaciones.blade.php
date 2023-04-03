@extends('partials.card_big')

@extends('layout')

@section('title')
	Auditoria - Tablas Anotaciones
@endsection()

@section('addcss')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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

			@if ($rolAdd !== 'limitador-user')
				<!-- The Modal -->
				<button type="button" onclick="window.location='{{ route("anotacion.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
			@endif

		@endsection()

		@section('card-content')

		<div class="total-card">
			<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%; width:100%;" >
				<div class="table-responsive" >
					<table id="example"
					class="table table-striped table-hover " style="font-size: 12px;" >
						<thead  class="text-align" style="font-size: 12px;">
							<tr>
                               <th><b>Codificación hallazgo</b></th>
                               <th><b>Descripción del hallazgo</b></th>		
                               <th><b>Nombre inspección</b></th>
                                <th><b>Código Tema<b></th>						
                                 <th><b>Tema catalogación<b></th>
								
								
								
								<th><b>Fecha hallazgo</b></th>
								<th><b>Tipo hallazgo</b></th>
							    
								<th><b>Resumen del hallazgo</b></th>
                              
								<th style="width: 120px;"><b>Acciones</b></th>
							</tr>
						</thead>

						<tbody id="data_table" name="data_table">
							@foreach ($anotaciones as $anotacion)
								@if($anotacion->EstadoAnotacion!='0')
									<tr>
                                       <td>{{$anotacion->NoAnota}}</td>
                                        <td>{{$anotacion->DescripcionEvidencia}}</td>  
                                        <td>{{$anotacion->NombreAuditoria}}</td> 
										    <td>{{$anotacion->codigotema}}</td> 
                                              <td>{{$anotacion->temacatalogacion}}</td> 
										{{--<td>
											@if( (((strtotime(now())) - (strtotime($anotacion->Fecha)))/86400) > 1000)
											<div class="cal red"></div>
											@else()
											<div class="cal yellow"></div>
											@endif()
										</td>--}}
										
										
										<td>
											{{date('M j, Y ',strtotime($anotacion->Fecha))}}
										</td>
										<td>{{'a'.$anotacion->Anotacion}}</td>
										

										<td>
											<div class="col-sm-1">
												<a href="{{route('causaRaiz.show', $anotacion->IdAnotacion) }}" class="btn btn-default btn-group-xs"><span class="fa fa-gear"></span></a>
											</div>
										</td>
                                       
										<td>
											@if ($gl_perfil[12] == true || $gl_perfil[13] == true || $gl_perfil[2] == true)
												<div class="col-sm-6">
													{!! Form::open(['route' => ['anotacion.destroy', $anotacion->IdAnotacion], 'method' => 'DELETE']) !!}
													{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton', 'style' => 'padding-right: 15px ;']) !!}
													{!! Form::close() !!}
												</div>
											@endif

											<div class="col-sm-6">
												<a href="{{route('anotacion.edit', $anotacion->IdAnotacion) }}" class="btn btn-primary btn-block editbutton" ><div class="gui-icon"><i class="fa fa-pencil iconEdit"></i></div></a>
											</div>
										</td>
										

									</tr>
								@endif
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th><b>Codificación hallazgo</b></th>
                               <th><b>Hallazgo</b></th>		
                               <th><b>Nombre inspección</b></th>						
                               <th><b>Código Tema<b></th>						
                                 <th><b>Tema catalogación<b></th>
								
								
								
								<th><b>Fecha hallazgo</b></th>
								<th><b>Tipo hallazgo</b></th>
							
								<th><b>Resumen del hallazgo</b></th>
                               
								<th><b>Acciones</b></th>
								
							</tr>
						</tfoot>
					</table>
					<h5 id="conteo"></h5>

					<input type="hidden" id="tablehtml">
					<input type="hidden" name="" id="rol" value="{{$rol}}">

					{{-- {{route('informeresumenprograma.create') }} --}}

			</div><!--end .table-responsive -->
		</div><!--end .col -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/filtering/row-based/range_dates.js"></script> --}}

<script type="text/javascript">

$(document).ready(function() {


	var rol = $('#rol').val().toString();

	$('#example tfoot th').each( function () {
        var title = $(this).text();
       $(this).html( '<input type="text" placeholder="B '+title+'" />' );
    });

	if(rol == 'limitador'){

		$('.iconEdit').removeClass('fa-pencil').addClass('fa-eye');

		var table=$('#example').DataTable({
			dom: 'Bfxrtip',
			sPaginationType: "full_numbers",
			bProcessing: true,
			bAutoWidth: false,
			language: {
			decimal: "",
			emptyTable: "No hay test",
			info:
			"Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
			infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
			infoFiltered: "(Filtrados del total de _MAX_ registros)",
			infoPostFix: "",
			thousands: ",",
			lengthMenu: "Mostrar _MENU_ registros por página",
			loadingRecords: "Cargando...",
			processing: "Procesando...",
			search: "Buscar:",
			zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",
			paginate: {
			first: "Primera",
			last: "Última",
			next: "Siguiente",
			previous: "Anterior"
			},
			aria: {
				sortAscending: ": activate to sort column ascending",
				sortDescending: ": activate to sort column descending"
				}
			},
			buttons: [
				'copy', 'csv', 'excel', 'print',
				{
						extend: 'pdfHtml5',
						text: 'PDF',
						orientation: 'landscape',
						pageSize: 'TABLOID',
						pageMargins:  [ 0, 0, 0, 12 ],
						alignment: 'center',
						FontFamily: 'ARIAL',
						Fontsize: '4'
				}
			],
			columnDefs: [
				{ width: "10px", targets: 0 },
				{ width: "100px", targets: 1 },
				{ width: "50px", targets: 2 },
				{ width: "50px", targets: 3 },
				{ width: "50px", targets: 4 },
				{ width: "50px", targets: 5 },
				{ width: "50px", targets: 6 },
			
				
			],

		});
	}else{
		var table=$('#example').DataTable({
			dom: 'Bfxrtip',
			sPaginationType: "full_numbers",
			bProcessing: true,
			bAutoWidth: false,
			language: {
			decimal: "",
			emptyTable: "No hay test",
			info:
			"Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
			infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
			infoFiltered: "(Filtrados del total de _MAX_ registros)",
			infoPostFix: "",
			thousands: ",",
			lengthMenu: "Mostrar _MENU_ registros por página",
			loadingRecords: "Cargando...",
			processing: "Procesando...",
			search: "Buscar:",
			zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",
			paginate: {
			first: "Primera",
			last: "Última",
			next: "Siguiente",
			previous: "Anterior"
			},
			aria: {
				sortAscending: ": activate to sort column ascending",
				sortDescending: ": activate to sort column descending"
				}
			},
			buttons: [
				'copy', 'csv', 'excel', 'print',
				{
						extend: 'pdfHtml5',
						text: 'PDF',
						orientation: 'landscape',
						pageSize: 'TABLOID',
						pageMargins:  [ 0, 0, 0, 12 ],
						alignment: 'center',
						FontFamily: 'ARIAL',
						Fontsize: '4'
				}
			],
			columnDefs: [
				{ width: "10px", targets: 0 },
				{ width: "100px", targets: 1 },
				{ width: "50px", targets: 2 },
				{ width: "50px", targets: 3 },
				{ width: "50px", targets: 4 },
				{ width: "50px", targets: 5 },
				{ width: "50px", targets: 6 },
			
				
				
			],

		});
	}

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                   .draw();
            }
        } );
    } );

	$.fn.table.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[14] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             	( isNaN( min ) && age <= max ) ||
             	( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        	{
            	return true;
        	}
        	return false;
    	}
	);

	$(document).ready(function() {
    //var table = $('#example').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    	} );
	} );

} );

var orientation = '';
        var count = 0;
        $("table.dataTable").find('thead tr:first-child th').each(function () {
            count++;
        });
        if (count > 6) {
            orientation = 'landscape';
        } else {
            orientation = 'portrait';
        }
</script>



		@endsection()


	@endsection()

@section('addjs')


<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>



@endsection()


@endsection()
