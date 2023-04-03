@extends('partials.card')

@extends('layout')

@section('title')
	Editar Inspección
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
@php 
///set_time_limit(0);
@endphp
			<div class="card-body floating-label">
					
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="NombreAuditoria" name="NombreAuditoria" required value="{{old('NombreAuditoria', $auditoria->NombreAuditoria)}}">
							<label for="NombreAuditoria">Nombre Inspección</label>
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
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="Codigo" name="Codigo"  readonly required value="{{old('Codigo', $auditoria->Codigo)}}">	
							<label id="lblCodigo" for="codigo">Código</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdEmpresa', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresas', 'required']) }}
							<label for="IdEmpresa">UMA</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdEmpresaAudita', $empresas->pluck('NombreEmpresa', 'IdEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEmpresasAudita', 'required']) }}
							<label for="IdEmpresaAudita">Dependencia</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">								
							<textarea class="form-control" id="Aspecto" name="Aspecto" rows="4">{{$auditoria->aspecto}} </textarea>
							<label for="Aspecto">Aspecto a inspeccionar</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<!-- <select id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa" class="form-control" required aria-required="true">
							</select> -->
							<input type="text" class="form-control" name="FuncionarioEmpresa" id="FuncionarioEmpresa" placeholder="Selecciona...">
							<input type="hidden" name="IdFuncionarioEmpresa" id="IdFuncionarioEmpresa" value="0">
							<label for="IdFuncionarioEmpresa">Responsable</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="CargoRespo" name="CargoRespo" value="{{old('CargoRespo', $auditoria->CargoRespo)}}">
							<label id="lblCargoRespo" for="CargoRespo">Cargo</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">

						<div class="form-group" >

  <select class="form-control" id="IdPersonalInspectorLiders" name="IdPersonalInspectorLider">


                                @foreach ($usuarios as  $funcionarios )
                     @if($funcionarios->IdUserLDAP == $auditoria->IdPersonalInsp)
								<option value="{{$funcionarios->IdUserLDAP}}" selected>{{$funcionarios->Name}} </option> 	
@else     
<option value="{{$funcionarios->IdUserLDAP}}">{{$funcionarios->Name}} </option>                        
@endif								
@endforeach
								</select>
								<label for="IdPersonalInspectorLider" >
Inspector General/Jefe Oficina Regional Inspección y Control</label>
						
					</div>
					</div>
					<div class="col-sm-6">

						<div class="form-group" >
		
					<select id="IdPersonalAuditorLiders" name="IdPersonalAuditorLider" class="form-control" aria-required="true" required>
 @foreach ($usuarios as  $funcionarios2 )

		
                    @if($funcionarios2->IdUserLDAP==$auditoria->IdPersonalAudi)
								<option value="{{$funcionarios2->IdUserLDAP}}" selected>{{$funcionarios2->Name}} </option> 	
@else     
<option value="{{$funcionarios2->IdUserLDAP}}">{{$funcionarios2->Name}} </option>                        
@endif	

@endforeach
</select>
							<label for="IdPersonalAuditorLider" >Inspector Lider</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">	
						<div class="form-group">
							<textarea class="form-control" id="Objeto" name="Objeto" rows="4" >{{old('Objeto', $auditoria->Objeto)}}</textarea>
							<label for="Objeto">Objetivo de la inspección</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="Alcance" name="Alcance" rows="4" required>{{old('Alcance', $auditoria->Alcance)}}</textarea>
							<label for="Alcance">Alcance de la inspección</label>
						</div>
					</div>
				</div>

<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							{{ Form::select('IdTipoAuditoria', $tiposAuditoria->pluck('TipoAuditoria', 'IdTipoAuditoria'), null, ['class' => 'form-control' , 'required']) }}
							<label for="IdTipoAuditoria" style="font-size: 16px;">Tipo de inspección</label>
						</div>
					</div>
				</div>

				<div class="row">
					<label style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">CRITERIO DE LA INSPECCIÓN</label>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<label for="IdCriterios" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">En forma general</label>
						<select id="IdCriterioGeneral" name="IdCriterioGeneral[]" class="form-control"  required multiple>
 																		

                       @foreach($criterios as $key => $value)
							                               
						<option value="{{$key}}"selected>{{$value}}</option>
						
			
                                    	
{{--<option value="{{$key}}">{{$value}}</option>--}}
									@endforeach()
								</select>
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
					 	
					
						<div class="col-sm-8" id="IdCriterioParticularDiv">

