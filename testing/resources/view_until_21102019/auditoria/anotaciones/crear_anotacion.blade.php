@extends('partials.card')

@extends('layout')

@section('title')
Crear nueva Anotacion
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'anotacion.store')) !!}

{{ csrf_field()}}

@endsection

@section('card-title')
{{Breadcrumbs::render('crear_anotacion')}}
@endsection()

@section('card-content')

<div class="card-body floating-label">
	<p>Los campos marcados con * son obligatorios.</p>

	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				{{ Form::select('IdAuditoria', $auditorias->prepend('none')->pluck('Codigo', 'IdAuditoria'), null, ['class' => 'form-control', 'id' => 'IdAuditoria','required'=>'required']) }}
				<label for="Auditoria">Auditoria *</label>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				<input type="text" class="form-control" id="NoAnota" name="NoAnota" required readonly>
				<label id="lblNoAnota" for="NoAnota">No Anotación</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::select('IdTipoAnotacion', $tiposAnotacion->pluck('Anotacion', 'IdTipoAnotacion'), null, ['class' => 'form-control', 'id' => 'IdTipoAnotacion','required'=>'required']) }}
				<label for="Anotacion">Tipo*</label>
			</div>
		</div>
		
		
	</div>
	<div class="row">
		<div class="col-sm-3">
				
		</div>
		<div class="col-sm-3">
			
		</div>
		<div class="col-sm-6">
			
				<label id="lblTipoAnotacion" for="NoAnota" style="display: none;">Prueba</label>
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha" required >
						<label for="Fecha">Fecha *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>	
			</div>
		</div>
		<div class="col-sm-3">
			<div class="form-group">
				{{ Form::select('IdFuentesAnotacion', $fuentesAnotacion->pluck('Fuente', 'IdFuentesAnotacion'), null, ['class' => 'form-control', 'id' => 'IdFuentesAnotacion']) }}
				<label for="Fuente">Fuente</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" id="Antecedente" name="Antecedente" required>
				<label for="Antecedente">Antecedente *</label>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-sm-6">
			<input type="file">
			{{-- temporary --}}
		</div>
		
		<div class="col-sm-6">
			<div class="form-group">
				{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
				<select id="IdEnUnaAnotacion" name="IdEnUnaAnotacion" class="form-control" required="" aria-required="true">
					<option value="">&nbsp;</option>
					<option value="1">Nueva</option>
					<option value="2">Repetida</option>
					<option value="3">Adicionada</option>
				</select>
				<label for="IdEnUnaAnotacion">Es una anotacion: *</label>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<textarea class="form-control" id="DescripcionEvidencia" name="DescripcionEvidencia" rows="2" required> </textarea>
				<label for="DescripcionEvidencia">Descripcion y evidencia*</label>
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
		<div class="col-sm-4">
			<div class="form-group">
				{{ Form::select('IdProcesoInterno', $procesosInternos->pluck('Descripcion', 'IdProcesoInterno'), null, ['class' => 'form-control', 'id' => 'IdProcesoInterno']) }}
				<label for="IdProcesoInterno">Proceso</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" onKeyPress="return soloNumeros(event)" id="Plazo" name="Plazo" required>
				<label for="Plazo">Plazo *</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::select('IdProgramaCalidad', $programasCalidad->pluck('ProgramaCalidad', 'IdProgramaCalidad'), null, ['class' => 'form-control', 'id' => 'IdProgramaCalidad']) }}
				<label for="IdProgramaCalidad">Programa calidad afectado</label>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				<textarea class="form-control" id="Correccion" name="Correccion" rows="2" required> </textarea>
				<label for="Correccion">Correccion Inmediata *</label>
			</div>
		</div>

	</div>

	<div class="row">
		
		<div class="col-sm-2">
			<div class="form-group">
				{{ Form::select('IdCriticidadAnotacion', $criticidadesAnotacion->pluck('CriticidadAnotacion', 'IdCriticidadAnotacion'), null, ['class' => 'form-control', 'id' => 'IdCriticidadAnotacion','required'=>'required']) }}
				<label for="Fuente">Criticidad *</label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control" id="Referencia" name="Referencia" required readonly>
				{{-- <select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required="" aria-required="true">
				</select> --}}
				<label id="lblReferencia" for="Referencia">Referencia *</label>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" id="AuditoriaAnterior" name="AuditoriaAnterior" required>
				<label for="AuditoriaAnterior">Se reportó en una auditoria anterior? *</label>
			</div>	
		</div>

		

	</div>

	{{-- submit button --}}

	<div class="form-group">
		<div id="messages" style="color:darkred;">
			
		</div>
		<div class="row">
			<div class="col-sm-6">
				<button type="submit" style="" class="btn btn-info btn-block">Guardar</button>
			</div>
			<div class="col-sm-6">
				<button type="button" onclick="window.location='{{ route("anotacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}


<script src="{{URL::asset('js/soloNumeros.js')}}"></script>

<script>
	$('#IdAuditoria').change(function(event) {
		console.log(event.target.value);
		
		/*Genera consecutivo de Anotacion por auditoria*/
		$.get("consecutivo/" + event.target.value + "", function(response, state){
			
			var nexCode = '';
			var  codAuditoria = response[0].Codigo;
			var nextAnotacio =  parseInt(response[0].ContAnotaciones) + 1;

			switch(nextAnotacio.toString().length) {
				case 1:
				    nexCode = codAuditoria + '-NA000' + nextAnotacio;
				    break;
				case 2:
				     nexCode = codAuditoria + '-NA00' + nextAnotacio;
				    break;
				 case 3:
				     nexCode = codAuditoria + '-NA0' + nextAnotacio;
				    break;
				 case 4:
				    nexCode = codAuditoria + '-NA' + nextAnotacio;
				    break;
			}
			$('#NoAnota').val(nexCode);
			$('#lblNoAnota').css( "font-size", "12px" );
			
			/* Llena el campo de Referencia con el Marco Legal */
			var marcoLegal = response[0].MarcoLegal;
			$('#Referencia').val(marcoLegal);
			$('#lblReferencia').css( "font-size", "12px" );
		});
	});
	$("form input").on("invalid", function() {
		$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
	});
	$("form input").on("valid", function() {
			$('#messages').html('');
		});

	$('#IdTipoAnotacion').change(function(event) {
		var tipo = event.target.value;
		if (tipo != '')
		{
			$('#lblTipoAnotacion').show();
        	
			switch(tipo) {
			    case '1':
			        $('#lblTipoAnotacion').text('Se entiende por "No Conformidad Nivel 1", el titular del documento de Autorización deberá tomar medidas correctivas que satisfagan ');
			        break;
			    case '2':
			        $('#lblTipoAnotacion').text('Nivel 2');
			        break;
			   	case '3':
			        $('#lblTipoAnotacion').text('Nivel 3');
			        break;
			}

        	
        	
        }
        else
        {
        	$('#lblTipoAnotacion').hide();
        }
	});

	$('select').select2();
</script>

@endsection()

@endsection()

@endsection()