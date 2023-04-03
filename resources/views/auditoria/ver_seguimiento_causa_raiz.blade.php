@extends('partials.card_big')

@extends('layout')

@section('title')
	Seguimiento Causa Raiz
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
	.cal {
		  float: left;
		  width: 20px;
		  height: 20px;
		  margin: 5px;
		  border: 1px solid rgba(0, 0, 0, .2);
		}

		.green {
		  background: #00B050;
		}

		.orange {
		  background: #ff6b16;
		}

		.red {
		  background: #DA9694;
		}
		.btn-view{
			padding: 0;
			margin-left: 15px;
			margin-top: 10px;
		}
		#acciones-btn{
			padding: 0;
			margin: 0;
		}

</style>

@endsection()

@section('content')

	@section('card-content')
		@section('card-title')
			{{ Breadcrumbs::render('seguimientocausaraiz') }}

		@if ($rol)
			<!-- The Modal -->
			<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.create") }}'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
		@endif


		@endsection()

		@section('card-content')

		
			
				@if($rolAdmin || $rol_IGEFA || $rol_CEOAF)
			<a href="{{url('exportSeguimientoCausaRaiz')}}" class="btn btn-md btn-info pull-left">Descargar EXCEL</a>
  
		@endif
<div class="total-card">
			<div class="col-lg-12" style="overflow: scroll; overflow-y:hidden;  height:100%; width:100%;" >
 <div class="table-responsive">
				<table id="datatable1" class="table table-striped table-hover">
					<thead style="font-size: 12px;">
						<tr>
							<th style="width:auto ;padding-left: 0px; padding-right: 0px; text-align: center;">Estado</th>
							<th style="width:auto;padding-left: 0px; padding-right: 0px; text-align: center;" >Porcentaje</th>
		                   <th style="width: auto;padding-left: 0px; padding-right: 0px; text-align: center;" >Código Inspección</th>
                            <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;"> Nombre Inspección</th>
                            <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;">Tipo Inspección</th>
                            <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;">UMA</th>
                             <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;">Dependencia</th> 
                        	<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Código Hallazgo</th> 
                        <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Descripción del Hallazgo</th> 
      
                <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Tipo Hallazgo </th> 
                 <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Fecha Hallazgo </th> 
        <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Código Tema </th> 
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" > Tema Catalogación </th> 
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" > Criterio que se incumple </th>
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" > Causa del incumplimiento </th>
	<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Actividad/Descripción</th>
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >  Entregable
</th>
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" > Cantidad de Entregables
</th>
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >  Fecha de Inicio
</th>
<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >  Fecha de Terminacion
</th>


						
					
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Responsable</th>
						
						
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;">Seguimiento</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Fecha Seguimiento</th>
							<th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Dias Restantes</th>
                             <th style="width: 100px;padding-left: 0px; padding-right: 0px; text-align: center;" >Fecha Concepto</th>
                           	<th style="width: 50px;padding-left: 0px; padding-right: 0px; text-align: center;" >Concepto Efectividad</th>
							<th style="width: 120px;padding-left: 0px; padding-right: 0px; text-align: center;"class='accion' >Acción</th>
						</tr>
					</thead>
					<tbody id="data_table" name="data_table">

						@foreach ($seguimientos as $seguimiento)

						<tr style="font-size: 12px;">
							<td>
								@if($seguimiento->Porcentaje < 100)
									<i class="cal red"></i>
								@else
									<i class="cal green"></i>
								@endif
							</td>
							<td>{{$seguimiento->Porcentaje}} %</td>
	                        <td>{{$seguimiento->Codigo}}</td>
                            <td> {{$seguimiento->NombreAuditoria}} </td>
                             <td> {{$seguimiento->TipoInspeccion}} </td>
                             <td> {{$seguimiento->UMA}} </td>
                             <td> {{$seguimiento->Dependencia}} </td>
							<td>{{$seguimiento->NoAnota}}</td>
                           <td>{{$seguimiento->DescripcionHallazgo}}</td>
