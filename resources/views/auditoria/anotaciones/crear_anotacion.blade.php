@extends('partials.card')

@extends('layout')

@section('title')
Crear nueva Anotacion
@endsection()

@section('content')

@section('card-content')

@section('form-tag')

{!! Form::open(array('route' => 'anotacion.store', 'files' =>true)) !!}

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
				<label for="Auditoria">Inspección *</label>
			</div>
	     </div>
    
    <div class="col-sm-6">
			
			<div class="form-group">
				
				<input type="text"class="form-control" id="NombreInspeccion" disabled> 
				<label for="Auditoria" style="
    font-size: 13px;
"> Nombre Inspección </label>
				</div>
		
		</div>
              
		<div class="col-sm-3">
			
			<div class="form-group">
				
			<select id="lineaRoja" class="form-control">
<option value="">Seleccione</option>
<option value="1">Si</option>
<option value="1">No</option>
	</select>
				<label for="Auditoria" style="
    font-size: 13px;
"> Linea Roja </label>

				</div>
		
		</div>

		<div class="col-sm-6">
			<div class="form-group">
				{{ Form::select('IdTipoAnotacion', $tiposAnotacion->pluck('Anotacion', 'IdTipoAnotacion'), null, ['class' => 'form-control', 'id' => 'IdTipoAnotacion','required'=>'required']) }}
				<label for="Anotacion">Tipo  de hallazgo*</label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control" id="NoAnota" name="NoAnota" required readonly>
				<label id="lblNoAnota" for="NoAnota">Codificacion Del Hallazgo</label>
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
   <input  type="hidden"  id="codigoPr" value="">
	<div class="row" id="AnotacionRow">
		{{--<div class="col-sm-4">
			<div class="form-group">
				<select id="IdEnUnaAnotacion" name="IdEnUnaAnotacion" class="form-control">
					<option value="0">&nbsp;</option>
					<option value="1">Nueva</option>
					<option value="2">Repetida</option>
					<option value="3">Adicionada</option>
				</select>
				<label for="IdEnUnaAnotacion">Es una anotacion: *</label>
			</div>
		</div>--}}
		

		<div class="col-sm-4">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha" >
						<label for="Fecha">Fecha hallazgo *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>
		</div>



		{{--<div class="col-sm-4">
			<div class="form-group">
				{{ Form::select('IdFuentesAnotacion', $fuentesAnotacion->pluck('Fuente', 'IdFuentesAnotacion'), null, ['class' => 'form-control', 'id' => 'IdFuentesAnotacion']) }}
				<label for="Fuente">Fuente</label>
			</div>
		</div>--}}
	</div>


<div class="row">
<div class="col-sm-4">
			<div class="form-group">
				<select class="form-control"  id="Codigotema" name="codigoTema" required>
 				<option value="0">&nbsp;</option>
         @foreach ($codigoTema  as $codigoTema )
		 <option value={{$codigoTema->idcodigotema}}>{{$codigoTema->codigotema}}</option>	
		 @endforeach      
        
                </select>
				<label for="IdProcespInspección">Codigo tema *</label>
			</div>
		</div>

<div class="col-sm-4">
			<div class="form-group">
				<select class="form-control"  id="temacatalogacion" name="temacatalogacion" required>
 				<option value="">&nbsp;</option>
        
                </select>
				<label for="IdProcespInspección"> Tema catalogacion *</label>
			</div>
		</div>
