@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
    



@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Informe Inspección IC FR 03
		@endsection()

		@section('card-content')       

		<div class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
            <div id="">
                <section>
                    @if(count($informeinspeccionicfr03) == 1)
                    @foreach($informeinspeccionicfr03 as $informeinspeccionicfr03R)
                    <div class="section-body">

                        <?php $image_path = '/img/logoFac.png'; ?>

                        <div class="row encabezadoPlanInspeccion">
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac">
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-6 titulo">
                                <h3>INFORME DE INSPECCION</h3>
                            </div>
                            <!-- Datos del formulario -->
                            <div class="col-xs-2 datosFormulario">                            
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Version</li>
                                    <li id="versionEnc"></li>
                                </ul>
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Implementación</li>
                                    <li id="implementacionEnc"></li>
                                </ul>
                            </div>
                            <div class="col-xs-2 datosFormulario">
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Codigo</li>
                                    <li id="codigoEnc">{{$informeinspeccionicfr03R->Codigo}}</li>
                                </ul>
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Tipo de Documento</li>
                                    <li id="documentoEnc">{{$informeinspeccionicfr03R->NombreTipo}}</li>
                                </ul>
                            </div>                      
                        </div><!--end .row -->
                        
                        <!-- FECHA -->
                        <div class="row">
                            
                            <!-- Tipo de Reporte  -->
                            <div class="col-xs-4 fecha">
                                <table style="width:100%" class="table table-bordered table-tipoReporte">
                                  <tr>
                                    <th class="gris"> Reporte:</th>
                                    <th class="gris">PRELIMINAR</th> 
                                    <th class="gris" >FINAL</th>
                                    <th class="gris" >TRIMESTRAL</th>
                                  </tr>
                                  <tr>
                                    <td class="gris"> selecciona</td>
                                    <td><input type="radio" name="opciones" class="radioTipoRep"/></td>
                                    <td><input type="radio" name="opciones" class="radioTipoRep"/></td>
                                    <td><input type="radio" name="opciones" class="radioTipoRep"/></td>
                                  </tr>                                  
                                </table>
                            </div>
                            <!-- Div Fecha -->
                            <div class="col-xs-offset-4 col-xs-4 fecha">
                                <div class="col-xs-6 gris" > FECHA</div>
                                <div class="col-xs-6"> {{$informeinspeccionicfr03R->FechaAperAudit}}</div>   
                            </div>                          
                        </div><!--end .row -->
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris text-center">
                                        JEFATURA, UNIDAD, PROCESO, DEPENDENCIA, PROCEDIMIENTO O ASPECTOR INSPECCIONADO:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    {{$informeinspeccionicfr03R->NombreEmpresa}}                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris text-center">
                                        OBJETIVO DE LA INSPECCION:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    {{$informeinspeccionicfr03R->Objeto}}
                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris text-center">
                                        ALCANCE DE LA INSPECCION:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="col-xs-12 text-center" id="alcamceFR03">
                                        {{$informeinspeccionicfr03R->Alcance}}
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris text-center">
                                        CRITERIOS DE LA INSPECCION:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="col-xs-12 text-center" id="criterioFR03">
                                        {{$informeinspeccionicfr03R->NombreEmpresa}}
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->
                            <!-- Responsable Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris" >
                                    <div class="col-xs-12 gris text-center">
                                        NOMBRE RESPONSABLE / INSPECTOR LIDER:
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="col-xs-12 text-center">
                                        <div class="col-xs-4 text-center">
                                        Auditor Lider:
                                        </div>
                                        <div class="col-xs-8 text-center">
                                        {{$informeinspeccionicfr03R->NombreEmpresa}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <div class="col-xs-4 text-center">
                                        Codigo Auditoria:
                                        </div>
                                        <div class="col-xs-8 text-center">
                                        {{$informeinspeccionicfr03R->Codigo}}
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <!-- FIN Div-->                        
                        </div><!--end .row -->
                        
                        <!-- SEGUNDO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > ACTIVIDADES A DESARROLLAR  </div>         
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                
                                <textarea class="inputInforme" id="txtActDes">{{$informeinspeccionicfr03R->ActividaDesarr}}</textarea>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!-- TERCER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > ASPECTOS RELEVANTES:  </div>         
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                <textarea  class="inputInforme" id="txtAspRelevantes">{{$informeinspeccionicfr03R->AspectosRelev}}</textarea>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!-- CUARTO BLOQUE DE INFOMACION -->
                        <div class="row">
                            
                            <!-- Primer cuadro de informacion -->
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > OPORTUNIDADES DE MEJORAS:  </div>         
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                <textarea  class="inputInforme" id="txtAspRelevantes">{{$informeinspeccionicfr03R->OportuMejora}}</textarea>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!-- QUINTO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > CONCLUSIONES:  </div>                                  
                            </div>  
                            <div class="col-xs-12 filaFormulario">
                                <textarea class="inputInforme"  id="txtConclusiones">{{$informeinspeccionicfr03R->Conclusiones}}</textarea>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!-- SEXTO BLOQUE FIRMAS -->
                        <div class="row">                         
                                <div class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-6" >
                                        <h5> Firma </h5>
                                        <p>Grado, Nombre Y Cargo </p>     
                                        <div class="col-xs-6" id="gradoNoCa">
                                            {{$informeinspeccionicfr03R->NombreEmpresa}}
                                        </div>

                                    </div>
                                    <div class="col-xs-6" >
                                          <table style="width:100%" class="table table-bordered table-tipoReporte">
                                              <tr>
                                                <th class="gris"> Total NO Conformidades nuevas:</th>
                                                <td id="txtConN">{{$informeinspeccionicfr03R->TotalNoConfNuevas}}</td>                
                                              </tr>
                                              <tr>
                                                <th class="gris"> Total NO Conformidades Repetivas:</th>
                                                <td id="txtConR">{{$informeinspeccionicfr03R->TotalNoConfRepet}}</td>
                                              </tr>
                                                <tr>
                                                <th class="gris"> Total Oportunidades de Mejora:</th>
                                                <td id="txtOpM">{{$informeinspeccionicfr03R->TotalOportuMejora}}</td>
                                              </tr>
                                        </table>               
                                    </div>
                                </div>
                        </div><!--end .row -->
                        
                    </div><!--end .section-body -->                   
                </section>
                @endforeach
                @else
                  <div class="section-body">
                    <div class="text-center">
                        <h3>No hay datos para mostrar informe</h3>
                    </div>
                  </div>
                @endif
            </div><!--end #content-->
            <!-- END CONTENT -->		
        </div>
    </div>

        

		{!! Form::close() !!}
		@endsection()

	@endsection()

@endsection()

</body>