<td>{{$seguimiento->Tipohallazgo}}</td>
<td>{{$seguimiento->fechaHallazgo}}</td>
<td>{{$seguimiento->codigotema}}</td>
<td>{{$seguimiento->temacatalogacion}}</td>
<td>{{$seguimiento->CriterioIncumple}}</td>
<td> {{$seguimiento->CausaRaiz}}</td>
<td>{{$seguimiento->AccionTarea}}</td>
<td>{{$seguimiento->Entregable}}</td>
<td>{{$seguimiento->CantidadEntregable}}</td>
<td>{{$seguimiento->FechaInicio}}</td>
<td>{{$seguimiento->Fechaterminacion}}</td>

							
						
							<td>{{$seguimiento->Name}}</td>
							
							<td>{{$seguimiento->AccionSeguimiento}}</td>
							<td>{{$seguimiento->FechaSeguimiento}}</td>
							<td>
								<?php
									$fecha_actual = date('Y-m-d');
									$s = strtotime($seguimiento->FechaFinal) - strtotime($fecha_actual);
									$d = intval($s/86400);
									echo $d. ' Dias'
								?>
							</td>
     <td> {{$seguimiento->FechaConcepto}} </td>

 <td> {{$seguimiento->NombreEstado}} </td>
							<td id="acciones-btn" class="accion">

								<div class="col">

									@if($rolAdmin)
										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary " ><div class="gui-icon-view"><i class="fa fa-pencil"></i></div></a>

										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary " ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>

										<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success " ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

									@endif


									<!--RESPONSABLE-->
									@if ($seguimiento->IdEstadoSeguimiento == 1 || $seguimiento->IdEstadoSeguimiento == 4)

											@if (strcmp(trim($email),trim($seguimiento->Email)) == 0 && $rolAdmin == false)

												<a href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-pencil"></i></div></>

											@endif
											@if(strcmp(trim($email),trim($seguimiento->Email)) == 1 && $rolAdmin == false)

												<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>

											@endif

									@else
											@if($rolAdmin!=true)
											<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.edit', $seguimiento->IdSeguimiento) }}" class="btn btn-primary" ><div class="gui-icon-view"><i class="fa fa-eye"></i></div></a>
											@endif
									@endif

									@if($seguimiento->IdEstadoSeguimiento != 8)

										{{-- Responsable --}}
										@if ($seguimiento->IdEstadoSeguimiento == 1 || $seguimiento->IdEstadoSeguimiento == 4)

												@if (strcmp(trim($email),trim($seguimiento->Email)) == 0 && $rolAdmin != true)

													<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

												@endif

										{{-- CEOAF --}}
										@elseif ($seguimiento->IdEstadoSeguimiento == 3 || $seguimiento->IdEstadoSeguimiento == 7)
											@if ($rol_CEOAF && $rolAdmin != true)

												<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

											@endif

										{{-- IGEFA --}}

										@elseif($seguimiento->IdEstadoSeguimiento == 5)
											@if ($rol_IGEFA && $rolAdmin != true)

													<a style="padding:5px 10px" href="{{route('seguimientoCausaRaiz.show', $seguimiento->IdSeguimiento) }}" class="btn btn-success" ><div class="gui-icon-view"><i class="fa fa-check"></i></div></a>

											@endif
										@endif

									@endif

								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
 </div>
</div>
</div>
				<h5 id="conteo"></h5>
				<input type="hidden" id="tablehtml">

				{{-- <div class="text-center">
				{!! $seguimientos->links(); !!}
				</div> --}}
		
		@endsection()

	@endsection()

	@section('addjs')

		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/jszip.min.js')}}"></script>
        <script src="{{URL::asset('js/libs/DataTables/buttons.html5.min.js')}}"></script>
    

		<script>

			function aprobarSeguimiento(ev){
				var dato = confirm('Aprobar Seguimiento');
				if(dato){
					if(ev != ''){
						$.get("seguimientoCausaRaiz/AprobarSeguimiento/" + ev + "", function(response, state){
							if(response == 1){
								window.location = '{{ route("seguimientoCausaRaiz.index") }}';
							}else{
								alert('No fue posible actualizar el seguimiento');
							}
						});
					}
				}
			}
			/*setTimeout(function(){
                $('#datatable1').DataTable(
					{
						//Excel
						dom: 'Bfrtip',
						buttons: [
							{
								extend: 'excelHtml5',
								text: 'Excel',
								title: 'Seguimientos',
								download: 'open',
								orientation:'landscape',
								exportOptions: {
									columns: ':visible'
								},
								className: "btn btn-primary"
							}
						]
					}
				);
				//PDF
				//$('.dt-buttons').prepend('<button type="button" onclick="return exportFile(\'build\');" style="padding: 4.5px 14px; width: 60px; font-style: Roboto;" class="btn btn-primary pull-left"> PDF </button>&nbsp;');
            }, 100);	*/


			/*function exportFile(type){
                location.href='{{ url("filterDinamicCompanyReportCreator") }}' + '?data=' + dinamicDataConfig(type);
            }

			function dinamicDataConfig(type){
                var dt = {
                    "type" : type
                }
                return encodeURIComponent(JSON.stringify(dt));
            }*/

			var filtros = [];
			var pdfexport;
			$(document).ready(function() {


 




				$('#datatable1').DataTable({
					paging: true,
					info:false,
                      
//					ordering: false,
					initComplete: function () {
						this.api().columns().every( function () {
							var column = this;
							if (column[0] != 11 && column[0] != 12) {
								var select = $('<br><select style="color:#000; width:90%;" class="select"><option value=""></option></select>')
								.appendTo( $(column.header()) )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val(),
										filtros.push($(this).val()));

									column.search( val ? '^'+val+'$' : '', true, false ).draw();
									var pdfexport = $('#data_table').html().trim();
									var cantidad = ($('#datatable1').rowCount());
									savedataPDf(pdfexport,cantidad);
									$('#conteo').html('Cantidad de seguimientos ' + $('#datatable1').rowCount());
								} );

								column.data().unique().sort().each( function ( d, j ) {
									select.append( '<option value="'+d+'">'+d+'</option>' )
									});
							}
					});
				},
				"order": [[ 1, "asc" ]],

              
				});

				if ( ! $('#datatable1').rowCount() ) {
					$('#conteo').html('0');
				}
				else
				{
					console.log($('#datatable1').rowCount());
					$('#conteo').html('Cantidad de seguimientos ' + $('#datatable1').rowCount());
				}
			});



			$(window).bind("load", function() {
			var pdfexport = $('#data_table').html().trim();
				var cantidad = ($('#datatable1').rowCount());
				//savedataPDf(pdfexport,cantidad);
			});

			$.fn.rowCount = function() {
				return $('tr', $(this).find('tbody')).length;
			};


			/*function savedataPDf(pdfexport,cantidad){
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
				});

				$.ajax({

					type: 'post',
					url: 'pdftodb',
					data: {
						'table' : pdfexport,
						'cantidad':cantidad,
					},
					success: function(data){
						// alert("Saved to db");
					}
				});
			}*/

		</script>

		@endsection()

@endsection()
