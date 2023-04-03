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
							{{ Form::label('IdAuditoria', 'Inspección')}}
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
					</div>

<div class="row">
<div class="col-sm-6">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha-efectividad" >
						<label for="Fecha">Fecha Concepto Efectividad *</label>
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

<option value="{{$conceptoefectividad->IdEstadoSeguimiento}}">{{$conceptoefectividad->NombreEstado }} </option>		 	
	
@endforeach
</select>			
	<label for="Auditoria" style="
    font-size: 13px;
"> Concepto de Efectividad </label>
  </div>
		</div>
</div>
					<div class="row">
						
						<div class="col-sm-4">
							<div class="form-group">
								{{-- {{ Form::select('IdAnotacion', $anotaciones->pluck('NoAnota', 'IdAnotacion'), null, ['class' => 'form-control', 'id' => 'IdAnotacion', 'required']) }} --}}
								<select id="IdAnotacion" name="IdAnotacion" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdAnotacion">Codificación hallazgo *</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<select id="IdCausaRaiz" name="IdCausaRaiz" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdCausaRaiz">Causa del Incumplimiento *</label>
							</div>	
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<select id="IdTareaCausa" name="IdTareaCausa" class="form-control" required="" aria-required="true">
									
								</select>
								<label for="IdTareaCausa">Actividad/Descripción *</label>
							</div>	
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="AccionSeguimiento" name="AccionSeguimiento" rows="1" required> </textarea>
								<label for="AccionSeguimiento">Seguimiento</label>
							</div>
						</div>
					</div>

<div class="row">
   <div class="col-sm-4">
			<div class="form-group">
				<div class="input-group date" id="demo-date-format">
					<div class="input-group-content">
						<input type="text" class="form-control" id="Fecha" name="Fecha" >
						<label for="Fecha">Fecha de seguimiento *</label>
					</div>
					<span class="input-group-addon"></span>
				</div>
			</div>
		</div>


<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="Codigotema" name="codigoTema" readonly>
 				
        
                
				<label for="IdProcespInspección">Codigo tema</label>
			</div>
	</div>

<div class="col-sm-4">
			<div class="form-group">
				<input type="text" class="form-control"  id="temacatalogacion" name="temacatalogacion" readonly>
 						<label for="IdProcespInspección"> Tema catalogacion </label>
			</div>
		</div>
</div>

					<br>
					<div class="row" style="border-style: solid;border-width: 1px;">
						<div class="col-sm-6">
							<label for="tipoDoc" >Anexos</label>
							<div class="form-group">
								{!! Form::file('docs[]', array('class' => 'form-control', 'id' => 'inputFile', 'multiple' => 'multiple', 'accept' => ".jpg, .jpeg, .png, .pdf, .doc, .docx, .xls, .xlsx")) !!}
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" id="archivoVisual">
								<a href=""></a>
							</div>
						</div>
					</div>
					<br>
					
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="Auditor" name="Auditor" required readonly>
								<label id="lblAuditor" for="Auditor">Responsable Seguimiento</label>
							</div>
						</div>

 	<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="porcentaje" name="porcentaje">
								<label id="lblAuditor" for="Auditor">Avance Fisico de Ejecución * </label>
							</div>
						</div>
					</div>
			</div>

			{{-- submit button --}}
			<br>
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Crear y Enviar a aprobación</button>
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

			$('#inputFile').on("change", function(e)
			{ 
				$('#archivoVisual').empty();
				for(var i=0; i< this.files.length; i++){
					$('#archivoVisual').append(
						"<a>"+e.target.files[i].name+"</a><br>"
					);
				}
			});

			// COMBO AUDITORIA
			// * Carga Auditor de la auditoria
			// * Carga Anotaciones de la auditoria
			$('#IdAuditoria').change(function(event) {
              
 let id=event.target.value;   
             MostrarNombre(id);
				$('#Auditor').val('');
				$('#IdAnotacion').empty();
				$('#Codigo').val($( "#IdAuditoria option:selected" ).text());

				if (event.target.value != "")
				{
					$.get('auditor/'+ event.target.value + "", function(response, state){
						if(response != ''){
							if(response[0].EstadoInsertOrganizacion == 'usuarioEmpresa'){
								$('#Auditor').val(response[0].Nombres);
							}else{
								$('#Auditor').val(response[0].Name);
							}
							$('#lblAuditor').css( "font-size", "12px" );
						}else{
							$('#Auditor').val('N/A');
						}
					});
				}
				$.get('anotaciones/'+ event.target.value + "", function(response, state){
					$('#IdAnotacion').append('<option value="" selected="selected"></option>');

					for(i=0; i<response.length; i++){
						$('#IdAnotacion').append('<option value="' + response[i].IdAnotacion + '">' +  response[i].NoAnota + '</option>');
					}
				});
			});

			// COMBO ANOTACIONES
			// * Carga Auditor de la auditoria
			$('#IdAnotacion').change(function(event) {
               
				$('#IdCausaRaiz').empty();
				if (event.target.value != "")
				{   let  id=event.target.value;
                    catalogacion(id)
					$.get('causaraiz/'+ event.target.value + "", function(response, state){
						$('#IdCausaRaiz').append('<option value="" selected="selected"></option>');

						for(i=0; i<response.length; i++){
							$('#IdCausaRaiz').append('<option value="' + response[i].IdCausaRaiz + '">' +  response[i].CausaRaiz + '</option>');
						}
					});
				}
			});
    function catalogacion (id){
let url='{{ url('') }}'
 

$.getJSON( url+"/TemacatalogacionR/"+id, function(response,state){
if(response!=''){
  

	$("#temacatalogacion").val(response[0].temacatalogacion)
     $("#Codigotema").val(response[0].codigotema)
}
 

	});
}
			// COMBO ACCION TAREAS
			$('#IdCausaRaiz').change(function(event){
				$('#IdTareaCausa').empty();
				if (event.target.value != "")
				{
					$.get('tareascausaraiz/'+ event.target.value + "", function(response, state){
						$('#IdTareaCausa').append('<option value="" selected="selected"></option>');

						for(i=0; i<response.length; i++){
							$('#IdTareaCausa').append('<option value="' + response[i].IdTarea + '">' +  response[i].AccionTarea + '</option>');
						}
					});
				}
			});

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
jQuery("#porcentaje").on('input', function (evt) {
		// Allow only numbers.
		jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
 if(jQuery(this).val()>100){
 jQuery(this).val('')
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