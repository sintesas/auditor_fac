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
						<div class="col-sm-2">
							<div class="form-group">
								<input type="hidden" id="Codigo" name="Codigo">	
							{{ Form::select('IdAuditoria', $auditorias->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'required' => 'required', 'id' => 'IdAuditoria']) }}
							{{ Form::label('IdAuditoria', 'Código Auditoria*')}}
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="FechaSeguimiento" name="FechaSeguimiento" required value="{{old('FechaSeguimiento', $seguimientoCausaRaiz->FechaSeguimiento)}}">
										<label for="FechaSeguimiento">Fecha Seguimiento *</label>
									</div>
									<span class="input-group-addon"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdAnotacion', $anotaciones->pluck('NoAnota', 'IdAnotacion'), null, ['class' => 'form-control', 'id' => 'IdAnotacion', 'required']) }}
								{{-- <select id="IdAnotacion" name="IdAnotacion" class="form-control" required="required" aria-required="true"> --}}
									
								{{-- </select> --}}
								<label for="IdAnotacion">No Anotación *</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdCausaRaiz', $causasRaiz->pluck('CausaRaiz','IdCausaRaiz'), null, ['class' => 'form-control', 'id' => 'IdCausaRaiz','required']) }}
								{{-- <select id="IdCausaRaiz" name="IdCausaRaiz" class="form-control" required="required" aria-required="true"> --}}
									
								{{-- </select> --}}
								<label for="IdCausaRaiz">No Causa Raiz *</label>
								<span style="color:red" id="errorIdCausaRaiz"></span>
							</div>	
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<textarea class="form-control" id="AccionSeguimiento" name="AccionSeguimiento" rows="1" required>{{old('AccionSeguimiento', $seguimientoCausaRaiz->AccionSeguimiento)}}</textarea>
								<label for="AccionSeguimiento">Acción Seguimiento</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="number" class="form-control" id="Porcentaje" name="Porcentaje" required value="{{old('Porcentaje', $seguimientoCausaRaiz->Porcentaje)}}">
								<label for="Porcentaje">Porcentaje</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								{{ Form::select('IdEstadoSeguimiento', $estadosSeguimiento->pluck('NombreEstado', 'IdEstadoSeguimiento'), null, ['class' => 'form-control', 'id' => 'IdEstadoSeguimiento', 'required']) }}
								<label for="IdEstadoSeguimiento">Estado</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Fortalezas" name="Fortalezas" rows="2" required>{{old('Fortalezas', $seguimientoCausaRaiz->Fortalezas)}}</textarea>
								<label for="Fortalezas">Fortalezas</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Limitaciones" name="Limitaciones" rows="2" required>{{old('Limitaciones', $seguimientoCausaRaiz->Limitaciones)}}</textarea>
								<label for="Limitaciones">Limitaciones</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<textarea class="form-control" id="Anexos" name="Anexos" rows="2" required>{{old('Anexos', $seguimientoCausaRaiz->Anexos)}}</textarea>
								<label for="Anexos">Anexos</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Auditor" name="Auditor" required readonly value="{{old('Auditor', $seguimientoCausaRaiz->Auditor)}}">
								<label for="IdPersonalAudi">Auditor</label>
							</div>
						</div>
					</div>
			</div>

			{{-- submit button --}}
			<br>
			<div class="form-group">
				<div id="messages"></div>
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block" onclick="validate()">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>


			{{-- SCRIPTS --}}
			<script type="text/javascript">
				$('select').select2();
				$("form input").on("invalid", function() {
					alert('invaldi');
					$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
				});
				$("form input").on("valid", function() {
						$('#messages').html('');
					});
			</script>
			<script type="text/javascript">

				function validate()
				{
					if($('#IdCausaRaiz').val() == '')
						$('#errorIdCausaRaiz').text('Este campo es obligatorio.');
					else
						$('#errorIdCausaRaiz').text('');

					
				}	

				// $(window).bind("load", function() {
				//    var idAuditoria = $( "#IdAuditoria option:selected" ).val();
				//     console.log(idAuditoria);
				//     getAnotaciones(idAuditoria);
				// });
				
				// function getAnotaciones(idAuditoria){
				// 	if (idAuditoria != "")
				// 	{
				// 		$.get('../anotaciones/'+ idAuditoria + "", function(response, state){
				// 			console.log(response);
							
				// 			$('#IdAnotacion').append('<option value="" selected="selected"></option>');

				// 			for(i=0; i<response.length; i++){
				// 				$('#IdAnotacion').append('<option value="' + response[i].IdAnotacion + '">' +  response[i].NoAnota + '</option>');
				// 			}
				// 		});
				// 	}
				// }
				// COMBO AUDITORIA
				// * Carga Auditor de la auditoria
				// * Carga Anotaciones de la auditoria
				$('#IdAuditoria').change(function(event) {
					$('#Auditor').val('');
					$('#IdAnotacion').empty();
					$('#Codigo').val($( "#IdAuditoria option:selected" ).text());

					console.log(event.target.value);
					if (event.target.value != "")
					{
						$.get('../auditor/'+ event.target.value + "", function(response, state){
							console.log(response);
							$('#Auditor').val(response[0].Nombres);
							$('#lblAuditor').css( "font-size", "12px" );
						});

						$.get('../anotaciones/'+ event.target.value + "", function(response, state){
							console.log(response);
							
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
					console.log(event.target.value);
					if (event.target.value != "")
					{
						$.get('../causaraiz/'+ event.target.value + "", function(response, state){
							console.log(response);
							$('#IdCausaRaiz').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdCausaRaiz').append('<option value="' + response[i].IdCausaRaiz + '">' +  response[i].IdCausaRaiz + '</option>');
							}
						});
					}
				});
			</script>
		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()