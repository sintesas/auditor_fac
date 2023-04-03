@extends('partials.card')

@extends('layout')

@section('title')
	Editar Seguimiento Cauza Raiz
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($seguimientoCausaRaiz, ['route' => ['seguimientoCausaRaiz.update', $seguimientoCausaRaiz->IdSeguimiento], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('editar_seguimientocausaraiz') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<p>Los campos marcados con * son obligatorios.</p>
				

<div class="row">

					<div class="col-md-12">
						<div class="form-group">
							<!-- Resumen -->
							<div>
								<strong style="font-weight: bold;">Actividad:</strong>&nbsp;&nbsp;&nbsp;{{$descSeguimiento[0]->AccionTarea}}
							</div>
							<div>
								<strong style="font-weight: bold;">Entregable:</strong>&nbsp;&nbsp;&nbsp;{{$descSeguimiento[0]->Entregable}}
							</div>
							<div>
								<strong style="font-weight: bold;">Fecha Inicio:</strong>&nbsp;&nbsp;&nbsp;{{$descSeguimiento[0]->FechaInicio}}&nbsp;&nbsp;&nbsp;
								<strong style="font-weight: bold;">Fecha Final:</strong>&nbsp;&nbsp;&nbsp;{{$descSeguimiento[0]->FechaFinal}}
							</div>
							<div>
								<strong style="font-weight: bold;">Responsable:</strong>&nbsp;&nbsp;&nbsp;{{$descSeguimiento[0]->Name}}
							</div>
							<div>
								<strong style="font-weight: bold;">Hallazgo:</strong>&nbsp;&nbsp;{{$descSeguimiento[0]->DescripcionEvidencia}}
							</div>
							<div>
								<strong style="font-weight: bold;">Auditoría código:</strong>&nbsp;&nbsp;{{$descSeguimiento[0]->codigoAuditoria}}&nbsp;&nbsp;
								<strong style="font-weight: bold;">Número de anotación:</strong>&nbsp;&nbsp; {{$descSeguimiento[0]->NoAnota}}
							</div>

							<!-- Datos a Guardar -->
							<input type="hidden"  value="{{$descSeguimiento[0]->IdAuditoria}}">
							<input type="hidden"  value="{{$descSeguimiento[0]->codigoAuditoria}}">
							<input type="hidden"  value="{{$descSeguimiento[0]->IdAnotacion}}">
							<input type="hidden"  value="{{$descSeguimiento[0]->IdCausaRaiz}}">
							<input type="hidden"  value="{{$descSeguimiento[0]->IdTarea}}">
							<input type="hidden"  value="{{$descSeguimiento[0]->Name}}">
						</div>
					</div>
				</div>
<div class="row">
 <div class="col-sm-6">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha-efectividad" value="{{$seguimiento->FechaConcepto}}" >
						<label for="Fecha">Fecha Concepto Efectividad *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
		  </div>
</div>
  <div class="col-sm-4">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha" value="{{$seguimiento->FechaSeguimiento}}">
						<label for="Fecha">Fecha de seguimiento *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>
		</div>
<div class="col-sm-6">
			<div class="form-group">


			<select class="form-control" name ="ConceptoEfectividad" id="coneceptoefectividad"  required> 
    
<option value=""> Seleccione</option>
@foreach ( $conceptoefectividad as $conceptoefectividad)

@if($seguimiento->IdEstadoSeguimiento== $conceptoefectividad->IdEstadoSeguimiento)
<option value="{{$conceptoefectividad->IdEstadoSeguimiento}}" selected>{{$conceptoefectividad->NombreEstado }} </option>		 	
@else
	<option value="{{$conceptoefectividad->IdEstadoSeguimiento}}">{{$conceptoefectividad->NombreEstado }} </option>		 	
@endif
@endforeach
</select>			
	<label for="Auditoria" style="
    font-size: 13px;
"> Concepto de Efectividad </label>
  </div>
		</div>
<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="porcentaje" name="porcentaje" value="{{$seguimiento->Porcentaje}}">
								<label id="lblAuditor" for="Auditor">Avance Fisico de Ejecución * </label>
							</div>
						</div>
					</div>
</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="AccionSeguimiento" name="AccionSeguimiento" rows="1" required>{{old('AccionSeguimiento', $seguimientoCausaRaiz->AccionSeguimiento)}}</textarea>
								<label for="AccionSeguimiento">Seguimiento</label>
							</div>
						</div>
					</div>

					<div class="row">
						{{--<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Fortalezas" name="Fortalezas" rows="2" required>{{old('Fortalezas', $seguimientoCausaRaiz->Fortalezas)}}</textarea>
								<label for="Fortalezas">Fortalezas</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Limitaciones" name="Limitaciones" rows="2" required>{{old('Limitaciones', $seguimientoCausaRaiz->Limitaciones)}}</textarea>
								<label for="Limitaciones">Limitaciones</label>
							</div>
						</div>--}}
					</div>

					<br>
					<label for="tipoDoc" >Anexos</label>
					<div class="row" style="border-style: solid;border-width: 1px;">
						<div class="col-sm-6">
							
							<div class="form-group" id="archivoVisual">
							@foreach($fileSeguimeinto as $file)
								<a href="../../{{$file->PathDoc}}" target="_blank">{{$file->FileNameDoc}}</a><br>
							@endforeach
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							Ver Historicos
						</button><br>
							<div class="collapse" id="collapseExample">
								<div class="card card-body">
									<div class="row">
										<div class="table-responsive" style="margin:20px">
											<table id="datatable1" class="table table-striped table-hover">
												<thead>
													<tr>
														<th>Código Auditoria</th>
														<th>Código Anotación</th>
														<th>Causa Raiz</th>
														<th>Actividad</th>
														<th>Acciones Mejora</th>
														<th>Porcentaje</th>
														<th>Mensaje</th>
														<th>Estado</th>
														<th>Fecha Seguimiento</th>
													</tr>
												</thead>

												<tbody class="input_fields_wrap">
													@foreach($seguimientosHistoricos as $itemHistorico)
													<tr>
														<td>{{$itemHistorico->Codigo}}</td>
														<td>{{$itemHistorico->NoAnota}}</td>
														<td>{{$itemHistorico->CausaRaiz}}</td>
														<td>{{$itemHistorico->AccionTarea}}</td>
														<td>{{$itemHistorico->AccionSeguimiento}}</td>
														<td>{{$itemHistorico->Porcentaje}}</td>
														<td>{{$itemHistorico->Mensaje}}</td>
														<td>{{$itemHistorico->NombreEstado}}</td>
														<td>{{$itemHistorico->FechaSeguimiento}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>

			{{-- submit button --}}
			<br>
			<div class="form-group">
				<div id="messages"></div>
				<div class="row">
					@if ($seguimiento->IdEstadoSeguimiento == 1 || $seguimiento->IdEstadoSeguimiento == 4)
				
						
								<div class="col-sm-6">
									<button type="submit" style="" class="btn btn-info btn-block" onclick="validate()">Actualizar</button>
								</div>
					
					@endif
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
				</div>
			</div>


			{{-- SCRIPTS --}}
			<script type="text/javascript">
				$("form input").on("invalid", function() {
					$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
				});
				$("form input").on("valid", function() {
					$('#messages').html('');
				});
			</script>
			<script type="text/javascript">

				$( document ).ready(function(){
					$('select').select2();
					$('#Codigo').val($( "#IdAuditoria option:selected" ).text());
				});

				function validate()
				{
					if($('#IdCausaRaiz').val() == '')
						$('#errorIdCausaRaiz').text('Este campo es obligatorio.');
					else
						$('#errorIdCausaRaiz').text('');

					
				}	

				// COMBO AUDITORIA
				// * Carga Auditor de la auditoria
				// * Carga Anotaciones de la auditoria
				$('#IdAuditoria').change(function(event) {
					$('#Auditor').val('');
					$('#IdAnotacion').empty();
					$('#IdCausaRaiz').empty();
					$('#Codigo').val($( "#IdAuditoria option:selected" ).text());
					if (event.target.value != "")
					{
						$.get('../auditor/'+ event.target.value + "", function(response, state){
							$('#Auditor').val(response[0].Nombres);
							$('#lblAuditor').css( "font-size", "12px" );
						});

						$.get('../anotaciones/'+ event.target.value + "", function(response, state){		
							$('#IdAnotacion').append('<option value="" selected="selected"></option>');
							for(i=0; i<response.length; i++){
								$('#IdAnotacion').append('<option value="' + response[i].IdAnotacion + '">' +  response[i].NoAnota + '</option>');
							}
						});
					}
				});

				// COMBO ANOTACIONES
				// * Carga Auditor de la auditoria
				$('#IdAnotacion').change(function(event) {
					$('#IdCausaRaiz').empty();
					if (event.target.value != "")
					{
						$.get('../causaraiz/'+ event.target.value + "", function(response, state){
							$('#IdCausaRaiz').append('<option value="" selected="selected"></option>');
							for(i=0; i<response.length; i++){
								$('#IdCausaRaiz').append('<option value="' + response[i].IdCausaRaiz + '">' +  response[i].CausaRaiz + '</option>');
							}
						});
					}
				});

				// COMBO ACCION TAREAS
				$('#IdCausaRaiz').change(function(event){
					$('#IdTareaCausa').empty();
					if (event.target.value != "")
					{
						$.get('../tareascausaraiz/'+ event.target.value + "", function(response, state){
							$('#IdTareaCausa').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdTareaCausa').append('<option value="' + response[i].IdTarea + '">' +  response[i].AccionTarea + '</option>');
							}
						});
					}
				});

jQuery("#porcentaje").on('input', function (evt) {
		// Allow only numbers.
		jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
 if(jQuery(this).val()>100){
 jQuery(this).val('')
     } 
	});
			</script>
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()