@for ($i=0; $i<count($datacriteriosParticular);$i++)
		
							<div class="form-group">
								<select id="IdCriterioParticular" name="IdCriterioParticular[]" class="form-control"  required>
									@foreach($criterios as $key => $value)
                                        @if ($key==$datacriteriosParticular[$i])
										<option value="{{$key}}"selected>{{$value}}</option>	
										@else
             	<option value="{{$key}}">{{$value}}</option>	
                                         @endif
										
									@endforeach()
								</select>
								<label class="required">Criterio</label>
							</div>  
 @endfor
						</div>
                        
@for ( $j=0 ;  $j<count($dataProcesosP); $j++)
	

                    <div class="col-sm-4" id="IdCriterioParticularDivP">
							<div class="form-group">
								<select id="IdCriterioParticular" name="procesosparticular[]" class="form-control" onChange="Procesos(this)"  required>
									@foreach($procesos as $value)
                                       @if ($dataProcesosP[$j]==$value->IdProceso)
										<option value="{{$value->IdProceso}}"selected>{{$value->Proceso .'-'}} {{' '.$value->SubProceso}}</option>
									   @else
										<option value="{{$value->IdProceso}}">{{$value->Proceso .'-'}} {{' '.$value->SubProceso}}</option>
									   @endif
										
									@endforeach()
								</select>
								<label class="required">Proceso-Subproceso</label>
							</div>  
						</div>
@endfor
					</div>
				</div>

{{--  equipoinspectordata procesoinspectordata --}}
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

@php 
$contarProcesoinspector=count($procesoinspectordata)
@endphp
@if($contarProcesoinspector>0)
@for ( $j=0 ;  $j<$contarProcesoinspector; $j++)


							<div class="form-group">
								<select   name="ProcesosINspector[]" class="form-control"  required>
									@foreach($procesos as $value2)
                                    @if ($procesoinspectordata[$j]==$value2->IdProceso)  
										<option value="{{$value2->IdProceso}}"selected>{{$value2->Proceso.'-'}}{{' '.$value2->SubProceso}}</option>
									 @else
										<option value="{{$value2->IdProceso}}">{{$value2->Proceso .'-'}} {{' '.$value2->SubProceso}}</option>
									   @endif
                          @endforeach()
								</select>
								<label class="required">Proceso - Subproceso</label>
							</div> 
@endfor
@else

<div class="form-group">
								<select   name="ProcesosINspector[]" class="form-control"  required>
									@foreach($procesos as $values2)
                                      
										<option value="{{$values2->IdProceso}}">{{$values2->Proceso.'-'}}{{' '.$values2->SubProceso}}</option>
									
                          @endforeach()
								</select>
								<label class="required">Proceso - Subproceso</label>
							</div> 
@endif
</div>		

<div class="col-sm-6" id="gradoN">
@php 
$countgradoinspectr= count($equipoinspectordata);

@endphp
@if($countgradoinspectr>0)
@for ($j=0;  $j<$countgradoinspectr ; $j++)
	

							<div class="form-group" >
   							
                         <select  class="form-control" name="GradoEquipoInspector[]"  required>



                                   @foreach ($usuarios as  $grado1)


     @if ($equipoinspectordata[$j]==$grado1->IdUserLDAP)

<option value="{{$grado1->IdUserLDAP}}"selected>{{$grado1->Name}} </option>
@else

<option value="{{$grado1->IdUserLDAP}}">{{$grado1->Name}} </option>			
		@endif
								 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" class="required" >Grado nombre</label>
							</div>
@endfor
@else

<div class="form-group" >
   							
                         <select  class="form-control" name="GradoEquipoInspector[]"  required>


                                @foreach ($usuarios as  $grados )

								<option value="{{$grados->IdUserLDAP}}">{{$grados->Name}} </option> 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" class="required" >Grado nombre</label>
							</div>
@endif
	

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

@php  
$countEXPtad=count($procesoExpertosTdata);
//echo  $countEXP;
@endphp
<div id="containerEquipoinspector2">
<div  class="row">
       
       <div class="col-sm-6"  id="procesosInspector2">

