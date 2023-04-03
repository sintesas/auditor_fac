
@extends('partials.card')

@extends('layout')

@section('title')
	Crear Inspección
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'auditoria.store', 'data-parsley-validate' => 'parsley', 'id' => 'form-auditoria')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('crear_auditoria')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label ">

					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required>
								<label class="required" for="NombreAuditoria">Nombre inspección</label>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
										<label for="FechaInicio" class="required">Fecha de Inicio</label>
									</div>
									<span class="input-group-addon"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="text" class="form-control" id="Codigo" name="Codigo" readonly>
								<label class="required" id="lblCodigo" for="codigo">Código</label>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<!-- {{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresa', 'name' => 'IdEmpresa', 'required' ]) }} -->
								<select class="form-control" name="IdEmpresa" id="IdEmpresa" required>
									@foreach ($empresas as $emp)
									<option value="{{ $emp->IdEmpresa }}">{{ $emp->NombreEmpresa }}</option>
									@endforeach
								</select>
								<label class="required" for="IdEmpresa">UMA2</label>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								{{ Form::select('IdEmpresaAudita', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresaAudita', 'name' => 'IdEmpresaAudita',]) }}
								<label for="IdEmpresaAudita">Dependencia</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">								
								<textarea class="form-control" id="Aspecto" name="Aspecto" rows="4" > </textarea>
								<label for="Aspecto">Aspecto a inspeccionar</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required aria-required="true">

								</select>
								<label class="required" for="IdFuncionarioEmpresa">Responsable</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" >
								<label id="lblCargoRespo" for="CargoRespo">Cargo</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group" >
   							
<select class="form-control" id="IdPersonalInspectorLider" name="IdPersonalInspectorLider">


                                @foreach ($funcionarios as  $funcionarios )
								<option value="{{$funcionarios->IdUserLDAP}}">{{$funcionarios->Name}} </option> 	
								@endforeach
								</select>
								<label for="IdPersonalInspectorLider" >Inspector General/Jefe Oficina Regional Inspección y Control</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group" >
								<select id="IdPersonalAuditorLider" name="IdPersonalAuditorLider" class="form-control" aria-required="true" required>
								 @foreach ($funcionarios2 as  $funcionarios2 )
								<option value="{{$funcionarios2->IdUserLDAP}}">{{$funcionarios2->Name}} </option> 	
								@endforeach
</select>
								<label class="required" for="IdPersonalAuditorLider" >Inspector Lider</label>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="col-sm-12">	
						<div class="form-group">
						<textarea class="form-control" id="Objeto" name="Objeto" rows="4" > </textarea>
							<label for="Objeto">Objetivo de la inspección</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="Alcance" name="Alcance" rows="3" > </textarea>
							<label for="Alcance">Alcance de la inspección</label>
						</div>
					</div>
				</div>

				<div class="row">
					<label style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">CRITERIO DE LA INSPECCIÓN</label>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">En forma general</label>
						<button style="font-size:13px; color:#3f4c5a; margin-left:10px; padding:3px" type="button" id="btnFGeneral">Agregar</button>
					</div>
				</div>

				<div id="GeneralContainer">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="ConsecutivoGeneral" name="ConsecutivoGeneral[]" required>
								<label class="required">Consecutivo</label>
							</div>
						</div>
						<div class="col-sm-8" id="IdCriterioGeneralDiv">
							<div class="form-group">
								<select id="IdCriterioGeneral" name="IdCriterioGeneral[]" class="form-control"  required>
									@foreach($criterios as $key => $value)
										<option value="{{$key}}">{{$value}}</option>
									@endforeach()
								</select>
								<label>Criterio</label>
							</div>  
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<label style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">En forma particular</label>
						<button style="font-size:13px; color:#3f4c5a; margin-left:10px; padding:3px" type="button" id="btnFParticular">Agregar</button>
					</div>
				</div>

				<div id="ParticularContainer">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="text" class="form-control" id="ConsecutivoParticular" name="ConsecutivoParticular[]" required>
								<label class="required">Consecutivo</label>
							</div>
						</div>
						<div class="col-sm-8" id="IdCriterioParticularDiv">
							<div class="form-group">
								<select id="IdCriterioParticular" name="IdCriterioParticular[]" class="form-control"  required>
									@foreach($criterios as $key => $value)
										<option value="{{$key}}">{{$value}}</option>
									@endforeach()
								</select>
								<label>Criterio</label>
							</div>  
						</div>

                    <div class="col-sm-4" id="IdCriterioParticularDivP">
							<div class="form-group">
								<select id="IdCriterioParticular" name="procesos" class="form-control" onChange="Procesos(this)"  required>
									@foreach($procesos as $value)
										<option value="{{$value->IdProceso}}">{{$value->Proceso .'-'}} {{' '.$value->SubProceso}}</option>
									@endforeach()
								</select>
								<label>Proceso-Subproceso</label>
							</div>  
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdTipoAuditoria', $tiposAuditoria->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['id'=>'IdTipoAuditoria','class' => 'form-control' , 'require' => 'require']) }}
							<label for="IdTipoAuditoria">Tipo inspección</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label for="IdEquipoInpectorOption" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Equipo Inspector</label>
						<div class="form-group">
							<button style="font-size:13px; color:#3f4c5a; margin-left:10px; padding:3px" type="button" id="btnFequipoI">Agregar</button>
						</div>
					</div>

				</div>
<div id="containerEquipoinspector">

           <div  class="row">
              <div class="col-sm-4"  id="procesosInspector">
							<div class="form-group">
								<select   name="procesos" class="form-control"  required>
									@foreach($procesos as $value)
										<option value="{{$value->IdProceso}}">{{$value->Proceso.'-'}}{{' '.$value->SubProceso}}</option>
									@endforeach()
								</select>
								<label>Proceso - Subproceso</label>
							</div>  
	     </div>		
	<div class="col-sm-6" id="gradoN" >
							<div class="form-group" >
   							
                         <select  class="form-control" name="IdPersonalInspectorLider">


                                @foreach ($grado as  $grado )
								<option value="{{$grado->IdUserLDAP}}">{{$grado->Name}} </option> 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" >Grado nombre</label>
							</div>
						</div>		
	</div>
</div>
 <div  id="containerTecnicos">
				<div class="row">
					<div class="col-sm-12">
						<label for="EquipoInspector" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Expertos Técnicos</label>
							<div class="form-group">
							<button style="font-size:13px; color:#3f4c5a; margin-left:10px; padding:3px" type="button" id="btnFequipo2">Agregar</button>
						</div>
					</div>
				</div>

 </div>
<div id="containerEquipoinspector2">

           <div  class="row">
              <div class="col-sm-4"  id="procesosInspector2">
							<div class="form-group">
								<select   name="procesos" class="form-control"  required>
									@foreach($procesos as $value)
										<option value="{{$value->IdProceso}}">{{$value->Proceso.' '}}{{' '.$value->SubProceso}}</option>
									@endforeach()
								</select>
								<label>Proceso - Subproceso</label>
							</div>  
	     </div>		
	<div class="col-sm-6" id="gradoN2" >
							<div class="form-group" >
   							
                         <select  class="form-control" name="IdPersonalInspectorLider">


                                @foreach ($grado2 as  $grado2 )
								<option value="{{$grado2->IdUserLDAP}}">{{$grado->Name}} </option> 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" >Grado nombre</label>
							</div>
						</div>		
	</div>
</div>

				<div class="row">
					<div class="col-sm-12">
						<label for="IdCriterios" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Observador</label>
						<div class="form-group" >
                         <select class="form-control"  id="observador" name="IdCriterios[]" multiple> 
      <option value=""> </option>     
     
                           @foreach ($usuarios as  $claves  )
 					 
<option value="{{$claves->IdUserLDAP }}"> {{$claves->Name }}</option>	
							 @endforeach
						 </select>
							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" require>
												<label for="FechaAperAudit">Fecha Inicio</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraInicio" name="HoraInicio" class="form-control" required aria-required="true" >
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
										<label class="required" for="HoraInicio">Hora Inicio</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" require>
												<label for="FechaTermino">Fecha Cierre</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraTermi" name="HoraTermi" class="form-control" required aria-required="true" require>
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
										<label class="required" for="HoraTermi">Hora Cierre</label>
										<p class="help-block">Time: 24h</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="form-control" id="Observaciones" name="Observaciones" rows="2" > </textarea>
								<label for="Observaciones">Observaciones</label>
							</div>
						</div>
					</div>
					<input type="hidden" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">
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
			$(document).ready(function(){
				$('select').select2();
               
				$('#IdPersonalAuditorLider, #IdPersonalInspectorLider, #IdEquipoInpectorOption, #IdFuncionarioEmpresa').select2({
					placeholder: "",
					minimumInputLength: 3,
					allowClear: true
				});
			});
             let contar=0;
        //btnFequipoI

$(document).on('click', '#btnFequipoI', function(){ 
               contar ++   
              $("select").select2('destroy'); 

				var wrapper = $("#containerEquipoinspector");
				var selectCode = document.getElementById("procesosInspector").outerHTML;
     var  select =document.getElementById("gradoN").outerHTML;
      //console.log('uno',selectCode);
       //console.log('dos',select);

				var divText = '<div class="row"> "'+selectCode+' '+select+' </div>';
				$(wrapper).append(divText);
                	$('select').select2();

  
               //console.log(contar);
			});

$(document).on('click', '#btnFequipo2', function(){ 
               contar ++   
              $("select").select2('destroy'); 
				var wrapper = $("#containerEquipoinspector2");
				var selectCode = document.getElementById("procesosInspector2").outerHTML;
     var  select =document.getElementById("gradoN2").outerHTML;
      //console.log('uno',selectCode);
       //console.log('dos',select);

				var divText = '<div class="row"> "'+selectCode+' '+select+' </div>';
				$(wrapper).append(divText);
                	$('select').select2();
               //console.log(contar);

			});
			$(document).on('click', '#btnFGeneral', function(){ 
               contar ++   
              $("select").select2('destroy'); 
				var wrapper = $("#GeneralContainer");
				var selectCode = document.getElementById("IdCriterioGeneralDiv").outerHTML;
				var divText = '<div class="row"><div class="col-sm-4"><div class="form-group"><input type="text" class="form-control" id="ConsecutivoGeneral" name="ConsecutivoGeneral[]" required><label class="required">Consecutivo</label></div></div>'+selectCode+'</div>';
				$(wrapper).append(divText);
                	$('select').select2();
               console.log(contar);
			});

			$(document).on('click', '#btnFParticular', function(){ 
               $("select").select2('destroy'); 
				var wrapper = $("#ParticularContainer");
				var selectCode = document.getElementById("IdCriterioParticularDiv").outerHTML;
         var selectCode2 = document.getElementById("IdCriterioParticularDivP").outerHTML;
				var divText = '<div class="row"><div class="col-sm-4"><div class="form-group"><input type="text" class="form-control" id="ConsecutivoParticular" name="ConsecutivoParticular[]" required><label class="required">Consecutivo</label></div></div>'+selectCode+selectCode2+' </div>';
				$(wrapper).append(divText);
            $('select').select2();
			});

			$('button[type=submit]').on('click', function(){

				console.log('cpcacpña');

				if($('input[required=""]').val()== '' || $('select[required=""]').val()== ''){
					alert('Debe llenar todos los campos obligatorios señalados con asterisco de color rojo *');
				}
			})

			// Campo UMA
			// $('#IdEmpresa').change(function(event) {

			// 	// Verifique si selecciona trae el valor
			// 	console.log('Id Empresa', event.target.value);
			// 	//$('#IdFuncionarioEmpresa').val(null).trigger('change');

			// 	//Carga el consecutivo de Auditoria para la empresa
			// 	$.get("consecutivo/" + event.target.value + "", function(response, state){

			// 		//*** Falta traer el nuevo codigo
			// 		var nexCode = '';
			// 		var sigla = response[0].SiglasNombreClave;
			// 		var actualcode = response[0].Codigo;
			// 		var tipoOrganizacion = response[0].TipoOrganizacion;
            //         var SiglaT=response[0].siglatipo

			// 		if (actualcode == null)
			// 		{
			// 			nexCode = sigla + '0001';
			// 		}
			// 		else
			// 		{
			// 			var code = actualcode.split(response[0].SiglasNombreClave);
			// 			if (code.length == 1)
			// 			{
			// 				nexCode = sigla + '0001';
			// 			}
			// 			else
			// 			{
			// 				var numCode = parseInt(code[1].replace(",","").replace("-","")) + 1;
			// 				switch(numCode.toString().length) {
			// 					case 1:
			// 					    nexCode = sigla + '000' + numCode;
			// 					    break;
			// 					case 2:
			// 					     nexCode = sigla + '00' + numCode;
			// 					    break;
			// 					 case 3:
			// 					     nexCode = sigla + '0' + numCode;
			// 					    break;
			// 					 case 4:
			// 					    nexCode = sigla + numCode;
			// 					    break;
			// 				}
			// 			}
			// 		}

			// 		$('#Codigo').val(nexCode);
			// 		$('#CodigoV').val(nexCode);
			// 		$('#lblCodigo').css( "font-size", "12px" );
			// 	});


			// 	//Carga el combo de funcionarios de la empresa
			// 	$.get("funcionariosLDAP/" + event.target.value + "", function(response, state){
			// 		$('#IdFuncionarioEmpresa').empty();
			// 		$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

			// 		for(i=0; i<response.length; i++){
			// 			$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
			// 		}
			// 	});
			// });

			$('#IdEmpresa').on('change', function (e) {
				console.log('IdEmpresa:', e);
			});

  
			/*$('#IdFuncionarioEmpresa').change(function(event) {
				$('#CargoRespo').val('');
				if (event.target.value != "")
				{
					$.get('funcionariosLDAP/'+ event.target.value + "", function(response, state){
						$('#CargoRespo').val(response[0].response[i].Name );
						//$('#CargoRespo').focus();
						$('#lblCargoRespo').css( "font-size", "12px" );
					});
				}
			});*/


			//Organización que audita
			$('#IdEmpresaAudita').change(function(event) {

				$('#IdPersonalInspectorLider').val(null).trigger('change');
				$('#IdPersonalAuditorLider').val(null).trigger('change');
				$("#IdEquipoInpectorOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();


				//Validar si la empresa pertenece a FAC
				$.get("consecutivo/" + event.target.value + "", function(response, state){

					var tipoOrganizacion = response[0].TipoOrganizacion;

					if (tipoOrganizacion == 'FAC')
					{ console.log('fac')
						$('#IdPersonalAuditorLider, #IdPersonalInspectorLider').select2({
							placeholder: "",
							minimumInputLength: 3,
							allowClear: true
						});

						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioWS');

						$.get("funcionariosLDAP/" + event.target.value + "", function(response, state){
							//$('#IdPersonalInspectorLider').empty();
							//$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');

							//$('#IdPersonalAuditorLider').empty();
							//$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');

							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
console.log('IdPersonalInspectorLider',response);
								//$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								//$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
							}
						});

					}else{
   console.log('no fac')
						$('#IdPersonalAuditorLider, #IdPersonalInspectorLider').select2({
							placeholder: "",
							minimumInputLength: 0,
							allowClear: true
						});

						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioEmpresa');

						//Carga el combo de funcionarios de la empresa
						$.get("funcionarios/" + event.target.value + "", function(response, state){
							//inspector Lider
							//$('#IdPersonalInspectorLider').empty();
							//$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');
							//Auditor Lider
							//$('#IdPersonalAuditorLider').empty();
							//$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');
							//Equipo inspector
							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								//$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								//$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
						});

						/*$('#IdFuncionarioEmpresa').change(function(event) {
							$('#CargoRespo').val('');
							if (event.target.value != "")
							{
								$.get('funcionario/'+ event.target.value + "", function(response, state){
									$('#CargoRespo').val(response[0].CargoFuncion);
									//$('#CargoRespo').focus();
									$('#lblCargoRespo').css( "font-size", "12px" );
								});
							}
						});*/
					}
				});
			});


			setTimeout(function(){
				$("#IdEquipoInpectorOption, #IdExpertosTecnicosOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();
			}, 100);

          function Procesos(e){
 
     console.log(e.value);
                     }
			/*$('.categoryName').select2({
				placeholder: 'Selecciona una categoría',
				ajax: {
				url: 'ajax.php',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
					results: data
					};
				},
				cache: true
				}
			});*/

$("#IdTipoAuditoria").change(function(){

 var url = "<?php echo url('sigla/"+$("#IdTipoAuditoria").val()+"') ?>";
 //console.log(url);
 //var codigo= $("#Codigo").val();

$.get(url, function( data ) {
  

var code= $("#Codigo").val();
  var today = new Date();
var year = today.getFullYear();
if(data!=''){

document.getElementById('Codigo').value=code+data+'-'+year;
}


//$( ".result" ).html( data );
  //alert( "Load was performed." );
});

   
//+SiglaT+year

})
   
		</script>
		<style>
			.required:before{
		        content:'*';
		        color:red;
		        padding-left:5px;
		    }
		</style>
		@endsection()

	@endsection()

@endsection()
