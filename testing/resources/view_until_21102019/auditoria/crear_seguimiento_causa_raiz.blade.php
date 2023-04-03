@extends('partials.card')

@extends('layout')

@section('title')
	Crear Seguimiento Cauza Raiz
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'seguimientoCausaRaiz.store', 'files'=>'true', )) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('crear_seguimientocausaraiz') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
							<input type="hidden" id="Codigo" name="Codigo">	
							{{ Form::select('IdAuditoria', $auditorias->prepend('none')->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'required' => '', 'id' => 'IdAuditoria']) }}
							{{ Form::label('IdAuditoria', 'Código Auditoria')}}
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="FechaSeguimiento" name="FechaSeguimiento" required>
										<label for="FechaSeguimiento">Fecha Seguimiento</label>
									</div>
									<span class="input-group-addon"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{-- {{ Form::select('IdAnotacion', $anotaciones->pluck('NoAnota', 'IdAnotacion'), null, ['class' => 'form-control', 'id' => 'IdAnotacion', 'required']) }} --}}
								<select id="IdAnotacion" name="IdAnotacion" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdAnotacion">No Anotación</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{-- {{ Form::select('IdCausaRaiz', $causasRaiz->pluck('IdCausaRaiz', 'IdCausaRaiz'), null, ['class' => 'form-control', 'id' => 'IdCausaRaiz']) }} --}}
								<select id="IdCausaRaiz" name="IdCausaRaiz" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdCausaRaiz">No Causa Raiz</label>
							</div>	
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<textarea class="form-control" id="AccionSeguimiento" name="AccionSeguimiento" rows="1" required> </textarea>
								<label for="AccionSeguimiento">Acción Seguimiento</label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<input type="number" class="form-control" id="Porcentaje" name="Porcentaje" required>
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
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Fortalezas" name="Fortalezas" rows="2" required> </textarea>
								<label for="Fortalezas">Fortalezas</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="Limitaciones" name="Limitaciones" rows="2" required> </textarea>
								<label for="Limitaciones">Limitaciones</label>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								{{-- <textarea class="form-control" id="Anexos" name="Anexos" rows="2" required> </textarea> --}}
								{{-- {{Form::file('file')}} --}}
								<label for="Anexos">Anexos</label>
								<div class="card-body no-padding">
									{{-- <div action="{{route('seguimientoCausaRaiz.store')}}" class="dropzone" id="my-awesome-dropzone">
										<div class="dz-message">
											<h3>Arrastra archivos aca o has click para subir.</h3>												
										</div>
										<div class="dropzone-previews"></div>
									</div> --}}
									<form action="{{route('seguimientoCausaRaiz.store')}}" class="dropzone">
									  <div class="fallback">
									    <input name="file" type="file" multiple />
									  </div>
									</form>
								</div><!--end .card-body -->
								
							</div>
						</div>
					</div>

					{{-- <div class="row">
						<div class="col-sm-12">
							<select class="form-control select2-list" data-placeholder="Select an item">
													<optgroup label="Alaskan/Hawaiian Time Zone">
														<option value="AK">Alaska</option>
														<option value="HI">Hawaii</option>
													</optgroup>
													<optgroup label="Pacific Time Zone">
														<option value="CA">California</option>
														<option value="NV">Nevada</option>
														<option value="OR">Oregon</option>
														<option value="WA">Washington</option>
													</optgroup>
													<optgroup label="Mountain Time Zone">
														<option value="AZ">Arizona</option>
														<option value="CO">Colorado</option>
														<option value="ID">Idaho</option>
														<option value="MT">Montana</option><option value="NE">Nebraska</option>
														<option value="NM">New Mexico</option>
														<option value="ND">North Dakota</option>
														<option value="UT">Utah</option>
														<option value="WY">Wyoming</option>
													</optgroup>
													<optgroup label="Central Time Zone">
														<option value="AL">Alabama</option>
														<option value="AR">Arkansas</option>
														<option value="IL">Illinois</option>
														<option value="IA">Iowa</option>
														<option value="KS">Kansas</option>
														<option value="KY">Kentucky</option>
														<option value="LA">Louisiana</option>
														<option value="MN">Minnesota</option>
														<option value="MS">Mississippi</option>
														<option value="MO">Missouri</option>
														<option value="OK">Oklahoma</option>
														<option value="SD">South Dakota</option>
														<option value="TX">Texas</option>
														<option value="TN">Tennessee</option>
														<option value="WI">Wisconsin</option>
													</optgroup>
													<optgroup label="Eastern Time Zone">
														<option value="CT">Connecticut</option>
														<option value="DE">Delaware</option>
														<option value="FL">Florida</option>
														<option value="GA">Georgia</option>
														<option value="IN">Indiana</option>
														<option value="ME">Maine</option>
														<option value="MD">Maryland</option>
														<option value="MA">Massachusetts</option>
														<option value="MI">Michigan</option>
														<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
														<option value="NY">New York</option>
														<option value="NC">North Carolina</option>
														<option value="OH">Ohio</option>
														<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
														<option value="VT">Vermont</option><option value="VA">Virginia</option>
														<option value="WV">West Virginia</option>
													</optgroup>
												</select>
												<label>Select with option filtering</label>
						</div>
					</div> --}}
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Auditor" name="Auditor" required readonly>
								<label id="lblAuditor" for="Auditor">Auditor</label>
							</div>
						</div>
					</div>
			</div>

			{{-- submit button --}}
			<br>
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("seguimientoCausaRaiz.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
		</script>
			
		<script type="text/javascript">

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
					$.get('auditor/'+ event.target.value + "", function(response, state){
						console.log(response);
						$('#Auditor').val(response[0].Nombres);
						$('#lblAuditor').css( "font-size", "12px" );
					});

					$.get('anotaciones/'+ event.target.value + "", function(response, state){
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
					$.get('causaraiz/'+ event.target.value + "", function(response, state){
						console.log(response);
						$('#IdCausaRaiz').append('<option value="" selected="selected"></option>');

						for(i=0; i<response.length; i++){
							$('#IdCausaRaiz').append('<option value="' + response[i].IdCausaRaiz + '">' +  response[i].CausaRaiz + '</option>');
						}
					});
				}
			});
		</script>

		<script>
	        Dropzone.options.myDropzone = {
	            autoProcessQueue: false,
	            uploadMultiple: true,
	            maxFilezise: 10,
	            maxFiles: 2,
	            
	            init: function() {
	                var submitBtn = document.querySelector("#submit");
	                myDropzone = this;
	                
	                submitBtn.addEventListener("click", function(e){
	                    e.preventDefault();
	                    e.stopPropagation();
	                    myDropzone.processQueue();
	                });
	                this.on("addedfile", function(file) {
	                    alert("file uploaded");
	                });
	                
	                this.on("complete", function(file) {
	                    myDropzone.removeFile(file);
	                });
	 
	                this.on("success", 
	                    myDropzone.processQueue.bind(myDropzone)
	                );
	            }
	        };
	    </script>
		@endsection()

	@endsection()

@endsection()