</div>

	{{--<div class="row">
		<div class="col-sm-4" style="display:none;">
			<div class="form-group">
				{{ Form::select('IdClaseAnotacion', $clasesAnotaciones->pluck('Nombre', 'IdClaseAnotacion'), null, ['class' => 'form-control', 'id' => 'IdClaseAnotacion']) }}
				<label for="Clase">Clase connotación *</label>
			</div>
		</div>--}}
		{{--<div class="col-sm-4" style="display:none;">
			<div class="form-group">
				<select name="IdActividadPlanInspeccion" id="IdActividadPlanInspeccion" class="form-control"></select>
				<label for="IdActividadPlanInspeccion">Actividad plan inspección *</label>
			</div>
		</div>
	</div>--}}

	<div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				<select   name ="proceso"class="form-control"  id="IdCriterioInspección" required>
				<option value=""> </option>
           @foreach ($criterios as $criterios   )
			
		        
            <option value="{{$criterios->IdCriterio}}">{{$criterios->Norma}} </option>
                @endforeach
                  </select>
				<label for="IdCriterioInspección">Criterio que se Incumple * </label> 
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="IdProcesoInspección"  value="" readonly>
				<label for="IdProcespInspección">Proceso plan de inspección </label>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="IdSubProcesoInspección"  value="" readonly>
				<label for="IdSubProcesoInspección">Sub-Proceso plan de inspección </label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<textarea class="form-control" id="DescripcionEvidencia" name="DescripcionEvidencia" rows="2" required> </textarea>
				<label for="DescripcionEvidencia">Descripción del hallazgo*</label>
			</div>
		</div>
		<div class="col-sm-4"  style="display:none;">
			{{--<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Plazo" name="Plazo">
						<label for="Plazo">Plazo</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>--}}
		</div>

		<div class="col-sm-6" style="display:none;">
			{{--<div class="form-group">
				{{ Form::select('IdProgramaCalidad', $programasCalidad->pluck('ProgramaCalidad', 'IdProgramaCalidad'), null, ['class' => 'form-control', 'id' => 'IdProgramaCalidad']) }}
				<label for="IdProgramaCalidad">Programa calidad afectado</label>
			</div>--}}
		</div>

		<div class="col-sm-6" style="display:none;">
			<div class="form-group">
				<textarea class="form-control" id="Correccion" name="Correccion" rows="2"> </textarea>
				<label for="Correccion">Correccion Inmediata</label>
			</div>
		</div>

	</div>

	<div class="row">

		<div class="col-sm-2" style="display:none;">
			{{--<div class="form-group">
				{{ Form::select('IdCriticidadAnotacion', $criticidadesAnotacion->pluck('CriticidadAnotacion', 'IdCriticidadAnotacion'), null, ['class' => 'form-control', 'id' => 'IdCriticidadAnotacion']) }}
				<label for="Fuente">Criticidad *</label>
			</div>--}}
		</div>

		<div class="col-sm-10">
			<div class="form-group">
				<input type="text" class="form-control" id="AuditoriaAnterior" name="AuditoriaAnterior" required>
				<label for="AuditoriaAnterior">Se reportó en una auditoria anterior? *</label>
			</div>
		</div>
	</div>
	<br>
	<div class="row" style="border-style: solid;border-width: 1px;">
		<div class="col-sm-6">
			<label for="tipoDoc" >Documentos</label>
			<div class="form-group">
				{!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group" id="archivoVisual">
				<a href="" ></a>
			</div>
		</div>
	</div>
	<br>
	<div class="row" id="responsableCorreccionRow">
		<div class="col-sm-12">
		<label for="IdDependenciaResponsableCorreccion" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable corrección *</label>
			<div class="form-group" >
				{{ Form::select('IdDependencia', $dependencias, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableCorreccion', 'name' => 'IdDependenciaResponsableCorreccion[]']) }}
			</div>
		</div>
	</div>

	<div class="row" id="Responsable-plan">
		<div class="col-sm-12">
		<label for="IdDependenciaResponsableMejoramiento" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable del plan de mejoramiento *</label>
			<div class="form-group" >
				{{ Form::select('IdDependencia', $dependencias, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableMejoramiento', 'name' => 'IdDependenciaResponsableMejoramiento[]', 'required']) }}
			</div>
		</div>
	</div>


	<div class="row" id="Responsable-orden" style="display:none">
		<div class="col-sm-12">
		<label for="IdDependenciaResponsableMejoramiento" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable orden *</label>
			<div class="form-group">
				{{ Form::select('IdDependencia', $dependencias, null, ['onchange' => "", 'multiple' => 'multiple','class' => 'form-control', 'id' => 'IdDependenciaResponsableMejoramiento', 'name' => 'IdDependenciaResponsableMejoramiento[]', 'required']) }}
			</div>
		</div>
	</div>

	
	<div class="row">
		<div class="col-sm-12" style="display:none;">
			<label for="IdResponsableAprobacion" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Responsable de la aprobación *</label>
			<div class="form-group" >
				{{ Form::select('IdUserLDAP', $personalLDAP, null, ['onchange' => "", 'class' => 'form-control',  'name' => 'IdResponsableAprobacion', 'id' => 'IdResponsableAprobacion', ]) }}
			</div>
		</div>
	</div>

	<input type="hidden" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">
	<br>
	<br>

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
	$(document).ready(function(){
		$('select').select2();
;
		$('#IdResponsableAprobacion').select2({
			placeholder: "",
			minimumInputLength: 3,
			allowClear: true
		});
	});

	$('#inputFile').on("change", function(e)
	{
		$('#archivoVisual').empty();
		for(var i=0; i< this.files.length; i++){
			$('#archivoVisual').append(
				"<a>"+e.target.files[i].name+"</a><br>"
			);
		}
	});

	//Generar consecutivo Nota
	$('#IdAuditoria').change(function(event) {
		 //console.log(event.target.value);

 let id=event.target.value;

		MostrarNombre(id);
		$('#IdActividadPlanInspeccion').val(null).trigger('change');
		$('#IdCriterioInspección').val(null).trigger('change');
		$('#IdProcesoInspección').val(null).trigger('change');
		$('#IdSubProcesoInspección').val(null).trigger('change');
		$('#IdTipoAnotacion').val(null).trigger('change');

		/*Genera consecutivo de Anotacion por auditoria*/
		$.get("consecutivo/" + event.target.value + "", function(response, state){
       console.log('consecutivo')
			var nexCode = '';
			var  codAuditoria = response[0].Codigo;
   console.log('codigo auditorail',codAuditoria);
			var nextAnotacio =  parseInt(response[0].ContAnotaciones) + 1;
      console.log('net anitacion',nextAnotacio);
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

			//$('#NoAnota').val(nexCode);
           $("#codigoPr").val(nexCode)
			$('#lblNoAnota').css( "font-size", "12px" );
		});
		/**Obtener las actividades de Inpección según la auditoria seleccionada */
		
	});

	//Buscar criterios asociado a la actividad
	$('#IdCriterioInspección').change(function(event){
let url='{{ url('') }}'
  console.log(url);		

$.get( url+"/criteriosAuditoria/"+event.target.value, function(response,state){

	
if(response.Proceso){
			 
				$('#IdProcesoInspección').val(response.Proceso);
				$('#IdSubProcesoInspección').val(response.SubProceso);
			}else{
				$('#IdCriterioInspección').val('');
				$('#IdProcesoInspección').val('');
				$('#IdSubProcesoInspección').val('');
			}
		});
	});

	//Mensajes de errores
	$("form input").on("invalid", function() {
		$('#messages').html('Todos los campos marcados con * deben ser diligenciados');
	});
	$("form input").on("valid", function() {
		$('#messages').html('');
	});

	//Tipo
	$('#IdTipoAnotacion').change(function(event) {
		var tipo = event.target.value;
		var noNota = $('#NoAnota').val();
      //console.log('cambio')
		if (tipo != '')
		{   console.log(tipo);
			switch(tipo) {
				case '1'://No Conformidad
						cambiarCodigo('AR', noNota);
						$('#responsableCorreccionRow').hide();
						$("#Responsable-plan").hide();
				break;
				case '2'://Oprtunidades de mejora
						cambiarCodigo('I', noNota);
						$('#responsableCorreccionRow').show();
						$("#Responsable-plan").show();
			    break;
				case '3'://Ordenes
				  		cambiarCodigo('IR', noNota);
						$('#responsableCorreccionRow').show();
						$("#Responsable-plan").show();
                     
 
				break;
				case '5': //Recomendaciones
						cambiarCodigo('IV', noNota);
						$('#responsableCorreccionRow').show();
						$("#Responsable-plan").hide();
					break;
				case '6': // Requerimiento = RQ
					cambiarCodigo('R', noNota);
					$('#responsableCorreccionRow').hide();
					$("#Responsable-plan").show();
				break;
                case '1005': // Requerimiento = RQ
					cambiarCodigo('O', noNota);
                    console.log('casenota',noNota)
					$('#responsableCorreccionRow').hide();
					$("#Responsable-plan").hide();
   $("#Responsable-orden").show();
				break;			
}
        }
        else
        {
        	$('#lblTipoAnotacion').hide();
        }
	});

	function cambiarCodigo(sigla, noNota) {
  //console.log('cosigo sin  replace', $("#codigoPr").val())

  console.log('sigl',sigla);
let sinre=$("#codigoPr").val();
let nuevo = sinre.replace("NA", sigla);
 console.log('numero de  nota',nuevo);
$('#NoAnota').val('');
$('#NoAnota').val(nuevo);

/*posDash=noNota.lastIndexOf("-")

     console.log('nota',noNota);
		if(posDash>=0){
			p1=noNota.substr(0,posDash);
			p2=noNota.substr(posDash+3,noNota.length)
			nuevo = sigla+p2
    
 // document.getElementById("NoAnota").value='';
  //document.getElementById("NoAnota").value=nuevo;
$('#NoAnota').val('');
$('#NoAnota').val(nuevo);
     //console.log('nuevo',nuevo)
            

			
		} else{
const str =noNota;
const newStr = str.slice(1)
console.log(newStr)
$('#NoAnota').val('');
$('#NoAnota').val(sigla+newStr);
//document.getElementById("NoAnota").value='';
  //document.getElementById("NoAnota").value= sigla+newStr;

;
}*/


	}

	//Buscar subprocesos asociados
	$('#IdCriterioProceso').change(function(event) {

		$('#IdSubProceso').val(null).trigger('change');

		var textoSearch = $('option:selected', $(this)).text();

		$.get("subProcesosAuditoria/" + textoSearch + "", function(response, state){

			$('#IdSubProceso').empty();
			$('#IdSubProceso').append('<option value="" selected="selected"></option>');

			for(i=0; i<response.length; i++){
				$('#IdSubProceso').append('<option value="'+response[i].IdCriterio+'">'+response[i].SubProceso+'</option>');
			}
		});
	});


$('#Codigotema').change(function(event){
let url='{{ url('') }}'
 

$.getJSON( url+"/Temacatalogacion/"+event.target.value, function(response,state){

 $("#temacatalogacion").empty();
 $("#temacatalogacion").html("");
$("#temacatalogacion").html("<option value="+response.idtemacatalogacion+">"+response.temacatalogacion+"</option>")
	

	});
});


/*const selectElement = document.querySelector('#Codigotema');

selectElement.addEventListener('change', (event) => {
  console.log('aaaa');  
//let url={{url('')}};
  //console.log(url);
});*/




const MostrarNombre = async (id) => {
	//const Nombreinspeccion = document.getElementById("NombreInspeccion");
  let url='{{ url('') }}'
  //console.log(url);
        try {
          const fetchData = await fetch(
            url+`/nombreAnotacion/${id}`,
          );
          const result = await fetchData.json();
		  console.log(result.NombreAuditoria);
		  
		  
		  if (document.getElementById("NombreInspeccion").value==''){

			$("#NombreInspeccion").val(result.NombreAuditoria);
		  }else{
			document.getElementById("NombreInspeccion").value = ""
            $("#NombreInspeccion").val(result.NombreAuditoria);
            
		  } 
		  
        } catch (err) {
          console.log(err);
        }
      };


</script>

@endsection()

@endsection()

@endsection()
