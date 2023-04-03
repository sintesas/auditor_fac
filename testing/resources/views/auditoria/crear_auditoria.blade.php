
@extends('partials.card')

@extends('layout')

@section('title')
	Crear Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'auditoria.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_auditoria')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Codigo" name="Codigo"  readonly required>	
								<label id="lblCodigo" for="codigo">Código</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
							
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
										<label for="FechaInicio">Fecha de Inicio</label>
									</div>
									<span class="input-group-addon"></span>
								</div>	
								
							</div>	
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa']) }}
								<label for="IdEmpresa">Organización</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdFuncionarioEmpresa">Responsable</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" required>
								<label id="lblCargoRespo" for="CargoRespo">Cargo responsable</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required>
								<label for="NombreAuditoria">Nombre Auditoria</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdPersonalInsp', $personal->pluck('Nombres' , 'IdPersonal'), null, ['class' => 'form-control', 'id' => 'IdPersonalInsp']) }}
								<label for="IdPersonalInsp">Inspector Lider</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<select id="Accion" name="Accion" class="form-control" required="" aria-required="true">
									<option value="" selected="selected"></option>
									<option value="Realizada">Realizada</option>
									<option value="Recibida">Recibida</option>
								</select>
								<label for="Accion">Accion</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">								
								<input type="text" class="form-control" id="Lugar" name="Lugar" required>
								<label for="Lugar">Lugar</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								{{ Form::select('IdTipoAuditoria', $tiposAuditoria->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['class' => 'form-control']) }}
								<label for="IdTipoAuditoria">Tipo Auditoria</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								{{ Form::select('IdPersonalAudi', $personal->pluck('Nombres' , 'IdPersonal'), null, ['class' => 'form-control', 'id' => 'IdPersonalAudi']) }}
								<label for="IdPersonalAudi">Auditor Lider</label>
							</div>
						</div>						
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="MarcoLegal" name="MarcoLegal" required>
								<label for="MarcoLegal">Marco Legal</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" id="Objeto" name="Objeto" rows="3" required> </textarea>
										<label for="Objeto">Objeto</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" required>
												<label for="FechaAperAudit">Fecha Apertura</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraInicio" name="HoraInicio" class="form-control" required aria-required="true">
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="14:30">14:30</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
										<label for="HoraInicio">Hora Inicio</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">										
												<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required>
												<label for="FechaTermino">Fecha Termino</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraTermi" name="HoraTermi" class="form-control" required aria-required="true">
											<option value="" selected="selected"></option>
											<option value="0:00">0:00</option>
											<option value="0:30">0:30</option>
											<option value="1:00">1:00</option>
											<option value="1:30">1:30</option>
											<option value="2:00">2:00</option>
											<option value="2:30">2:30</option>
											<option value="3:00">3:00</option>
											<option value="3:30">3:30</option>
											<option value="4:00">4:00</option>
											<option value="4:30">4:30</option>
											<option value="5:00">5:00</option>
											<option value="5:30">5:30</option>
											<option value="6:00">6:00</option>
											<option value="6:30">6:30</option>
											<option value="7:00">7:00</option>
											<option value="7:30">7:30</option>
											<option value="8:00">8:00</option>
											<option value="8:30">8:30</option>
											<option value="9:00">9:00</option>
											<option value="9:30">9:30</option>
											<option value="10:00">10:00</option>
											<option value="10:30">10:30</option>
											<option value="11:00">11:00</option>
											<option value="11:30">11:30</option>
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option>
											<option value="13:00">13:00</option>
											<option value="13:30">13:30</option>
											<option value="14:00">14:00</option>
											<option value="14:30">14:30</option>
											<option value="15:00">15:00</option>
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option>
											<option value="16:30">16:30</option>
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option>
											<option value="18:00">18:00</option>
											<option value="18:30">18:30</option>
											<option value="19:00">19:00</option>
											<option value="19:30">19:30</option>
											<option value="20:00">20:00</option>
											<option value="20:30">20:30</option>
											<option value="21:00">21:00</option>
											<option value="21:30">21:30</option>
											<option value="22:00">22:00</option>
											<option value="22:30">22:30</option>
											<option value="23:00">23:00</option>
											<option value="23:30">23:30</option>
										</select>
										<label for="HoraTermi">Hora Cierre</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Alcance" name="Alcance" rows="2" required> </textarea>
								<label for="Alcance">Alcance</label>
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<textarea class="form-control" id="EquipoInspector" name="EquipoInspector" rows="1" required> </textarea>
								<label for="EquipoInspector">Equipo Inspector</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control time-mask" id="ExpertosTecnicos" name="ExpertosTecnicos" required>
								<label for="ExpertosTecnicos">Expertos Técnicos</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" required> </textarea>
								<label for="Observaciones">Observaciones</label>
							</div>
						</div>
					</div>
			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("auditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
		</script>

		<script type="text/javascript">
			$('#IdEmpresa').change(function(event) {
				//Carga el consecutivo de Auditoria para la empresa
				$.get("consecutivo/" + event.target.value + "", function(response, state){
					
					//*** Falta traer el nuevo codigo
					var nexCode = '';
					var sigla = response[0].SiglasNombreClave;
					var actualcode = response[0].Codigo;

					if (actualcode == null)
					{
						nexCode = sigla + '0001';
					}
					else
					{						
						var code = actualcode.split(response[0].SiglasNombreClave);
						if (code.length == 1)
						{
							nexCode = sigla + '0001';
						}
						else
						{
							var numCode = parseInt(code[1].replace(",","").replace("-","")) + 1;
							switch(numCode.toString().length) {
								case 1:
								    nexCode = sigla + '000' + numCode;
								    break;
								case 2:
								     nexCode = sigla + '00' + numCode;
								    break;
								 case 3:
								     nexCode = sigla + '0' + numCode;
								    break;
								 case 4:
								    nexCode = sigla + numCode;
								    break;
							}
						}
					}
					
					$('#Codigo').val(nexCode);
					$('#CodigoV').val(nexCode);
					$('#lblCodigo').css( "font-size", "12px" );
				});


				//Carga el combo de funcionarios de la empresa
				$.get("funcionarios/" + event.target.value + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#CargoRespo').val('');
					$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
					}
				});
			});

			$('#IdFuncionarioEmpresa').change(function(event) {
				$('#CargoRespo').val('');
				if (event.target.value != "")
				{
					$.get('funcionario/'+ event.target.value + "", function(response, state){
						$('#CargoRespo').val(response[0].CargoFuncion);
						//$('#CargoRespo').focus();
						$('#lblCargoRespo').css( "font-size", "12px" );
					});
				}
			});


			// $('#IdFuncionarioEmpresa').change(event =>  {
			// 	$.get('funcionarios/${event.target.value}', function(response, state){
			// 		$('#IdFuncionarioEmpresa').empty();
			// 		$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

			// 		response.forEach(element => {
			// 			$('#IdFuncionarioEmpresa').append('<option value="${element.IdFuncionarioEmpresa}">${element.Nombres}</option>');
			// 		});
			// 	});
			// });
		</script>
		@endsection()

	@endsection()

@endsection()