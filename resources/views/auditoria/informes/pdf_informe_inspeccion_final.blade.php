@extends('partials.card')

@extends('partials.pdf2')

<body class="menubar-hoverable header-fixed " style="background-color: white;">

@section('content')

    @section('card-content')

        @section('form-tag')

        
        @endsection
        @section('card-content')
        {!! Form::model($dataAuditoria) !!}
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
                    @foreach($dataAuditoria as $itemAuditoria)

                    <div class="section-body" style="border-block-color: none">
                        <?php $image_path = '/img/logoFac.png'; ?>

                        <div class="row encabezadoPlanInspeccion col-xs-12">
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac">
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                                <div class="col-xs-6 titulo letraGris">
                                    <ul class="tituloFormularioFuerzaArea none-space">
                                        <li><h4>FUERZA AÉREA COLOMBIANA</h4></li>
                                    </ul>
                                    <ul class="none-space">
                                        <li style="list-style: none;"><h3>FORMATO INFORME DE INSPECCIÓN</h3></li>
                                    </ul>
                                </div>
                                <!-- Datos del formulario -->
                                <div class="col-xs-2 datosFormulario letraGris">  
                                    <ul class="none-space" style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;" >
                                        <li>Código:</li>
                                        
                                    </ul>                          
                                    <ul class="none-space" style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;">
                                        <li>Versión N°:</li>
                                    </ul>
                                    <ul class="none-space"style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;">
                                        <li>Vigencia:</li>
                                    </ul>
                                </div>      
                                <!-- Datos del formulario -->
                                <div class="col-xs-2 datosFormulario letraGris">  
                                        <ul class="none-space" style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;">
                                            <li>IS-DIINS-FR-002</li>
                                        </ul>                          
                                        <ul  class="none-space" style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;" >
                                            <li style="list-style: none;">05</li>
                                        </ul>
                                        <ul class="none-space" style="list-style: none; border:1px solid rgb(171, 166, 166); white-space: nowrap;">
                                            <li>22-04-2022</li>
                                        </ul>
                                    </div>                  
                        </div><!--end .row -->

                        <br>
                        <br>
                        <!-- FECHA -->
                        <div class="row">
                            <!-- Div Fecha -->
                            <div class="col-xs-offset-8 fecha">
                                <div class="col-xs-6 gris" > FECHA</div>
                                <div class="col-xs-6 negro"> {{$itemAuditoria->FechaInicio}}</div>   
                            </div>                          
                        </div><!--end .row -->

                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row" style="">
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > UMA / PROCESO/ DEPENDENCIA/ ASPECTO A INSPECCIONAR </div>
                                    <div class="col-xs-8 negro">  <p> {{$itemAuditoria->umas}}</p>
 <p> {{$itemAuditoria->Apecto}}</p>
