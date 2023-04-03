{{-- BEGIN MENUBAR --}}
<div id="menubar" class="menubar-inverse ">
	<div class="menubar-fixed-panel">
		<div>
			<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		<div class="expanded">
			<a href="../../html/dashboards/dashboard.html">
				<span class="text-lg text-bold text-primary ">Fuerza Aerea</span>
			</a>
		</div>
	</div>

	{{--1.certificacion
		2. reconocimiento y evaluacion
		3, fomento aeronautico
		4. gestion de recursos --}}

	<div class="menubar-scroll-panel">

		<!-- BEGIN MAIN MENU -->
		<ul id="main-menu" class="gui-controls">

		
			<!-- BEGIN DASHBOARD -->
			<li>
				<a href="{{route('dashboard')}}" class="active">
					<div class="gui-icon"><i class="md md-home"></i></div>
					<span class="title">Pagina Principal</span>
				</a>
			</li><!--end /menu-li -->
			<!-- END DASHBOARD -->
			<!--inicio reparacion -->
			<li class="gui-folder">

				<a>
					<div class="gui-icon"><i class="fa fa-paper-plane"></i></div>
					<span class="title">Certificación de Productos</span>
				</a>

				<ul>
					{{-- Variables --}}
					{{-- <li class="gui-folder">
						<a href="javascript:void(0);" ><span class="title">Variables</span></a>
						<ul>
							
							<li><a href=""><span class="title">Crear Procesos Internos</span></a></li>
							
						</ul>
					</li> --}}

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Información Previa</span></a>
						<ul>
							
							<li><a href="{{route('aeronave.index')}}"><span class="title">Aeronaves</span></a></li>
 
							<li><a href="{{route('unidad.index')}}"><span class="title">Unidades</span></a></li>

							<li><a href="{{route('ata.index')}}"><span class="title">Sistemas ATA</span></a></li>
							<li><a href="{{ route('estadosprograma.index')}}"><span class="title">Estado Programa</span></a></li>
							<li><a href="{{ route('tipoprograma.index')}}"><span class="title">Tipos Programa</span></a></li>

							{{-- <li><a href=""><span class="title">Estados Programa</span></a></li> --}}

							<li><a href="{{route('baseCertificacion.index')}}"><span class="title">Bases Certificación</span></a></li>
						</ul>
					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Productos Aeronauticos</span></a>
						<ul>
							
							<li><a href="{{route('productos.index')}}"><span class="title">Crear Productos</span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Demanda potencial</span></a>

								<ul>
									<li><a href="{{route('demandapotencial.index')}}"><span class="title">Matriz de Impacto </span></a></li>
									<li><a href="{{route('listademandapotencial.index')}}"><span class="title">Listado Demanda Potencial </span></a></li>
								</ul>

							</li>

						</ul>
					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Programas SECAD</span></a>
						<ul>
							<li><a href="{{route('programa.index')}}"><span class="title">Crear Programa</span></a></li>
							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Seguimiento Programas</span></a>
								<ul>
									<li><a href="{{route('listasProyectoEmp.index')}}"><span class="title">Adjuntar documentos</span></a></li>
									<li><a href="{{route('listasProyecto.index')}}"><span class="title">Efectuar seguimiento</span></a></li>
									<li><a href="{{route('informelafr212.index')}}"><span class="title">Formato Seguimiento</span></a></li>
									<li><a href="{{route('obsercavionesProgramafr212.index')}}"><span class="title">Observaciones Seguimiento</span></a></li>
								</ul>
							</li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Matriz de Cumplimiento</span></a>
								<ul>
									<li><a href="{{route('readmocs')}}"><span class="title">Crear MOC</span></a></li>
									<li><a href="{{route('matrizCumplimiento.index')}}"><span class="title">Crear Matriz <br> de Cumplimiento</span></a></li>
									<li><a href="{{route('informeMatrizCumpli.index')}}"><span class="title">Ver Matriz <br> de Cumplimiento</span></a></li>
									{{-- <li><a href=""><span class="title">Informe FCAR</span></a></li> --}}
								</ul>
								

							</li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes Programas</span></a>
								<ul>
									<li><a href="{{route('informeresumenprograma.index')}}"><span class="title">Cuadro Control </span></a></li> {{-- Resumen Programa Acces --}}
									<li><a href="{{route('informeControlObservaciones.index')}}"><span class="title">Seguimiento Observaciones</span></a></li> {{-- Resumen Programa Acces --}}
									{{-- <li><a href=""><span class="title">Tablas de <br> programas total</span></a></li> --}}
									{{-- <li><a href=""><span class="title">Total SECAD</span></a></li> --}}
									{{-- <li><a href=""><span class="title">Reporte Por Estado</span></a></li>
									<li><a href=""><span class="title">Reporte Por Tipo</span></a></li>
									<li><a href=""><span class="title">Reporte Por Empresa</span></a></li>
									<li><a href=""><span class="title">Reporte <br> Por Jefe</span></a></li> --}}
									<li><a href="{{route('vistaProgramas.index')}}"><span class="title">Resumen Tipo / Estado </span></a></li>
									<li><a href="{{route('vistaBalanceo.index')}}"><span class="title">Balanceo Mano<br> de Obra (TDIN)</span></a></li>
									{{-- <li><a href=""><span class="title">Plana <br> Actividades Anual</span></a></li> --}}
									{{-- <li><a href=""><span class="title">Reporte por Acciones <br> de Control (TDIN)</span></a></li> --}}
									<li><a href="{{route('informehistorialprograma.index')}}"><span class="title">Historial Programa</span></a></li>
								</ul>
							</li>
						</ul>

					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Control Maestro de <br>Diseño</span></a>
						<ul>
							{{-- <li><a href="{{route('cmdProgramas.index')}}"><span class="title">Adjuntar documentos</span></a></li> --}}
							<li><a href="{{route('cmdProgramas.index')}}"><span class="title">Control Configuración </span></a></li>

							<li><a href=""><span class="title">Información de Diseno </span></a></li>
						</ul>

					</li>


					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Presupuesto</span></a>
						<ul>
							<li><a href=""><span class="title">Presupuesto por Proyecto <br> (SumaH/H+H/B+H/E)</span></a></li>
							
							<li><a href=""><span class="title">Costo total <br> proyectos por empresa</span></a></li>
							
							<li><a href=""><span class="title">Producción H/H <br> por especialista</span></a></li>
							
							<li><a href=""><span class="title">Producción H/H <br> Por Programa</span></a></li>
							
							<li><a href=""><span class="title">Costo total proyecto <br> SECAD Parametrizado por <br> fecha /Año , estado <br> y tipo de programa <br> (TDIN)</span></a></li>

							<li><a href=""><span class="title">Informe de producción <br> H/H proyecto SECAD</span></a></li>
							
							<li><a href=""><span class="title"></span>Informe Deficit <br> H/H proyecto <br> SECAD</a></li>

							<li><a href=""><span class="title">Presupuesto Anual</span></a></li>
							
							<li><a href=""><span class="title">Sustitución Importaciones</span></a></li>
							
						</ul>
					</li>




				</ul>

			</li>

				
			{{-- END CERTIFICACION DE PRODUCTOS --}}
			
			{{-- @else --}}





			

			{{-- BEGIN RECONOCIMIENTO Y EVALUACION  --}}
			<li class="gui-folder">
				<a>
					<div class="gui-icon"><i class="fa fa-puzzle-piece"></i></div>
					<span class="title">Reconocimiento y Evaluación </span>
				</a>

				<ul>
					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Auditorias</span></a>
						<ul>
							<li><a href="{{route('tipoAuditoria.index')}}"><span class="title">Crear Tipo Auditoria </span></a></li>

							<li><a href="{{route('auditoria.index')}}"><span class="title">Crear Auditorias </span></a></li>

							<li><a href="{{route('planeInspeccion.index')}}"><span class="title">Crear Plan Inspección </span></a></li>

							<li><a href="{{route('anotacion.index')}}"><span class="title">Crear Anotaciones </span></a></li>

							<li><a href="{{route('informeInspeccion.index')}}"><span class="title">Crear Informe Inspección </span></a></li>

							<li><a href="{{route('seguimientoCausaRaiz.index')}}"><span class="title">Seguimiento </span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes </span></a>
								<ul>
									<li><a href="{{route('informeplaninspeccionfinal.index')}}"><span class="title">Plan Inspección Final IC-FR-2 </span></a></li>

									<li><a href="{{route('informeplanmejora.index')}}"><span class="title">Plan de Mejora <br>(Hallazgo) </span></a></li>

									<li><a href="{{route('informeinspeccionicfr03.index')}}"><span class="title">Informe de <br>Inspección IC-FR-3 </span></a></li>

									<li><a href="{{route('informeinspeccionicfr08.index')}}"><span class="title">Informe de <br>Inspección IC-FR-8 </span></a></li>

									<li><a href="{{route('informeseguimientoconsolidado.index')}}"><span class="title">Seguimiento <br>Consolidado </span></a></li>

									<li><a href="{{route('informeanotacionesseguimiento.index')}}"><span class="title">Anotaciones <br>con Seguimiento </span></a></li>

									<li><a href="{{route('informevisitaacompanamiento.index')}}"><span class="title">Visita y <br>Acompañamiento </span></a></li>

									<li class="gui-folder">
									<a href="javascript:void(0);"><span class="title">Anotaciones ODCIN</span></a>
										<ul>
											<li><a href="{{route('cantidadAnotaciones.index')}}"><span class="title">Cantidad <br>Anotaciones</span></a></li>
											<li><a href="{{route('tipoAuditoria.index')}}"><span class="title">Resumen <br>Anotaciones ODCIN</span></a></li>
											<li><a href="{{route('informehallazgosgenerados.index')}}"><span class="title">Hallazgos <br>Generados Inspección</span></a></li>
											<li><a href="{{route('informehallazgosgenerados.index')}}"><span class="title">Anotaciones<br>Parciales</span></a></li>
										</ul>
									</li>

									<li><a href="{{route('apacAuditoria.index')}}"><span class="title">Consolidado <br>AP AC por Auditoria  </span></a></li>

									<li><a href="{{route('nuerepadi.index')}}"><span class="title">Consolidado <br>NUE, REP, ADIC</span></a></li>

									<li><a href="{{route('consolidadoxfuente.index')}}"><span class="title">Consolidado por <br>Fuente </span></a></li>

									<li><a href="{{route('consolidadoXProgramaCalidad.index')}}"><span class="title">Consolidado <br>X Programa Calidad</span></a></li>

									<li><a href="{{route('consolidadoXProgramaTipo.index')}}"><span class="title">Consolidado <br>Programa por Tipo</span></a></li>

									<li><a href="{{route('organizacionXAuditoria.index')}}"><span class="title">Organización por Auditoria</span></a></li>

									<li><a href="{{route('anotacionesXObjeto.index')}}"><span class="title">Anotaciones por Objeto</span></a></li>

									<li><a href="{{route('anotacionesXEstadoParcial.index')}}"><span class="title">Anotaciones Estado Parcial</span></a></li>

								</ul>
							</li>


						</ul>
					</li>



					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Capacitación y Entrenamiento</span></a>
						<ul>
							<li><a href="{{route('evento.index')}}"><span class="title">Crear Evento <br> y Participantes</span></a></li>

							<li><a href="{{route('informeescarapelas.index')}}"><span class="title">Imprimir Escarapela</span></a></li>

							<li class="gui-folder"><a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informeasistencia.index')}}"><span class="title">Reporte de <br> Asistencia</span></a></li>

									<li><a href=""><span class="title">Entrenamientos <br> por año</span></a></li>

									<li><a href=""><span class="title">Participantes <br> por entrenamiento</span></a></li>
								</ul>
							</li>
						</ul>
					</li>


					
				</ul>

				

			</li>
			{{-- END RECONOCIMIENTO Y EVALUACION  --}}
			


			<!-- BEGIN FOMENTO AERONAUTICO -->
			<li class="gui-folder">
				<a>
					<div class="gui-icon"><i class="fa fa-fighter-jet"></i></div>
					<span class="title">Fomento Aeronautico</span>
				</a>
				
				<ul>
					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Empresas</span></a>
						<ul>
							
							<li><a href="{{route('empresa.index')}}"><span class="title">Crear Empresa</span></a></li>

							<li><a href="{{route('informacionproduccion.index')}}"><span class="title">Información <br> producción</span></a></li>

							<li><a href="{{route('informacioncalidad.index')}}"><span class="title">Información Calidad</span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informeempresas.index')}}"><span class="title">Reporte Empresa</span></a></li>

									<li><a href="{{route('informefuncionariosempresa.index')}}"><span class="title">Consulta Funcionarios</span></a></li>

									<li><a href="{{route('informetotalempresas.index')}}"><span class="title">Total Empresas</span></a></li>

									<li><a href="{{route('informeempresas.index')}}"><span class="title">Capacidades y <br> Productos vendidos</span></a></li>

									<li><a href="{{route('informeempresas.index')}}"><span class="title">Informe Capacidad <br> instalada</span></a></li>

									<li><a href="{{route('informeactulizacionempresas.index')}}"><span class="title"> Informe Control de <br>Actualizaciones </span></a></li>

									<li><a href="{{route('informeresumen.index')}}"><span class="title"> Informe Cuadro <br>Resumen </span></a></li>
								</ul>
							</li>


						</ul>
					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Sector Aeronautico</span></a>
						<ul>
							
							{{-- <li><a href=""><span class="title">Oferta o Capacidad</span></a></li> --}}

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									
									<li><a href="{{route('informeempresasxsector.index')}}"><span class="title">Empresas por Sector</span></a></li>

									<li><a href="{{route('informeofertassectoraeronautico.index')}}"><span class="title">Oferta Sector <br> Aeronautico</span></a></li>

									<li><a href="{{route('informecapacidadtotalpais.index')}}"><span class="title">Capacidad Total <br> pais</span></a></li>

									<li><a href="{{route('informecapacidadtotalciudad.index')}}"><span class="title">Total Ofertas por Ciudad</span></a></li>

									{{-- <li><a href="{{route('informetotalofertaspais.index')}}"><span class="title">Total Ofertas por Pais</span></a></li> --}}

									<li><a href="{{route('informeofertasporciudad.index')}}"><span class="title">Ofertas por Ciudad</span></a></li>

									{{-- <li><a href="{{route('informeofertasporcapacidad.index')}}"><span class="title">Ofertas por Capacidad</span></a></li> --}}

								</ul>
							</li>

						</ul>
					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Agremiaciones</span></a>
						<ul>
							<li><a href="{{route('cluster.index')}}"><span class="title">Crear Cluster</span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informeafiliadoscluster.index')}}"><span class="title">Afiliados por <br> cluster</span></a></li>

									<li><a href="{{route('informeresumencluster.index')}}"><span class="title">Resumen Cluster</span></a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Convenios</span></a>
						<ul>
							<li><a href="{{route('convenio.index')}}"><span class="title">Crear Convenios</span></a></li>

							<li><a href="{{route('informeconvenios.index')}}"><span class="title">Informe Convenios</span></a></li>
						</ul>
					</li>

				</ul>
			</li>
			<!-- END FOMENTO AERONAUTICO-->


			

			{{-- BEGIN GESTION RECURSOS --}}
			<li class="gui-folder">
				<a>
					<div class="gui-icon"><i class="fa fa-cogs"></i></div>
					<span class="title">Gestión de Recursos</span>
				</a>

				<ul>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Talento Humano</span></a>
						<ul>
							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Gestion de Conocimiento <br> y Competencia</span></a>
								<ul>
									<li><a href="{{route('especialidades.index')}}"><span class="title">Especialidades FAC</span></a></li>

									<li><a href="{{route('nivelCompetencia.index')}}"><span class="title">Niveles de Competencia</span></a></li>

									<li><a href="{{route('eac.index')}}"><span class="title">Especialidades EAC</span></a></li>
									
									
									<li><a href="{{route('cargos.index')}}"><span class="title">Cargos SECAD</span></a></li>

									{{-- <li><a href=""><span class="title">Perfiles Profesionales</span></a></li> --}}

									<li><a href="{{route('costoshh.index')}}"><span class="title">Valor H/H</span></a></li>
								</ul>
							</li>

							
							<li><a href="{{route('personal.index')}}"><span class="title">Crear Personal</span></a></li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Asignar usuarios</span></a>
								<ul>
									<li><a href="{{route('asignarusuario.index')}}"><span class="title">Personal FAC</span></a></li>

									<li><a href="{{route('asignarusuarioEmpresa.index')}}"><span class="title">Empresas</span></a></li>
								</ul>
							</li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informehojadevida.index')}}"><span class="title">Hoja de vida</span></a></li>

									<li><a href="{{route('informetotalpersonal.index')}}"><span class="title">Informe <br> total Personal</span></a></li>

									<li><a href="{{route('informepersonalareasecad.index')}}"><span class="title">Personal por <br> area SECAD</span></a></li>

									<li><a href="{{route('informepersonalespecialidad.index')}}"><span class="title">Personal por <br> especialidad</span></a></li>

									<li><a href="{{route('informepersonalperfil.index')}}"><span class="title">Personal por perfil</span></a></li>

									<li><a href="{{route('informebalanceomanoobra.index')}}"><span class="title"></span>Balanceo <br> mano de obra</a></li>

									<li><a href="{{route('informecostohh.index')}}"><span class="title"></span>Infome valor H/H</a></li>
								</ul>
							</li>

						</ul>

					</li>

					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Capacitacion Personal SECAD</span></a>
						<ul>
							
							<li><a href="{{route('cursos.index')}}"><span class="title"></span>Crear Formacion Academica</a></li>

							<li><a href=""><span class="title"></span>Capacitación por <br> funcionario</a></li>

							{{-- <li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Cursos Requeridos</span></a>
								<ul>
									<li><a href="{{route('contenidoTematico.index')}}"><span class="title">Escialidades  <br> Aeronautica de  <br> Certificacion EAC</span></a></li>

									<li><a href="{{route('requisitosNivelCompe.index')}}"><span class="title">Niveles de Competencia</span></a></li>

									<li><a href="{{route('requisitosCargo.index')}}"><span class="title">Cargos</span></a></li>

									

									
								</ul>
							</li> --}}

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Plan Capacitación Anual</span></a>
								<ul>
									<li><a href=""><span class="title">Gestionar plan</span></a></li>
								</ul>
							</li>

							<li class="gui-folder">
								<a href="javascript:void(0);"><span class="title">Informes</span></a>
								<ul>
									<li><a href="{{route('informecursosfuncionario.index')}}"><span class="title">Cursos por <br> funcionario</span></a></li>

									<li><a href="{{route('informecurso.index')}}"><span class="title">Informe por Curso</span></a></li>

									<li><a href="{{route('informetotalcursos.index')}}"><span class="title">Informe total Cursos</span></a></li>

									<li><a href="{{route('informeplancapacitacion.index')}}"><span class="title">Informe plan <br> Capacitación </span></a></li>

									<li><a href="{{route('eac.index')}}"><span class="title">Capacitación <br> (TDIN por año por <br> Area por Especialidad ) </span></a></li>
								</ul>
							</li>

						</ul>
					</li>
					
				</ul>

			</li>

			<li class="gui-folder">
				<a>
					<div class="gui-icon"><i class="fa fa-list-alt"></i></div>
					<span class="title">Planeación y Gestión</span>
				</a>

				<ul>
					
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Normograma</span></a>
						<ul>
							<li><a href="{{route('dashboard')}}"><span class="title">Captura de la Información</span></a></li>
							<li><a href="{{route('dashboard')}}"><span class="title">Cuadro Control Reemplazo</span></a></li>
						</ul>
					</li>
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Contratos</span></a>
						<ul>
							<li><a href="{{route('FormularioContrato.index')}}"><span class="title">Crear Contratos 	</span></a></li>
							<li><a href="{{route('InformeContrato.index')}}"><span class="title">Control Contratos</span></a></li>	
							<li><a href="{{route('observaContratos.index')}}"><span class="title">Observaciones Contratos</span></a></li>	
						</ul>
					</li>
					<li class="gui-folder">
						<a href="javascript:void(0);"><span class="title">Plan Certificacion Anual (PCA)</span></a>
						<ul>
							<li><a href="{{route('dashboard')}}"><span class="title">Informe</span></a></li>	
						</ul>
					</li>

					
				</ul>

				

			</li>

<!--fin reparacion-->



		</ul><!--end .main-menu -->
		<!-- END MAIN MENU -->
	</div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
			<!-- END MENUBAR