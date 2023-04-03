
@extends('partials.card')

@extends('partials.pdf')

<body class="menubar-hoverable header-fixed " style="background-color: white;">


@section('content')

    @section('card-content')

        @section('form-tag')

        
        @endsection

        @section('card-title')
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p style="float: left;">Informe Plan Inspección Final</p>
        </div>

        @endsection()

        @section('card-content')

        {!! Form::model($informeinspeccion) !!}
        {{ csrf_field()}}

        <div style="margin-bottom: 200px;" class="card-body floating-label">
        <!-- BEGIN BASE-->
        <div id="">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
            <div id="contentReport">
                <section>
                    @if(count($informeinspeccion) == 1)
                    @foreach($informeinspeccion as $informeinspeccionR)

                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac letraGris">
                                <?php $image_path = '/img/logoFac.png'; ?>
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-6 titulo letraGris">
                                <h3>PLAN DE INSPECCION</h3>
                            </div>
                            <!-- Datos del formulario -->
                            <div style="padding-right: 100px;" class="col-xs-2 datosFormulario letraGris">                            
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Version</li>
                                    <li id="versionEnc">4</li>
                                </ul>
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Implementación</li>
                                    <li id="implementacionEnc">12-JUN/2015</li>
                                </ul>
                            </div>
                            <div class="col-xs-2 datosFormulario letraGris">
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Codigo</li>
                                    <li id="codigoEnc">IC-FR-2</li>
                                </ul>
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Tipo de Documento</li>
                                    <li id="documentoEnc">Formato</li>
                                </ul>
                            </div>                      
                        </div><!--end .row -->
                        
                        <!-- FECHA -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-offset-8 fecha">
                                <div class="col-xs-6 gris" > FECHA</div>
                                <div class="col-xs-6 negro"> {{$informeinspeccionR->FechaInicio}}</div>   
                            </div>                          
                        </div><!--end .row -->
                    
                    
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > UMA / PROCESO/ JEFATURA/ DEPENDENCIA/ ASPECT A INSPECCIONAR </div>
                                <div class="col-xs-8 negro"> {{$informeinspeccionR->NombreEmpresa}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > RESPONSABLE UMA/ PROCESO/ JEFATURA/ DEPENDENCIA / ASPECTO A INSPECCIONAR:</div>
                                <div class="col-xs-8"> 
                                    <div class="col-xs-4 negro"> 
                                        {{$informeinspeccionR->NombreAuditoria}}                                    
                                    </div>   
                                    <div class="col-xs-8"> 
                                        <div class="col-xs-6 gris"> Cargo: </div>
                                        <div class="col-xs-6 negro"> ..... </div>
                                    </div>   
                                
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > INSPECTOR GENERAL/ JEFE OFICINA/ REGIONAL INSPECCION Y CONTROL:</div>
                                <div class="col-xs-8 negro"> {{$informeinspeccionR->NomAuditor}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > OBJETIVO DE LA INSPECCION:<br><br><br></div>
                                <div class="col-xs-8 negro"> {{$informeinspeccionR->Objeto}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > ALCANCE DE LA INSPECCION:<br><br><br></div>
                                <div class="col-xs-8 negro">{{$informeinspeccionR->Alcance}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > CRITERIO DE LA INSPECCION:</div>
                                <div class="col-xs-8 negro">{{$informeinspeccionR->MarcoLegal}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > TIPO DE INSPECCION: (Señale con una X el tipo de inspección)</div>
                                <div class="col-xs-8"> 
                                <div class="col-xs-6"> 
                                    <ul class="menuTipoInspeccion none-space">
                                        <li><input type="radio" name="opciones" value="alta" id="arDer"/> Por entrega UMA </li>
                                        <li><input type="radio" name="opciones" value="baja" id="arIzq" /> Por control UMA  </li>
                                    
                                    </ul>
                                </div>
                                <div class="col-xs-6"> 
                                    <ul class="menuTipoInspeccion none-space">
                                        <li><input type="radio" name="opciones" value="consulta" id="abDer" /> Por Aspectos Criticos</li>
                                        <li><input type="radio" name="opciones" value="alta" id="abIzq"/> Por Cumplimiento Normativo </li>
                                    
                                    </ul>
                                </div>                                                                       
                                
                                </div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > INSPECTOR LIDER/ RESPONSABLE DE INSPECCION</div>
                                <div class="col-xs-8 negro"> {{$informeinspeccionR->EquipoInspector}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > EQUIPO INSPECTOR: (se debe escribir la totalidad del equipo inspector y la dependencia o aspecto a inspeccionar )</div>
                                <div class="col-xs-8 negro"> ....</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > EXPERTOS TECNICOS/ PROCESO:( se debe escribi la totalidad de los expertos tecnicos y la dependencia o aspecto que verificara</div>
                                <div class="col-xs-8 negro">{{$informeinspeccionR->EquipoInspector}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            
                            
                            <!-- Div Fecha -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4 gris firstColDivider" > OBSERVADOR:(Se debe escribir la totalidad de los observadores que practicaran en la inspección)</div>
                                <div class="col-xs-8 negro">{{$informeinspeccionR->Observaciones}}</div>   
                            </div>
                            <!-- Div Fecha -->
                            

                        </div><!--end .row -->
                        
                        <!-- SEGUNDO BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > ACTIVIDADES DE LA INSPECCION  </div>                                  
                            </div>                            
                            <!-- Primer cuadro de informacion -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-6 none-space r">
                                    <div class="col-xs-4 gris text-center">
                                        REUNION <br> APERTURA
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> FECHA</li>
                                            <li id="fechaReunionApertura" >...</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> HORA</li>
                                            <li id="horaReunionApertura" >...</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6 none-space r">
                                    <div class="col-xs-4 gris text-center">
                                        REUNION <br>  DE CIERRE
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space text-center">
                                            <li class="gris text-center"> FECHA</li>
                                            <li id="fechaReunionCierre" >...</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-4">
                                        <ul class="menuActInsp none-space">
                                            <li class="gris text-center"> HORA</li>
                                            <li id="horaReunionCierre" >...</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div><!--end .row -->
                        
                        <!-- TERCER BLOQUE DE INFOMACION -->
                        <div class="row">                                                
                            <div class="col-xs-12 filaFormulario table-fixed gris">
                                <table class="table  table-x" id="table1">
                                  <tr class="borderL borderT borderB LetraBold">
                                        <th class="th-x borderL borderR borderT borderB LetraBold"> DEPENDENCIA / ASPECTO A INSPECCIONAR:</th>
                                      
                                        <th  class="th-x borderL borderR borderT borderB LetraBold"> INSPECCIONADO ( Responsable de la Dependencia/ Aspecto a Inspeccionar) </th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" > INSPECTOR / EXPERTO TECNICO</th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" > FECHA </th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" > HORA INICIO </th>
                                      
                                        <th class="th-x borderL borderR borderT borderB LetraBold" > HORA FINAL </th>
                                                                              
                                  </tr>                                  
                                    <tr class="line-b">  
                                        <th class=""> ...</th>
                                        <th class=""> ...</th>
                                        <th class=""> ...</th>
                                        <th class=""> ...</th>
                                        <th class="">...</th>
                                        <th class="">...</th>
                                        
                                  </tr>
                                </table>
                            </div>
                               
                        </div><!--end .row -->
                         <!--  BLOQUE DE INFOMACION -->
                        <div class="row">
                            <!-- Titulo -->
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-12 gris text-center" > OBSERVACIONES  </div>                                  
                            </div>  
                            <div class="col-xs-12 filaFormulario">
                                <textarea class="inputInforme" placeholder=" campo par observaciones" id="txtConclusiones">
                                    {{$informeinspeccionR->Observaciones}}
                                </textarea>
                            </div>                            
                        </div><!--end .row -->
                        
                        <!--  BLOQUE FIRMAS -->
                        <div class="row">                         
                                <div style="border: solid 1px #000;" class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <p>Nombre Insector Líder </p>
                                        <div class="col-xs-12" id="">
                                            ...
                                        </div>
                                        <div class="col-xs-12">
                                            Responsable Inspección:
                                        </div>                                        

                                    </div>
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <div class="col-xs-12" >
                                            .....
                                        </div>
                                        <p class="col-xs-12">Nombre Inspector General FAC / Subdirector Delegado / Jefe ORICO: </p>                                                                         
                                    </div>
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <div class="col-xs-12" >
                                            .....
                                        </div>
                                        <p class="col-xs-12">Nombre Responsable UMA / Proceso / jefatura / Dependencia / Aspecto a Inspeccionar:</p>
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