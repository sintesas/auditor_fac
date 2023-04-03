@extends('partials.card')

@extends('partials.pdf')

<body style="background-color: white;">
    
@section('content')

	@section('card-content')

		@section('form-tag')

			{{-- {!! Form::model($auditoria, ['route' => ['auditoria.update', $auditoria->IdAuditoria], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}} --}}

		@endsection

		@section('card-title')
			
            Informe Inspección IC FR 08
		@endsection()

		@section('card-content')       

		<div style="padding-bottom: 100px;" class="card-body floating-label">
		<!-- BEGIN BASE-->
		<div id="">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
            <div id="">
                <section>
                    @if(count($informeinspeccionicfr08) == 1)
                    @foreach($informeinspeccionicfr08 as $informeinspeccionicfr08R)
                    <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                            <!-- Logo FARC -->
                            <div class="col-xs-2 logoFac">
                                <?php $image_path = '/img/logoFac.png'; ?>
                                <img src="{{ public_path() . $image_path }}"/>
                            </div>
                            <!-- titulo Formulario -->
                            <div class="col-xs-6 titulo">
                                <h3>SEGUIMIENTO ACCIONES CORRECTIVAS PREVENTIVAS Y DE MEJORA</h3>
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
                                    <li id="codigoEnc">{{$informeinspeccionicfr08R->Codigo}}</li>
                                </ul>
                                <ul style="width: 300px;" class="caracterisicasFormulario none-space">
                                    <li>Tipo de Documento</li>
                                    <li id="documentoEnc">{{$informeinspeccionicfr08R->NombreTipo}}</li>
                                </ul>
                            </div>                      
                        </div><!--end .row -->
                        
                        <!-- FECHA -->
                        <div class="row">
                            
                            <!-- Tipo de Reporte  -->
                            <div class="col-xs-12 fecha">
                                <table style="width:100%" class="table table-bordered table-segumiento">
                                  <tr>
                                        <th> SEGUIMIENTO DE LA AUDITORIA NO:</th>
                                        <td> .... </td>
                                          <th> FECHA DE SEGUIMIENTO:</th>
                                        <td> {{$informeinspeccionicfr08R->FechaAperAudit}} </td>             
                                  </tr>
                                  <tr>
                                        <th> PROCESO AUDITADO:</th>
                                        <td colspan="3"> {{$informeinspeccionicfr08R->NombreAuditoria}} </td>
                                  </tr>
                                    <tr>
                                        <th> RESPONSABLE DEL PROCESO:</th>
                                        <td colspan="3"> {{$informeinspeccionicfr08R->NombreTipo}} </td>
                                  </tr>
                                    <tr>
                                        <th> NOMBRE DEL AUDITOR:</th>
                                        <td colspan="3"> {{$informeinspeccionicfr08R->NombreTipo}} </td>
                                  </tr>
                                </table>
                            </div>
                            <!-- Div Fecha -->                            
                        </div><!--end .row -->                                      
                        <!-- PRIMER BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario">
                                <table style="width:100%" class="table  table-x">
                                  <tr>
                                        <th class="gris th-x"> DESCRIPCION NO CONFORMIDAD / ASPECTO POR MEJORAR</th>
                                      
                                        <th class="gris th-x" > # </th>
                                      
                                        <th class="gris th-x" > ACCION CORRECTIVA / PREVENTIVA / MEJORA</th>
                                      
                                        <th class="gris th-x" > RESPONSABLE DE LA ACCION </th>
                                      
                                        <th class="gris th-x" > FECHA FINALIZACION </th>
                                      
                                        <th class="gris th-x" > SEGUIMIENTO A LA ACCION </th>
                                      
                                        <th class="gris th-x"> % AVANCE</th>
                                      
                                        <th class="gris th-x  line-b" colspan="2" > NO CONF./ ASP.MEJ</th>
                                      
                                        <th class="gris th-x" > FECHA DE SEGUIMIENTO:</th>        
                                  </tr>
                                  <tr class="line-b">  
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"></th>
                                        <th class="gris"> CERRADA</th>
                                        <th class="gris"> ABIERTA</th>
                                        <th class="gris"> </th>
                                  </tr>
                                    <tr class="line-b">  
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class=""> </th>
                                  </tr>
                                </table>
                            </div>
                            <!-- FIN Div-->
                        </div><!--end .row -->
                                                
                        <!-- SEGUNDO BLOQUE FIRMAS -->
                        <div class="row">                         
                                <div class="col-xs-12 firmaFormulario" >
                                    <div class="col-xs-6" >
                                        <h5> Firma </h5>
                                        <p>Grado y Nombre Inspector/ Inspecto Lider / </p>
                                        <div class="col-xs-6">
                                            Responsable Inspección:
                                        </div>
                                        <div class="col-xs-6" id="inspGeFac">
                                            {{$informeinspeccionicfr08R->NombreTipo}}
                                        </div>

                                    </div>
                                    <div class="col-xs-6" >
                                        <h5> Firma Inspector Delegado / Jefe Oficina Control </h5>
                                        <p class="col-xs-6">Quien revisa y avisa el seguimiento <br> Grado y Nombre</p>                                        
                                        <div class="col-xs-6" >
                                            {{$informeinspeccionicfr08R->NombreTipo}}
                                        </div>                                
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