@extends('partials.card')

@extends('layout')

@section('title')
Editar Anotación
@endsection()

	@section('content')

		@section('card-content')

			@section('form-tag')

				{!! Form::model($anotacion, ['route' => ['anotacion.update', $anotacion->IdAnotacion], 'method' => 'PUT' ]) !!}

				{{ csrf_field()}}

		@endsection



		@section('card-title')
			{{Breadcrumbs::render('editar_anotacion')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			<p>Los campos marcados con * son obligatorios.</p>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						{{Form::select('IdAuditoria', $auditorias->pluck('Codigo', 'IdAuditoria'), old('value'), ['class' => 'form-control', 'id' => 'IdAuditoria']) }}
						<label for="Auditoria">Auditoria *</label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<input type="text" class="form-control" id="NoAnota" name="NoAnota" required readonly value="{{old('NoAnota', $anotacion->NoAnota)}}">
						<label id="lblNoAnota" for="NoAnota">No Anotación</label>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						{{ Form::select('IdTipoAnotacion', $tiposAnotacion->pluck('Anotacion', 'IdTipoAnotacion'), null, ['class' => 'form-control', 'id' => 'IdTipoAnotacion']) }}
						<label for="Anotacion">Tipo *</label>
					</div>
				</div>
			</div>



			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<div class="input-group date" id="demo-date-format">
							<div class="input-group-content">
								<input type="text" class="form-control" id="Fecha" name="Fecha" required value="{{old('Fecha', $anotacion->Fecha)}}" >
								<label for="Fecha">Fecha *</label>
							</div>
							<span class="input-group-addon"></span>
						</div>	
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						{{ Form::select('IdFuentesAnotacion', $fuentesAnotacion->pluck('Fuente', 'IdFuentesAnotacion'), old('value'), ['class' => 'form-control', 'id' => 'IdFuentesAnotacion','required']) }}
						<label for="Fuente">Fuente *</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<input type="text" class="form-control" id="Antecedente" name="Antecedente" required value="{{old('Antecedente', $anotacion->Antecedente)}}">
						<label for="Antecedente">Antecedente *</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<input type="file">
				</div>
				
				<div class="col-sm-6">
					{!! Form::select('IdEnUnaAnotacion', [
		               '1' => 'Nueva',
		               '2' => 'Repetida',
		               '3' => 'Adicionada',
					], old('value'), [ 'class' =>  'form-control']) !!}
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="DescripcionEvidencia" name="DescripcionEvidencia" rows="2" required >{{old('DescripcionEvidencia', $anotacion->DescripcionEvidencia)}}  </textarea>
						<label for="DescripcionEvidencia">Descripcion y evidencia *</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<select id="Clase" name="Clase" class="form-control" required="" aria-required="true">
							<option value="">&nbsp;</option>
							<option value="1">Real</option>
							<option value="2">Potencial</option>
						</select>
						<label for="Clase">Clase *</label>
					</div>
				</div>
				{{-- PENDING TO ADD auditor = IdPersonalAudi --}}
				{{-- <div class="col-sm-3">
					<div class="form-group">
						<select id="IdPersonalAudi" name="IdPersonalAudi" class="form-control" required="" aria-required="true">
							<option value="">&nbsp;</option>
							<option value="1">German Gomez</option>
							<option value="2">Alberto Franco</option>
						</select>
						<label for="IdPersonalAudi">Auditor</label>
					</div>
				</div> --}}
				{{-- PENDING TO ADD responsable = IdPersonalResponsa --}}
				{{-- <div class="col-sm-3">
					<div class="form-group">
						<select id="IdPersonalResponsa" name="IdPersonalResponsa" class="form-control" required="" aria-required="true">
							<option value="">&nbsp;</option>
							<option value="1">Responsable1</option>
							<option value="2">Responsable2</option>
						</select>
						<label for="IdPersonalResponsa">Responsable</label>
					</div>
				</div> --}}
				<div class="col-sm-5">
					<div class="form-group">
						{{ Form::select('IdProcesoInterno', $procesosInternos->pluck('Descripcion', 'IdProcesoInterno'), old('value'), ['class' => 'form-control', 'id' => 'IdProcesoInterno','required']) }}
						<label for="IdProcesoInterno">Proceso *</label>
					</div>
				</div>

				<div class="col-sm-5">
					<div class="form-group">
						<input type="text" class="form-control" id="Plazo" name="Plazo" required>
						<label for="Plazo">Plazo *</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						{{ Form::select('IdProgramaCalidad', $programasCalidad->pluck('ProgramaCalidad', 'IdProgramaCalidad'), old('value'), ['class' => 'form-control', 'id' => 'IdProgramaCalidad','required']) }}
						<label for="IdProgramaCalidad">Programa calidad afectado*</label>
					</div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-sm-2">
					<div class="form-group">
						{{ Form::select('IdCriticidadAnotacion', $criticidadesAnotacion->pluck('CriticidadAnotacion', 'IdCriticidadAnotacion'), old('value'), ['class' => 'form-control', 'id' => 'IdCriticidadAnotacion']) }}
						<label for="Fuente">Criticidad</label>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<input type="text" class="form-control" id="Referencia" name="Referencia" required value="{{old('Referencia', $anotacion->Referencia)}}">
						<label for="Referencia">Referencia *</label>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<textarea class="form-control" id="Correccion" name="Correccion" rows="2" required>{{old('Correccion', $anotacion->Correccion)}}</textarea>
						<label for="Correccion">Correccion Inmediata *</label>
					</div>
				</div>
			</div>

			{{-- submit button --}}

			<div class="form-group">
				<div id="messages" style="color:darkred;">
			
				</div>
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("anotacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>


		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
		</script>

		<script>
			$("form input").on("invalid", function() {
				$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
			});
			$("form input").on("valid", function() {
				$('#messages').html('');
			});
		</script>

		@endsection()

	@endsection()

@endsection()
