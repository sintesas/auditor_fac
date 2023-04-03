@extends('partials.card_big')
@extends('layout')

@section('title')
	
	Pagina principal

@endsection()


@section('content')
	
	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'personal.store', 'files' =>true)) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			Bienvenido!
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			
			{{-- <div class="row">

				<!-- BEGIN ALERT - REVENUE -->
				<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-info no-margin">
								<strong class="pull-right text-success text-lg"> <i class="md md-swap-vert"></i></strong>
								<strong class="text-xl">$ 32,829</strong><br/>
								<span class="opacity-50">Notficaciones</span>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
				<!-- END ALERT - REVENUE -->

				<!-- BEGIN ALERT - VISITS -->
				<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-warning no-margin">
								<strong class="pull-right text-warning text-lg">0,01% <i class="md md-swap-vert"></i></strong>
								<strong class="text-xl">432,901</strong><br/>
								<span class="opacity-50">Visits</span>
								<div class="stick-bottom-right">
									<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
				<!-- END ALERT - VISITS -->

				<!-- BEGIN ALERT - BOUNCE RATES -->
				<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-danger no-margin">
								<strong class="pull-right text-danger text-lg">0,18% <i class="md md-trending-down"></i></strong>
								<strong class="text-xl">42.90%</strong><br/>
								<span class="opacity-50">Bounce rate</span>
								<div class="stick-bottom-left-right">
									<div class="progress progress-hairline no-margin">
										<div class="progress-bar progress-bar-danger" style="width:43%"></div>
									</div>
								</div>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
				<!-- END ALERT - BOUNCE RATES -->

				<!-- BEGIN ALERT - TIME ON SITE -->
				<div class="col-md-3 col-sm-6">
					<div class="card">
						<div class="card-body no-padding">
							<div class="alert alert-callout alert-success no-margin">
								<h1 class="pull-right text-success"><i class="md md-timer"></i></h1>
								<strong class="text-xl">54 sec.</strong><br/>
								<span class="opacity-50">Avg. time on site</span>
							</div>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
				<!-- END ALERT - TIME ON SITE -->

			</div><!--end .row --> --}}

			<div class="row">
				<div class="col-sm-6">
		            <div class="card">
		                <div class="card-head card-head-sm style-primary">
		                    <header>
		                        Notificaciones
		                    </header>
		                </div><!--end .card-head -->
		                <div class="card-body">
		                   <div class="panel-group">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#collapse0">Proyectos de Certificación</a>
							      </h4>
							    </div>

							    <div id="collapse0" class="panel-collapse collapse">
							      <ul class="list-group">
							      	{{-- @foreach ($programas as $programa)
								        <li class="list-group-item">
								        	<a href="{{route('programa.edit', $programa->IdPrograma) }}">{{$programa->Consecutivo}}</a>
								        </li>
							        @endforeach --}}
							      </ul>							      
							    </div>
							  </div>
							</div> 
		                </div><!--end .card-body -->
		            </div>
	            </div>
	            <div class="col-sm-6">
	            	<div class="card" >
		                <div class="card-head card-head-sm style-primary">
		                    <header>
		                        Mis Proyectos
		                    </header>
		                </div><!--end .card-head -->
		                <div class="card-body">
	                		<div class="panel-group">
							  <div class="panel panel-default">
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#collapse1">Proyectos de Certificación</a>
							      </h4>
							    </div>

							    <div id="collapse1" class="panel-collapse collapse">
							      <ul class="list-group">
							      	@foreach ($programas as $programa)
								        <li class="list-group-item">
								        	<a href="{{route('programa.edit', $programa->IdPrograma) }}">{{$programa->Consecutivo}}</a>
								        </li>
							        @endforeach
							      </ul>							      
							    </div>
							    <div class="panel-heading">
							      <h4 class="panel-title">
							        <a data-toggle="collapse" href="#collapse2">Auditorias</a>
							      </h4>
							    </div>
							    <div id="collapse2" class="panel-collapse collapse">
							      <ul class="list-group">
							        @foreach ($auditorias as $auditoria)
								        <li class="list-group-item">
								        	<a href="{{route('auditoria.edit', $auditoria->IdAuditoria) }}">{{$auditoria->Codigo}}</a>
								        </li>
							        @endforeach
							      </ul>
							    </div>
							  </div>
							</div> 
		                </div>
					</div>
	            </div>
	        </div>
			
			<div class="row">
				<div class="col-sm-12">
		            <div class="card">
		                <div class="card-head card-head-sm style-primary">
		                    <header>
		                        Calendario
		                    </header>
		                </div><!--end .card-head -->
		                <div class="card-body" style="height: 1000px;">
		                	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
								<div class="dhx_cal_navline">
									<div class="dhx_cal_prev_button">&nbsp;</div>
									<div class="dhx_cal_next_button">&nbsp;</div>
									<div class="dhx_cal_today_button"></div>
									<div class="dhx_cal_date"></div>
									<div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
									<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
									<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
									<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
								</div>
								<div class="dhx_cal_header">
								</div>
								<div class="dhx_cal_data">
								</div>
							</div>
		                </div> 
		            </div> 
				</div> 
		    </div> 
        </div>
		
		<script src="{{URL::asset('js/libs/dhtmlxscheduler/dhtmlxscheduler.js')}}"></script>
		<script src="{{URL::asset('js/libs/dhtmlxscheduler/ext/dhtmlxscheduler_minical.js')}}"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				init();
			});

			function init() {
				scheduler.config.multi_day = true;
				var currentTime = new Date();
				
				scheduler.config.xml_date="%Y-%m-%d %H:%i";
				scheduler.init('scheduler_here',new Date(currentTime),"week");
				//scheduler.load("./scheduler_data");

				var dp = new dataProcessor("./scheduler_data");
        		dp.init(scheduler);
			}
			
			function show_minical(){
				if (scheduler.isCalendarVisible())
					scheduler.destroyCalendar();
				else
					scheduler.renderCalendar({
						position:"dhx_minical_icon",
						date:scheduler._date,
						navigation:true,
						handler:function(date,calendar){
							scheduler.setCurrentView(date);
							scheduler.destroyCalendar()
						}
					});
			}
		</script>
		@endsection()

	@endsection()

@endsection('')