<p>{{$itemAuditoria->NombreAuditoria}}</p>

                                       </div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > RESPONSABLE UMA/  DEPENDENCIA / ASPECTO A INSPECCIONAR: <br><br></div>
                                    <div class="col-xs-8"> 
                                        <div class="col-xs-4 negro"> 
                                            {{$itemAuditoria->NombresResponsable}}                                     
                                        </div>   
                                        <div class="col-xs-8"> 
                                            <div class="col-xs-6 gris"> Cargo: </div>
                                            <div class="col-xs-6 negro">{{$itemAuditoria->CargoRespo}} </div>
                                        </div>   
                                    
                                    </div>   
                                </div>
                                <!-- Div Fecha -->
                                <br><br>
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario" >
                                    <div class="col-xs-4 gris firstColDivider" style="border-top: 1px solid black;"> INSPECTOR GENERAL/ JEFE OFICINA/ REGIONAL INSPECCION Y CONTROL:</div>
                                    <div class="col-xs-8 negro"> 
                                     {{$itemAuditoria->responsableLider}}
                                    </div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > OBJETIVO DE LA INSPECCION:<br><br><br></div>
                                    <div class="col-xs-8 negro">  {{$itemAuditoria->Objeto}}</div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > ALCANCE DE LA INSPECCIÓN:<br><br><br></div>
                                    <div class="col-xs-8 negro">{{$itemAuditoria->Alcance}}</div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > CRITERIO DE LA INSPECCION:</div>
                                    <div class="col-xs-8 negro">
                                       <h4> EN FORMA GENERAL</h4>
                                    <ul>
                                        @foreach( $criteriosgenerales as $criteriosgenerales)
                                            <li>{{$criteriosgenerales->Norma}} </li>
                                        @endforeach
                                   

                                                <h4>EN FORMA PARTICULAR: </h4>
                
                                                @for ($i = 0; $i < count($procesos); $i++ )
                        <h4> {{$procesos[$i]->proces}} </h4> 
                            <h4>{{$procesos[$i]->SubProceso}}</h4>
                            @for ($j = 0; $j < count($criteriosparticulares); $j++ ) 
                                
                            <li>{{$criteriosparticulares[$j]->Norma}}</li>
                    @endfor   
                    @endfor
                </ul>
                                    </div>   
                                </div>
                                <!-- Div Fecha -->
                                 
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > TIPO DE INSPECCIÓN: (Señale con una X el tipo de inspección)</div>
                                    <div class="col-xs-3 negro"">
                                         <ul style="list-style: none;">
                                           <li><input type="radio" name="opciones" value="alta" id="arDer" checked/> {{$itemAuditoria->TipoAuditoria}}  </li>
                                            <li><input type="radio" name="opciones" value="baja" id="arIzq" /> Por control UMA  </li>
                                        
                                        </ul> 
                                    
                             </div> 


                       <div class="col-xs-3 negro"">
                                         <ul style="list-style: none;">
                                          <li><input type="radio" name="opciones" value="consulta" id="abDer" /> Por Aspectos Criticos</li>
                                          <li><input type="radio" name="opciones" value="alta" id="abIzq"/> Por Cumplimiento Normativo </li>

                                        
                                        </ul> 
                                    
                             </div>  
                                </div>


                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > INSPECTOR LIDER/ RESPONSABLE DE INSPECCIÓN</div>
                                    <div class="col-xs-8 negro"> 
                                        @if($itemAuditoria->InspectorLiderEmpresa == '' || $itemAuditoria->InspectorLiderEmpresa == 'NULL')
                                            {{$itemAuditoria->InspectorLiderWS}}
                                        @else
                                            {{$itemAuditoria->InspectorLiderEmpresa}}
                                        @endif
                                    </div>   
                                </div>
                                <!-- Div Fecha -->
                                <p>Pagina 1</p>
