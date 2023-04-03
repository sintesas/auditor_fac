@extends('partials.card')

@extends('layout')

@section('title')
	Informe Seguimiento Consolidado
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			{{-- Informe Seguimiento Consolidado --}}
            {{ Breadcrumbs::render('ver_informeseguimientoconsolidado') }}
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
                    @if(count($informeseguimientoconsolidadoA) == 1)
                    @foreach($informeseguimientoconsolidadoA as $informeseguimientoconsolidadoAR)
                   <div class="section-body">
                        <div class="row encabezadoPlanInspeccion">
                            
                            <!-- titulo Formulario -->
                            <div class="col-xs-12 titulo gris">
                                <h3>HALLAZGOS GENERADOS INSPECCIONES CON HISTORIAL</h3>
                            </div>                              
                        </div>
                        
                        <!-- Primer BLOQUE DE INFOMACION -->
                        <div class="row">
                            <div class="col-xs-12 filaFormulario">
                                <div class="col-xs-4">
                                    CODIGO:
                                </div>
                                <div class="col-xs-4" id="codInforSe">
                                    {{$informeseguimientoconsolidadoAR->Codigo}} 
                                </div>
                            </div>                                     
                        </div>
                        
                        <!-- Segundo BLOQUE DE INFOMACION -->
                        <div class="row">                            
                            <!-- Proceso -->
                            <div class="col-xs-12 filaFormulario table-fixed">
                                <table class="table  table-x">
                                  <tr>
                                        <th class="th-x"> No Anot</th>
                                      
                                        <th class="th-x" > Dependencia </th>
                                      
                                        <th class="th-x" > Proceso </th>
                                      
                                        <th class="th-x" >Tipo Auditoria</th>
                                      
                                        <th class="th-x" > Fecha Auditor </th>
                                      
                                        <th class="th-x" > Descripcion </th>
                                      
                                        <th class="th-x"> Tipo</th>
                                      
                                        <th class="th-x"> Estado </th>
                                      
                                        <th class="th-x" > Fecha Avance</th>
                                        
                                        <th class="th-x" > Visita Control No</th>
                                      
                                        <th class="th-x" > No Causa Raiz</th>
                                      
                                        <th class="th-x" > Accion Seguimiento</th>
                                      
                                        <th class="th-x" > Porcentaje </th>
                                      
                                      
                                      
                                  </tr>
                                      @if(count($informeseguimientoconsolidado) != 0)
                                      @foreach($informeseguimientoconsolidado as $informeseguimientoconsolidadoR)                               
                                    <tr class="line-b">  
                                        <th class="">{{$informeseguimientoconsolidadoR->NoAnota}} </th>
                                        <th class=""></th>
                                        <th class="">{{$informeseguimientoconsolidadoR->NombreProceso}}</th>
                                        <th class="">{{$informeseguimientoconsolidadoR->TipoAuditoria}}</th>
                                        <th class="">{{$informeseguimientoconsolidadoR->Fecha}}</th>
                                        <th class="">{{$informeseguimientoconsolidadoR->DescripcionEvidencia}}</th>
                                        <th class=""></th>
                                        <th class="">{{$informeseguimientoconsolidadoR->NombreEstado}}</th>
                                        <th class="">{{$informeseguimientoconsolidadoR->FechaSeguimiento}}</th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        <th class="">{{$informeseguimientoconsolidadoR->AccionSeguimiento}}</th>
                                        <th class="">{{$informeseguimientoconsolidadoR->Porcentaje}}</th>            
                                  </tr>
                                    @endforeach
                                    @else
                                      <div class="section-body">
                                        <div class="text-center">
                                            <h3>No hay datos para mostrar informe</h3>
                                        </div>
                                      </div>
                                    @endif
                                </table>
                            </div>
                            <!-- FIN Div-->
                        </div><!--end .row -->                                            
                        
                    </div><!--end .section-body -->                   
                </section>
                

                <a href="{{route('informeseguimientoconsolidado.edit', $informeseguimientoconsolidadoR->IdAuditoria) }}" style="width: 150px; font-style: Roboto;" class="btn btn-primary btn-block editbutton pull-left"><span class="fa fa-download">    Descargar PDF</span></a>


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