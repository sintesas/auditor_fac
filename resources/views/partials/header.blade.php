		<!-- BEGIN HEADER-->
		<header id="header" style="background: #0f1f31" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="{{-- {{route('partials.dashboard')}} --}}">
									<span class="text-lg text-bold text-primary">Auditor <strong>Plus</strong></span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="title-fac">
					<div class="col-sm-4 div-img-right" style="">
						<img src="{{asset('img/logo_fac.png')}}">
					</div>
					<div class="col-sm-4">
						
						<h5 class="tittleHeadFAC">FUERZA AÉREA COLOMBIANA</h5>
						{{-- <h5 style="margin: 0;">COMANDO DE APOYO A LA FUERZA</h5> --}}
						{{--<h5 class="subTittleHeadFAC">Jefatura de Operaciones Logisticas / SECAD </h5>--}}
             <h5 class="subTittleHeadFAC">Inspección General Fuerza Aérea Colombiana -IGEFA</h5>
						
					</div>
					<div class="col-sm-4 div-img-left">
						<img src="{{asset('img/logo_secad.png')}}">
					</div>
				</div>
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							{{-- <form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form> --}}
						</li>
						{{-- <li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Today's messages</li>
								<li>
									<a class="alert alert-callout alert-warning" href="javascript:void(0);">
										<strong>Alex Anistor</strong><br/>
										<small>Testing functionality...</small>
									</a>
								</li>
								<li>
									<a class="alert alert-callout alert-info" href="javascript:void(0);">
										<strong>Alicia Adell</strong><br/>
										<small>Reviewing last changes...</small>
									</a>
								</li>
								<li class="dropdown-header">Options</li>
								<li><a href="../../html/pages/login.html">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
								<li><a href="../../html/pages/login.html">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown --> --}}
						
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								{{-- <img src="../../assets/img/avatar1.jpg?1403934956" alt="" /> --}}
								<span class="profile-info">
									
									{{ auth()->user()->name }}
									@if(auth()->user()->IdEmpresa != null)
										<small>Empresa</small>
									@else
										<small>SECAD-FAC</small>
									@endif
									
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Configuración</li>
								{{-- <li><a href="{{ route("perfil.show", $persona->IdPersonal) }}">Mi Perfil</a></li> --}}
								<li><a href="{{ route("perfil.show",auth()->user()->id)}}">Mi Perfil</a></li>
								<!-- <li><a href="../../html/pages/blog/post.html">My blog <span class="badge style-danger pull-right">16</span></a></li>
								<li><a href="../../html/pages/calendar.html">My appointments</a></li> -->
								<li class="divider"></li>
								<!-- <li><a href="../../html/pages/locked.html"><i class="fa fa-fw fa-lock"></i> Lock</a></li> -->


								<div class="panel-footer">
									<form action="{{route('logout')}}" method="POST">
										{{csrf_field()}}
										<button class="btn btn-danger btn-xs btn-block">Cerrar sessión</button>
									</form>
								</div>

								{{-- <li><a href="../../html/pages/login.html"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li> --}}





							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
					{{-- <ul class="header-nav header-nav-toggle">
						<li>
							<a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
								<i class="fa fa-ellipsis-v"></i>
							</a>
						</li>
					</ul><!--end .header-nav-toggle --> --}}
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->