<div class="page-break"></div>
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" style="border-top: 1px solid black;"> EQUIPO INSPECTOR: (se debe escribir la totalidad del equipo inspector y la dependencia o aspecto a inspeccionar )</div>
                                    <div class="col-xs-8 negro"> 
                                        <ul>                                   
 @foreach($equipoinspector as $itemEquipoInspector)
                      <h4>{{$itemEquipoInspector->Proceso}} </h4>            
                      <h4>{{$itemEquipoInspector->SubProceso}} </h4> 
                       <li>{{$itemEquipoInspector->Name}} </li>                                              

                                    @endforeach
   </ul>  
                                    </div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > EXPERTOS TECNICOS/ PROCESO:( se debe escribi la totalidad de los expertos técnicos y la dependencia o aspecto que verificara</div>
                                    <div class="col-xs-8 negro"><ul>                                   
 @foreach($expertostecnicos as $expertosT)
                      <h4>{{$expertosT->Proceso}} </h4>            
                      <h4>{{$expertosT->SubProceso}} </h4> 
                       <li>{{$expertosT->Name}} </li>                                              

                                    @endforeach
   </ul>  </div>   
                                </div>
                                <!-- Div Fecha -->
                                
                                
                                <!-- Div Fecha -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-4 gris firstColDivider" > OBSERVADOR:(Se debe escribir la totalidad de los observadores que practicaran en la inspección)</div>
                                    <div class="col-xs-8 negro"><ul>

 @foreach($observadores as $observadores)
    <li> {{$observadores->Name}}</li>                                                            

                                    @endforeach
<ul></div>   
                                </div>
                                <!-- Div Fecha -->
                                
    
                            </div><!--end .row -->
                            
                            <!-- SEGUNDO BLOQUE DE INFOMACION -->
                            <div class="row" >
                                <!-- Titulo -->
                                <div class="col-xs-12 gris" >
                                    <div class="col-xs-12 gris text-center" > ACTIVIDADES DE LA INSPECCION  </div>                                  
                                </div>                            
                                <!-- Primer cuadro de informacion -->
                                <div class="col-xs-12 gris" >
                                    <div class="col-xs-6" >
                                        <div class="col-xs-4 gris text-center">
                                            REUNION <br> APERTURA
                                        </div>
                                        <div class="col-xs-4">
                                            <ul style="list-style:none;">
                                                <li class="gris text-center"> FECHA</li>
                                                <li id="fechaReunionApertura" >{{$itemAuditoria->FechaInicio}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-4">
                                            <ul style="list-style:none;">
                                                <li class="gris text-center"> HORA</li>
                                                <li id="horaReunionApertura" >{{$itemAuditoria->HoraIni}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 none-space r">
                                        <div class="col-xs-4 gris text-center">
                                            REUNION <br>  DE CIERRE
                                        </div>
                                        <div class="col-xs-4">
                                            <ul style="list-style:none;">
                                                <li class="gris text-center"> FECHA</li>
                                                <li id="fechaReunionCierre" >{{$itemAuditoria->FechaTermino}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-4">
                                            <ul style="list-style:none;">
                                                <li class="gris text-center"> HORA</li>
                                                <li id="horaReunionCierre" >{{$itemAuditoria->HoraTermi}}</li>
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
                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> DEPENDENCIA / ASPECTO A INSPECCIONAR:</th>
                                            
                                            <th  class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> INSPECCIONADO ( Responsable de la Dependencia/ Aspecto a Inspeccionar) </th>
                                            
                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:200px"> INSPECTOR / EXPERTO TECNICO</th>
                                            
                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> FECHA </th>
                                            
                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> HORA INICIO </th>

                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> FECHA CIERRE</th>
                                            
                                            <th class="th-x borderL borderR borderT borderB LetraBold" style="width:120px"> HORA FINAL </th>
                                                                                    
                                        </tr> 
                                        @foreach($dataActividades as $itemActividades)                             
                                        <tr class="line-b" style="background:white;">  
                                                <th class=""> {{$itemActividades->Dependencia}}</th>
                                                <th class=""> {{$itemActividades->Inspeccionado}}</th>
                                                <th class=""> 
                                                    @if($itemActividades->InspectorEmpresa == '' || $itemActividades->InspectorEmpresa == 'NULL')
                                                        {{$itemActividades->InspectorWs}}
                                                    @else
                                                        {{$itemActividades->InspectorEmpresa}}
                                                    @endif
                                                </th>
                                                <th class=""> {{$itemActividades->FechaInicio}}</th>
                                                <th class="">{{$itemActividades->HoraInicio}}</th>
                                                <th class="">{{$itemActividades->FechaCierre}}</th>
                                                <th class="">{{$itemActividades->HoraFinal}}</th>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                    
                            </div><!--end .row -->
                                <!--  BLOQUE DE INFOMACION -->
                            <div class="row">
                                <!-- Titulo -->
                                <div class="col-xs-12 filaFormulario">
                                    <div class="col-xs-12 gris " > OBSERVACIONES  </div>                                  
                                </div>  
                                <div class="col-xs-12 filaFormulario">
                                    <textarea class="inputInforme" placeholder=" campo par observaciones" id="txtConclusiones">
                                        {{$itemAuditoria->Observaciones}}
                                    </textarea>
                                </div>                            
                            </div><!--end .row -->
                            <br>
                            <!--  BLOQUE FIRMAS -->
                            <div class="row">                         
                                <div class="col-xs-12 filaFormulario" >
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
      
                                        <div class="col-xs-12" id="" style="padding:10px">
                                            <br><br>
                                           {{$itemAuditoria->inspectorliderA}}
                                        </div>
                                        <div class="col-xs-12 firstColDivider-top">
                                             <p>INSPECTOR LIDER </p>
                                            Responsable Inspección:
                                        </div>                                        
    
                                    </div>
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <div class="col-xs-12" style="padding:10px">
                                            <br><br>
                                            {{$itemAuditoria->responsableLider}}
                                        </div>
                                        <p class="col-xs-12 firstColDivider-top">INSPECTOR GENERAL / JEFE OFICINA REGIONAL INSPECCIÓN Y CONTROL </p>                                                                         
                                    </div>
                                    <div class="col-xs-4" >
                                        <h5> Firma </h5>
                                        <div class="col-xs-12" style="padding:10px">
                                            <div class="col-xs-12" >
                                                <br><br>
                                                {{$itemAuditoria->NombresResponsable}}    
                                            </div>
                                            <p class="col-xs-12 firstColDivider-top">Nombre Responsable UMA / Proceso / jefatura / Dependencia / Aspecto a Inspeccionar:</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .row -->
                        
                    </div><!--end .section-body -->
                </section>
                
                @endforeach
<p>Pagina 2</p>
            </div><!--end #content-->
            <!-- END CONTENT -->                    
        </div>
    </div>

<style>
.page-break {
    page-break-after: always;
}
</style>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        window.onload = function() {
            //document.getElementsByClassName('style-primary')[0].style.visibility = 'hidden';
            $('.style-primary').remove();
        };
    </script> 

        {!! Form::close() !!}
        @endsection()

    @endsection()

@endsection()

</body>