@if($countEXPtad>0)
@for ( $j=0 ;  $j<$countEXPtad; $j++)


							<div class="form-group">
								<select   name="ProcesosExpertosTecnicos[]" class="form-control"  required>
									@foreach($procesos as $value2)
                                    @if ($procesoExpertosTdata[$j]==$value2->IdProceso)  
										<option value="{{$value2->IdProceso}}"selected>{{$value2->Proceso.'-'}}{{' '.$value2->SubProceso}}</option>
									 @else
										<option value="{{$value2->IdProceso}}">{{$value2->Proceso .'-'}} {{' '.$value2->SubProceso}}</option>
									   @endif
                          @endforeach()
								</select>
								<label class="required">Proceso - Subproceso</label>
							</div> 
@endfor



@else

<div class="form-group">

	

									<select   name="ProcesosExpertosTecnicos[]" class="form-control"  required>
									@foreach($procesos as $values2)
                                      
										<option value="{{$values2->IdProceso}}">{{$values2->Proceso.'-'}}{{' '.$values2->SubProceso}}</option>
									
                          @endforeach()
								</select>
								<label class="required">Proceso - Subproceso</label>
							</div>  
@endif
	     </div>		
		

<div class="col-sm-6" id="gradoN2" >

@php 
$contarexpertosT=count($expertosTecnicosdata) 

@endphp
@if($contarexpertosT>0)
@for ($j=0;  $j<$contarexpertosT ; $j++)
	

							<div class="form-group" >
   							
                         <select  class="form-control" name="GradonombreEquipotecnico[]"  required>



                                   @foreach ($usuarios as  $grado1)

@if ($expertosTecnicosdata[$j]==$grado1->IdUserLDAP)

<option value="{{$grado1->IdUserLDAP}}"selected>{{$grado1->Name}} </option>
@else

<option value="{{$grado1->IdUserLDAP}}">{{$grado1->Name}} </option>			
		@endif
								 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" class="required" >Grado nombre</label>
							</div>
@endfor
@else

<div class="form-group" >
   							
                         <select  class="form-control" name="GradonombreEquipotecnico[]"  required>


                                @foreach ($usuarios as  $grados )

								<option value="{{$grados->IdUserLDAP}}">{{$grados->Name}} </option> 	
								@endforeach
						</select>
								<label for="IdPersonalInspectorLider" class="required" >Grado nombre</label>
							</div>
@endif
	



	</div>
</div>	

</div>	

				<div class="row">

					<div class="col-sm-12">
					
	<label for="EquipoInspector" style="font-size:17px; color:#3f4c5a; margin:0px; padding:0px">Observador</label>
						<div class="form-group" >
                         <select class="form-control"  id="observador" name="observadores[]" multiple> 
      <option value=""> </option>     
     
                           @foreach ($usuarios as  $claves  )
 					 
