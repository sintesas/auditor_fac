@extends('partials.card')

@extends('layout')

@section('title')
	Editar Auditoria
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		{!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

		{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_auditoria')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Codigo" name="Codigo" required readonly value="{{old('Codigo', $auditoria->Codigo)}}">
							<label id="lblCodigo" for="codigo">Código</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required value="{{old('FechaInicio', $auditoria->FechaInicio)}}">
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
							{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
							<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required="" aria-required="true">
								
							</select>
							<label for="IdFuncionarioEmpresa">Responsable</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" required readonly value="{{old('CargoRespo', $auditoria->CargoRespo)}}">
							<label id="lblCargoRespo" for="CargoRespo">Cargo responsable</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required value="{{old('NombreAuditoria', $auditoria->NombreAuditoria)}}">
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
								<option value=""></option>
								<option value="Realizada" {{ old('Accion', $auditoria->Accion) == 'Realizada' ? 'selected' : '' }}>Realizada</option>
								<option value="Recibida" {{ old('Accion', $auditoria->Accion) == 'Recibida' ? 'selected' : '' }}>Recibida</option>
							</select>
							<label for="Centro">Accion</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">								
							<input type="text" class="form-control" id="Lugar" name="Lugar" required value="{{old('Lugar', $auditoria->Lugar)}}">
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
							<input type="text" class="form-control" id="MarcoLegal" name="MarcoLegal" required value="{{old('MarcoLegal', $auditoria->MarcoLegal)}}">
							<label for="MarcoLegal">Marco Legal</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="Objeto" name="Objeto" rows="3" required>{{old('Objeto', $auditoria->Objeto)}}</textarea>
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
											<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" required value="{{old('FechaAperAudit', $auditoria->FechaAperAudit)}}">
											<label for="FechaAperAudit">Fecha Apertura</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<select id="HoraIni" name="HoraIni" class="form-control" required aria-required="true">
										<option value="" selected="selected"></option>
										<option value="0:00" {{ old('HoraIni', $auditoria->HoraIni) == '0:00' ? 'selected' : '' }}>0:00</option>
										<option value="0:30" {{ old('HoraIni', $auditoria->HoraIni) == '0:30' ? 'selected' : '' }}>0:30</option>
										<option value="1:00" {{ old('HoraIni', $auditoria->HoraIni) == '1:00' ? 'selected' : '' }}>1:00</option>
										<option value="1:30" {{ old('HoraIni', $auditoria->HoraIni) == '1:30' ? 'selected' : '' }}>1:30</option>
										<option value="2:00" {{ old('HoraIni', $auditoria->HoraIni) == '2:00' ? 'selected' : '' }}>2:00</option>
										<option value="2:30" {{ old('HoraIni', $auditoria->HoraIni) == '2:30' ? 'selected' : '' }}>2:30</option>
										<option value="3:00" {{ old('HoraIni', $auditoria->HoraIni) == '3:00' ? 'selected' : '' }}>3:00</option>
										<option value="3:30" {{ old('HoraIni', $auditoria->HoraIni) == '3:30' ? 'selected' : '' }}>3:30</option>
										<option value="4:00" {{ old('HoraIni', $auditoria->HoraIni) == '4:00' ? 'selected' : '' }}>4:00</option>
										<option value="4:30" {{ old('HoraIni', $auditoria->HoraIni) == '4:30' ? 'selected' : '' }}>4:30</option>
										<option value="5:00" {{ old('HoraIni', $auditoria->HoraIni) == '5:00' ? 'selected' : '' }}>5:00</option>
										<option value="5:30" {{ old('HoraIni', $auditoria->HoraIni) == '5:30' ? 'selected' : '' }}>5:30</option>
										<option value="6:00" {{ old('HoraIni', $auditoria->HoraIni) == '6:00' ? 'selected' : '' }}>6:00</option>
										<option value="6:30" {{ old('HoraIni', $auditoria->HoraIni) == '6:30' ? 'selected' : '' }}>6:30</option>
										<option value="7:00" {{ old('HoraIni', $auditoria->HoraIni) == '7:00' ? 'selected' : '' }}>7:00</option>
										<option value="7:30" {{ old('HoraIni', $auditoria->HoraIni) == '7:30' ? 'selected' : '' }}>7:30</option>
										<option value="8:00" {{ old('HoraIni', $auditoria->HoraIni) == '8:00' ? 'selected' : '' }}>8:00</option>
										<option value="8:30" {{ old('HoraIni', $auditoria->HoraIni) == '8:30' ? 'selected' : '' }}>8:30</option>
										<option value="9:00" {{ old('HoraIni', $auditoria->HoraIni) == '9:00' ? 'selected' : '' }}>9:00</option>
										<option value="9:30" {{ old('HoraIni', $auditoria->HoraIni) == '9:30' ? 'selected' : '' }}>9:30</option>
										<option value="10:00" {{ old('HoraIni', $auditoria->HoraIni) == '10:00' ? 'selected' : '' }}>10:00</option>
										<option value="10:30" {{ old('HoraIni', $auditoria->HoraIni) == '10:30' ? 'selected' : '' }}>10:30</option>
										<option value="11:00" {{ old('HoraIni', $auditoria->HoraIni) == '11:00' ? 'selected' : '' }}>11:00</option>
										<option value="11:30" {{ old('HoraIni', $auditoria->HoraIni) == '11:30' ? 'selected' : '' }}>11:30</option>
										<option value="12:00" {{ old('HoraIni', $auditoria->HoraIni) == '12:00' ? 'selected' : '' }}>12:00</option>
										<option value="12:30" {{ old('HoraIni', $auditoria->HoraIni) == '12:30' ? 'selected' : '' }}>12:30</option>
										<option value="13:00" {{ old('HoraIni', $auditoria->HoraIni) == '13:00' ? 'selected' : '' }}>13:00</option>
										<option value="13:30" {{ old('HoraIni', $auditoria->HoraIni) == '13:30' ? 'selected' : '' }}>13:30</option>
										<option value="14:00" {{ old('HoraIni', $auditoria->HoraIni) == '14:00' ? 'selected' : '' }}>14:00</option>
										<option value="14:30" {{ old('HoraIni', $auditoria->HoraIni) == '14:30' ? 'selected' : '' }}>14:30</option>
										<option value="15:00" {{ old('HoraIni', $auditoria->HoraIni) == '15:00' ? 'selected' : '' }}>15:00</option>
										<option value="15:30" {{ old('HoraIni', $auditoria->HoraIni) == '15:30' ? 'selected' : '' }}>15:30</option>
										<option value="16:00" {{ old('HoraIni', $auditoria->HoraIni) == '16:00' ? 'selected' : '' }}>16:00</option>
										<option value="16:30" {{ old('HoraIni', $auditoria->HoraIni) == '16:30' ? 'selected' : '' }}>16:30</option>
										<option value="17:00" {{ old('HoraIni', $auditoria->HoraIni) == '17:00' ? 'selected' : '' }}>17:00</option>
										<option value="17:30" {{ old('HoraIni', $auditoria->HoraIni) == '17:30' ? 'selected' : '' }}>17:30</option>
										<option value="18:00" {{ old('HoraIni', $auditoria->HoraIni) == '18:00' ? 'selected' : '' }}>18:00</option>
										<option value="18:30" {{ old('HoraIni', $auditoria->HoraIni) == '18:30' ? 'selected' : '' }}>18:30</option>
										<option value="19:00" {{ old('HoraIni', $auditoria->HoraIni) == '19:00' ? 'selected' : '' }}>19:00</option>
										<option value="19:30" {{ old('HoraIni', $auditoria->HoraIni) == '19:30' ? 'selected' : '' }}>19:30</option>
										<option value="20:00" {{ old('HoraIni', $auditoria->HoraIni) == '20:00' ? 'selected' : '' }}>20:00</option>
										<option value="20:30" {{ old('HoraIni', $auditoria->HoraIni) == '20:30' ? 'selected' : '' }}>20:30</option>
										<option value="21:00" {{ old('HoraIni', $auditoria->HoraIni) == '21:00' ? 'selected' : '' }}>21:00</option>
										<option value="21:30" {{ old('HoraIni', $auditoria->HoraIni) == '21:30' ? 'selected' : '' }}>21:30</option>
										<option value="22:00" {{ old('HoraIni', $auditoria->HoraIni) == '22:00' ? 'selected' : '' }}>22:00</option>
										<option value="22:30" {{ old('HoraIni', $auditoria->HoraIni) == '22:30' ? 'selected' : '' }}>22:30</option>
										<option value="23:00" {{ old('HoraIni', $auditoria->HoraIni) == '23:00' ? 'selected' : '' }}>23:00</option>
										<option value="23:30" {{ old('HoraIni', $auditoria->HoraIni) == '23:30' ? 'selected' : '' }}>23:30</option>
									</select>
									<label for="HoraIni">Hora Inicio</label>
									<p class="help-block">Time: 24h</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">										
											<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required value="{{old('FechaTermino', $auditoria->FechaTermino)}}">
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
										<option value="0:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '0:00' ? 'selected' : '' }}>0:00</option>
										<option value="0:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '0:30' ? 'selected' : '' }}>0:30</option>
										<option value="1:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '1:00' ? 'selected' : '' }}>1:00</option>
										<option value="1:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '1:30' ? 'selected' : '' }}>1:30</option>
										<option value="2:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '2:00' ? 'selected' : '' }}>2:00</option>
										<option value="2:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '2:30' ? 'selected' : '' }}>2:30</option>
										<option value="3:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '3:00' ? 'selected' : '' }}>3:00</option>
										<option value="3:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '3:30' ? 'selected' : '' }}>3:30</option>
										<option value="4:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '4:00' ? 'selected' : '' }}>4:00</option>
										<option value="4:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '4:30' ? 'selected' : '' }}>4:30</option>
										<option value="5:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '5:00' ? 'selected' : '' }}>5:00</option>
										<option value="5:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '5:30' ? 'selected' : '' }}>5:30</option>
										<option value="6:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '6:00' ? 'selected' : '' }}>6:00</option>
										<option value="6:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '6:30' ? 'selected' : '' }}>6:30</option>
										<option value="7:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '7:00' ? 'selected' : '' }}>7:00</option>
										<option value="7:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '7:30' ? 'selected' : '' }}>7:30</option>
										<option value="8:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '8:00' ? 'selected' : '' }}>8:00</option>
										<option value="8:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '8:30' ? 'selected' : '' }}>8:30</option>
										<option value="9:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '9:00' ? 'selected' : '' }}>9:00</option>
										<option value="9:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '9:30' ? 'selected' : '' }}>9:30</option>
										<option value="10:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '10:00' ? 'selected' : '' }}>10:00</option>
										<option value="10:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '10:30' ? 'selected' : '' }}>10:30</option>
										<option value="11:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '11:00' ? 'selected' : '' }}>11:00</option>
										<option value="11:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '11:30' ? 'selected' : '' }}>11:30</option>
										<option value="12:00" {{ old('HoraIni', $auditoria->HoraIni) == '12:00' ? 'selected' : '' }}>12:00</option>
										<option value="12:30" {{ old('HoraIni', $auditoria->HoraIni) == '12:30' ? 'selected' : '' }}>12:30</option>
										<option value="13:00" {{ old('HoraIni', $auditoria->HoraIni) == '13:00' ? 'selected' : '' }}>13:00</option>
										<option value="13:30" {{ old('HoraIni', $auditoria->HoraIni) == '13:30' ? 'selected' : '' }}>13:30</option>
										<option value="14:00" {{ old('HoraIni', $auditoria->HoraIni) == '14:00' ? 'selected' : '' }}>14:00</option>
										<option value="14:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '14:30' ? 'selected' : '' }}>14:30</option>
										<option value="15:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '15:00' ? 'selected' : '' }}>15:00</option>
										<option value="15:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '15:30' ? 'selected' : '' }}>15:30</option>
										<option value="16:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '16:00' ? 'selected' : '' }}>16:00</option>
										<option value="16:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '16:30' ? 'selected' : '' }}>16:30</option>
										<option value="17:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '17:00' ? 'selected' : '' }}>17:00</option>
										<option value="17:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '17:30' ? 'selected' : '' }}>17:30</option>
										<option value="18:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '18:00' ? 'selected' : '' }}>18:00</option>
										<option value="18:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '18:30' ? 'selected' : '' }}>18:30</option>
										<option value="19:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '19:00' ? 'selected' : '' }}>19:00</option>
										<option value="19:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '19:30' ? 'selected' : '' }}>19:30</option>
										<option value="20:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '20:00' ? 'selected' : '' }}>20:00</option>
										<option value="20:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '20:30' ? 'selected' : '' }}>20:30</option>
										<option value="21:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '21:00' ? 'selected' : '' }}>21:00</option>
										<option value="21:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '21:30' ? 'selected' : '' }}>21:30</option>
										<option value="22:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '22:00' ? 'selected' : '' }}>22:00</option>
										<option value="22:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '22:30' ? 'selected' : '' }}>22:30</option>
										<option value="23:00" {{ old('HoraTermi', $auditoria->HoraTermi) == '23:00' ? 'selected' : '' }}>23:00</option>
										<option value="23:30" {{ old('HoraTermi', $auditoria->HoraTermi) == '23:30' ? 'selected' : '' }}>23:30</option>
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
							<textarea class="form-control" id="Alcance" name="Alcance" rows="2" required>{{old('Alcance', $auditoria->Alcance)}}</textarea>
							<label for="Alcance">Alcance</label>
						</div>
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="EquipoInspector" name="EquipoInspector" rows="1" required>{{old('EquipoInspector', $auditoria->EquipoInspector)}}</textarea>
							<label for="EquipoInspector">Equipo Inspector</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control time-mask" id="ExpertosTecnicos" name="ExpertosTecnicos" required value="{{old('ExpertosTecnicos', $auditoria->ExpertosTecnicos)}}">
							<label for="ExpertosTecnicos">Expertos Técnicos</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" required>{{old('Observaciones', $auditoria->Observaciones)}}</textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>
				<input type="hidden" value="{{$auditoria->IdFuncionarioEmpresa}}" id="IdFuncionarioEmpresaUpta" name="IdFuncionarioEmpresaUpta">
			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("auditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		

		<script type="text/javascript">
			$(document).ready(function(){
				var idEmpresa = $('#IdEmpresa').val();
				var idFuncionario = $('#IdFuncionarioEmpresaUpta').val();

				//Carga el combo de funcionarios de la empresa

				$.get("../funcionarios/" + idEmpresa + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#CargoRespo').val('');
					$('#IdFuncionarioEmpresa').append('<option value=""></option>');
					for(i=0; i<response.length; i++){
						if (response[i].IdFuncionarioEmpresa.toString() == idFuncionario.toString()){
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdFuncionarioEmpresa + '" selected>' +  response[i].Nombres + '</option>');
						}
						else
						{
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
						}
					}

					$('#IdFuncionarioEmpresa').trigger('change.select2');
				});

			});


			$('#IdFuncionarioEmpresa').change(function(event) {
				$('#CargoRespo').val('');
				if (event.target.value != "")
				{
					$.get('../funcionario/'+ event.target.value + "", function(response, state){
						$('#CargoRespo').val(response[0].CargoFuncion);
						//$('#CargoRespo').focus();
						$('#lblCargoRespo').css( "font-size", "12px" );
					});
				}
			});
			
		</script>
		<script type="text/javascript">
			$('select').select2();
		</script>
		@endsection()

	@endsection()

@endsection()