<option value="{{$claves->IdUserLDAP }}"> {{$claves->Name }}</option>	
							 @endforeach
						 </select>
							
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group date" id="demo-date-format">
											<div class="input-group-content">
												<input type="text" class="form-control" id="FechaAperAudit" name="FechaAperAudit" required value="{{old('FechaAperAudit', $auditoria->FechaAperAudit)}}">
												<label for="FechaAperAudit">Fecha Inicio</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraIni" name="HoraIni" class="form-control" required aria-required="true" >
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
												<label for="FechaTermino">Fecha Cierre</label>
											</div>
											<span class="input-group-addon"></span>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<select id="HoraTermi" name="HoraTermi" class="form-control" required aria-required="true" required>
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
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="4" >{{old('Observaciones', $auditoria->Observaciones)}}</textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<input type="hidden" value="{{$auditoria->IdFuncionarioEmpresa}}" id="IdFuncionarioEmpresaUpta" name="IdFuncionarioEmpresaUpta">
				<!-- Inspector Lider-->
				<input type="hidden" value="{{$auditoria->IdPersonalInsp}}" id="IdInspectorLiderUpta" name="IdInspectorLiderUpta">
				<!-- Auditor Lider-->
				<input type="hidden" value="{{$auditoria->IdPersonalAudi}}" id="IdAuditorLiderUpta" name="IdAuditorLiderUpta">

				<input type="hidden" value="{{$auditoria->EstadoInsertOrganizacion}}" name="EstadoInsertOrganizacion" id="EstadoInsertOrganizacion">

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

		<div class="modal-box fade in" id="responsableModal" tabindex="-1">
			<div class="modal-box-inner">
				<div class="modal-box-content modal-box-md-1">
					<div class="modal-box-header">
						<h5 class="modal-title" id="modalHeading">Selecciona un responsable</h5>
						<button type="button" class="close" id="closeModal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
						</button>
					</div>
					<div class="modal-box-body">
						<table id="tb_responsables" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Funcionario</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($responsables as $item)
								<tr>
									<td>{{ $item->IdUserLDAP }}</td>
									<td>{{ $item->Name }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="modal-box-footer">
        				<button type="button" class="btn btn-danger" id="btn-close">Cerrar</button>
      				</div>
				</div>
			</div>
		</div>
		

		<script type="text/javascript">

			$(document).ready(function(){

				$('select').select2();


       $(document).on('click', '#btnFParticular', function(){ 
               $("select").select2('destroy'); 
				var wrapper = $("#ParticularContainer");
				var selectCode = document.getElementById("IdCriterioParticularDiv").outerHTML;
         var selectCode2 = document.getElementById("IdCriterioParticularDivP").outerHTML;
				var divText = '<div class="row">'+selectCode+selectCode2+' </div>';
				$(wrapper).append(divText);
            $('select').select2();
			});

$(document).on('click', '#btnFequipo2', function(){ 
        
              $("select").select2('destroy'); 
				var wrapper = $("#containerEquipoinspector2");
				var selectCode = document.getElementById("procesosInspector2").outerHTML;
     var  select =document.getElementById("gradoN2").outerHTML;
      //console.log('uno',selectCode);
       //console.log('dos',select);

				var divText = '<div class="row">'+selectCode+' '+select+' </div>';
				$(wrapper).append(divText);
                	$('select').select2();
               //console.log(contar);

			});

$(document).on('click', '#btnFequipoI', function(){ 
              
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


				$('#IdPersonalAuditorLider, #IdPersonalInspectorLider, #IdEquipoInpectorOption, #IdFuncionarioEmpresa').select2({
					placeholder: "",
					minimumInputLength: 3,
					allowClear: true
				});

				var idEmpresa = $('#IdEmpresa').val();
				var idEmpresaAudita = $('#IdEmpresaAudita').val();
				var idFuncionario = $('#IdFuncionarioEmpresaUpta').val();
				var idInspectorLider = $('#IdInspectorLiderUpta').val();
				var idAuditorLider = $('#IdAuditorLiderUpta').val();
				
				var estadoUsuario = $('#EstadoInsertOrganizacion').val();

				
				//Responsables
				$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){
					$('#IdFuncionarioEmpresa').empty();
					$('#IdFuncionarioEmpresa').append('<option value=""></option>');
					for(i=0; i<response.length; i++){
						if (response[i].IdUserLDAP == idFuncionario.toString()){
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '" selected>' +  response[i].Name + '</option>');
						}
						else
						{
							$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
						}
					}

					$('#IdFuncionarioEmpresa').trigger('change.select2');
				});

				/**
				 * Inspector Lider
				 * Auditor Lider
				 * Equipo Inspector
				 */
			
				//$('#IdPersonalAuditorLider').empty();
				//$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');

				$('#IdEquipoInpectorOption').empty();
				$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');
				//WS
				if(estadoUsuario == 'usuarioWS'){
					//Inspector Lider
					$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){

						for(i=0; i<response.length; i++){
							
							
							//$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
						}
						var resultEquipoInspector = eval('{!! $regEquipoInspectorAsociadosWS !!}');
						//$("#IdEquipoInpectorOption").select2("val", resultEquipoInspector);
						//$('#IdPersonalInspectorLider, #IdPersonalAuditorLider').trigger('change.select2');
					});
				//Empresa
				}else{
					$.get("../funcionarios/" + idEmpresaAudita + "", function(response, state){

						for(i=0; i<response.length; i++){
							if(response[i].IdFuncionarioEmpresa == idInspectorLider.toString()){
								//$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '" selected>' +  response[i].Nombres + '</option>');
							}else{
								//$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
							if(response[i].IdFuncionarioEmpresa == idAuditorLider.toString()){
								//$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '" selected>' +  response[i].Nombres + '</option>');
							}else{
								//$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
							$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							
						}
						var resultEquipoInspector = eval('{!! $regEquipoInspectorAsociadosEmpresa !!}');
						$("#IdEquipoInpectorOption").select2("val", resultEquipoInspector);

						$('#IdPersonalInspectorLider, #IdPersonalAuditorLider').trigger('change.select2');
					});
				}
			});

			$('#IdEmpresa').change(function(event) {

				$('#IdFuncionarioEmpresa').val(null).trigger('change');

				//Carga el consecutivo de Auditoria para la empresa
				$.get("../consecutivo/" + event.target.value + "", function(response, state){
					
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
				// $.get("../funcionarios/" + event.target.value + "", function(response, state){
				// 	$('#IdFuncionarioEmpresa').empty();
				// 	$('#CargoRespo').val('');
				// 	$('#IdFuncionarioEmpresa').append('<option value="" selected="selected"></option>');

				// 	for(i=0; i<response.length; i++){
				// 		$('#IdFuncionarioEmpresa').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
				// 	}
				// });
			});

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

				var value = $(this).val();

				//Validar si la empresa pertenece a FAC

				$.get("../consecutivo/" + event.target.value + "", function(response, state){
					
					var tipoOrganizacion = response[0].TipoOrganizacion;
					
					if (tipoOrganizacion == 'FAC')
					{
						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioWS');

						$.get("../funcionariosLDAP/" + event.target.value + "", function(response, state){
							$('#IdPersonalInspectorLider').empty();
							$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');

							$('#IdPersonalAuditorLider').empty();
							$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');

							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
								$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdUserLDAP + '">' +  response[i].Name + '</option>');
							}
						});

					}else{
						//Estados 1 WS 2 usuarios Empresa
						$("#EstadoInsertOrganizacion").val('usuarioEmpresa');

						//Carga el combo de funcionarios de la empresa
						$.get("../funcionarios/" + event.target.value + "", function(response, state){
							//inspector Lider
							$('#IdPersonalInspectorLider').empty();
							$('#IdPersonalInspectorLider').append('<option value="" selected="selected"></option>');
							//Auditor Lider
							$('#IdPersonalAuditorLider').empty();
							$('#IdPersonalAuditorLider').append('<option value="" selected="selected"></option>');
							//Equipo inspector
							$('#IdEquipoInpectorOption').empty();
							$('#IdEquipoInpectorOption').append('<option value="" selected="selected"></option>');

							for(i=0; i<response.length; i++){
								$('#IdPersonalInspectorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								$('#IdPersonalAuditorLider').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
								$('#IdEquipoInpectorOption').append('<option value="' + response[i].IdFuncionarioEmpresa + '">' +  response[i].Nombres + '</option>');
							}
						});
					}
				});
			});

			setTimeout(function(){
				$(" #IdExpertosTecnicosOption").select2( {
					'placeholder': '',
					'width': null,
					'containerCssClass': ':all:'
				} );

				$('.select2-search-choice').remove();
				
				var resultCriterios = eval('{!! $criteriosgenerales !!}');
				$("#IdCriterioGeneral").select2("val", resultCriterios);
              var robservadores=eval('{!! $observadores !!}')   				
             	$("#observador").select2("val", robservadores);
			}, 100);

			
			
		</script>
		<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>
		<script>
  			$(document).ready(function() {
    			var tbResp = $('#tb_responsables').DataTable({
					scrollY: '300px',
					paging: true,
					autoWidth: false,
					columns: [
						{ data: 'IdUserLDAP', visible: false },
						{ data: 'Name' },
					],
				});

				$('#tb_responsables tbody').on('click', 'tr', function () {
					var data = tbResp.row(this).data();
					// alert("You clicked on ID: " + data['IdUserLDAP'] + " Name: " + data['Name'] + "'s row")
					$('#IdFuncionarioEmpresa').val(data['IdUserLDAP']);
					$('#FuncionarioEmpresa').val(data['Name']);
					$('#CargoRespo').val('');

					document.getElementById('responsableModal').style.display='none';
				});
  			});
		</script>
		<style>
			.dataTables_scrollHead .dataTables_scrollHeadInner {
				width: 100% !important;
			}

			.dataTables_scrollHead .dataTables_scrollHeadInner .table {
				width: 100% !important;
			}

			.dataTables_scrollBody .table thead {
				display: none;
			}

			table.dataTable tbody tr {
				cursor: pointer;
			}
			
			table.dataTable tbody tr.even:hover,
			table.dataTable tbody tr.odd:hover,
			table.dataTable tbody tr.even:hover > .sorting_1,
			table.dataTable tbody tr.odd:hover > .sorting_1 {
				background-color: #367fa9;
				color: white;
			}
		</style>
		@endsection()

	@endsection()

@endsection()