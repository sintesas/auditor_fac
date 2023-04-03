<?php

// // AUTHENTICATION

use App\Http\Controllers\AnotacionesController;
use App\Http\Controllers\AuditoriaController;

 //Route::get('/pru', 'Auth\RegisterController@pru');
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('/password/reset', 'Auth\ResetPasswordController@reset');



// END AUTHENTICATION

Route::group(['middleware' => ['auth']], function() {

Route::post('editata', 'AtaController@editAta')->name('editAta');
Route::delete('deleteata/{idata}', 'AtaController@deleteAta');
Route::resource('ata', 'AtaController');




// -------------mocs ---------------//
Route::get('/mocs', 'MocController@readMocs')->name('readmocs');
Route::post('addmoc', 'MocController@addMoc')->name('addmoc');
Route::post('editmoc', 'MocController@editMoc')->name('editmoc');
Route::delete('deletemoc/{idmoc}', 'MocController@deleteMoc')->name('deletemoc');
// -------------end mocs ---------------//

Route::resource('empresa', 'EmpresasController');


// -----produccion ----//
Route::post('/storecaracteristicasempresa', 'InformacionProduccionController@storeCaracteristicasEmpresa')->name('storecaracteristicasempresa');

Route::post('/storemercado', 'InformacionProduccionController@storeMercado')->name('storemercado');

Route::delete('deleteproductoffmm/{idproductoffmm}', 'InformacionProduccionController@deleteProductoFfmm');

Route::post('/storeproductosffmm', 'InformacionProduccionController@storeProductosffmm')->name('storeproductosffmm');


Route::delete('deletemateriaprima/{idmateriaprima}', 'InformacionProduccionController@deleteMateriaPrima');

Route::post('/storemateriaprima', 'InformacionProduccionController@storeMateriaPrima')->name('storemateriaprima');

Route::delete('deleteservicioofrecido/{idservicioofrecido}', 'InformacionProduccionController@deleteServicioOfrecido');

Route::post('/storeserviciosofrecidos', 'InformacionProduccionController@storeServiciosOfrecidos')->name('storeserviciosofrecidos');

Route::post('/storetecnologias', 'InformacionProduccionController@storeTecnologias')->name('storetecnologias');

Route::delete('deleteproductoofrecido/{idproductoofrecido}', 'InformacionProduccionController@deleteProductoOfrecido');

Route::post('/storeproductosofrecidos', 'InformacionProduccionController@storeProductosOfrecidos')->name('storeproductosofrecidos');

Route::post('/storeproduccionempresa', 'InformacionProduccionController@storeProduccionEmpresa')->name('storeproduccionempresa');

Route::resource('informacionproduccion', 'InformacionProduccionController');

// -----/produccion ----//


// -----Calidad -----_//

Route::delete('deletegestioncalidadsi/{idsistemacalidad}', 'InformacionCalidadController@deleteGestionCalidadSi');

Route::post('/storegestioncalidadsi', 'InformacionCalidadController@storeGestionCalidadSi')->name('storegestioncalidadsi');

Route::post('/storegestioncalidadno', 'InformacionCalidadController@storeGestionCalidadNo')->name('storegestioncalidadno');

Route::delete('deleteaspectoestrategico/{idaspectoestrategico}', 'InformacionCalidadController@deleteAspectoEstrategico');

Route::post('/storeaspectosestrategicos', 'InformacionCalidadController@storeAspectosEstrategicos')->name('storeaspectosestrategicos');

Route::post('/storeaspectosestrategicos', 'InformacionCalidadController@storeAspectosEstrategicos');

Route::resource('informacioncalidad', 'InformacionCalidadController');
// ----/calidad ------- //





Route::post('editcapacidad', 'CapacidadesEmpresaController@editCapacidad');

Route::delete('deletecapacidad/{idofertacomercial}', 'CapacidadesEmpresaController@deleteCapacidad');

Route::resource('capacidadesEmpresa', 'CapacidadesEmpresaController');





Route::delete('/deletefuncionario/{idfuncionario}', 'FuncionariosEmpresaController@deleteFuncionario')->name('deletefuncionario');

Route::post('/editfuncionario', 'FuncionariosEmpresaController@editFuncionario')->name('editfuncionario');

Route::resource('funcionariosEmpresa', 'FuncionariosEmpresaController');

Route::delete('deletecluster/{idcluster}', 'ClusterController@deleteCluster')->name('deletecluster');

Route::post('editcluster', 'ClusterController@editCluster')->name('editcluster');

Route::resource('cluster', 'ClusterController');

Route::resource('aeronave', 'AeronaveController');

Route::delete('deleteunidad/{idunidad}', 'UnidadController@deleteUnidad');

Route::post('editunidad', 'UnidadController@editUnidad')->name('editunidad');

Route::resource('unidad', 'UnidadController');

Route::resource('convenio', 'ConveniosController');



Route::delete('/deleteparticipante/{idparticipante}', 'ParticipantesEventoController@deleteParticipante')->name('deleteparticipante');

Route::post('/editparticipante', 'ParticipantesEventoController@editParticipante')->name('editparticipante');

Route::resource('participantesevento', 'ParticipantesEventoController');

Route::resource('evento', 'EventoController');




// dependant dropdown with marco legal added

Route::get('anotacion/marcolegal/{id}','AnotacionesController@getMarcoLegal');
Route::get('/Temacatalogacion/{id}', 'AnotacionesController@GetTemaCatalogacion');
Route::resource('anotacion', 'AnotacionesController');
Route::get('/TemacatalogacionR/{id}', 'SeguimientoCausaRaizController@GetTemaCatalogacion');




Route::delete('deleteafiliado/{idafiliado}', 'AfiliadoController@deleteAfiliado')->name('deleteafiliado');

Route::post('editafiliado', 'AfiliadoController@editAfiliado')->name('editafiliado');

Route::resource('afiliado', 'AfiliadoController');

// oferta comercial

Route::post('editoferta', 'OfertasComercialesController@editOferta');
Route::delete('deleteoferta/{idoferta}', 'OfertasComercialesController@deleteOferta');
Route::resource('ofertacomercial', 'OfertasComercialesController');

//

Route::get('fomento.variables.productos_servicios_aeronauticos', ['as' => 'productos_servicios_aeronauticos', 'uses' => 'PagesController@productosyServiciosAeronauticos']);


// Route::resource('criterio', 'CriteriosController');



Route::post('edittipoprograma', 'TipoProgramaController@editTipoPrograma')->name('edittipoprograma');

Route::resource('tipoprograma', 'TipoProgramaController');

Route::post('/storeprograma', 'ProgramaController@storePrograma')->name('storeprograma');

Route::post('/storeespecialidades', 'ProgramaController@storeEspecialidades')->name('storeespecialidades');

Route::post('/storebancos', 'ProgramaController@storeBancos')->name('storebancos');

Route::post('/storeensayos', 'ProgramaController@storeEnsayos')->name('storeensayos');

Route::delete('deleteespecialidad/{idespecialidad}', 'ProgramaController@deleteEspecialidad');

Route::delete('deletehorabanco/{idhorabanco}', 'ProgramaController@deleteHoraBanco');

Route::delete('deletehoraensayo/{idhoraensayo}', 'ProgramaController@deleteHoraEnsayo');

Route::resource('programa', 'ProgramaController');
Route::resource('basesCertiPrograma', 'BasesCertificacionProgramaController');

//Informe LAFR212
Route::resource('obsercavionesfr212', 'ObservacionesLAFR212Controller');
Route::resource('obsercavionesProgramafr212', 'ObservacionesProgramaLAFR212Controller');
Route::resource('informelafr212', 'InformeLAFR212Controller');
Route::resource('informehistorialprograma', 'InformeHistorialProgramaController');
Route::post('pdftodb', 'InformeResumenProgramaController@pdftodb')->name('pdftodb');
Route::resource('informeresumenprograma', 'InformeResumenProgramaController');

Route::resource('observaContratos', 'ObservacionesContratoController');




Route::resource('detalleprograma', 'DetalleProgramaController');
Route::resource('baseCertificacion', 'BaseCertificacionController');


// Route::resource('contenidos_programa', 'ContenidosController');


// Route::get('certificacion.variables.crear_criterio', ['as' => 'crear_criterios', 'uses' => 'PagesController@crearCriterios' ]);


Route::get('certificacion.variables.crear_equipo', ['as' => 'crear_equipo', 'uses' => 'PagesController@crearEquipo']);


// Route::get('certificacion.variables.crear_especialidades_certificacion', ['as' => 'crear_especialidades', 'uses' => 'PagesController@crearEspecialidadesCertificacion']);


Route::get('certificacion.variables.crear_moc', ['as' => 'crear_moc', 'uses' => 'PagesController@crearMoc']);


Route::get('certificacion.variables.crear_procesos_internos', ['as' => 'crear_procesos_internos', 'uses' => 'PagesController@crearProcesosInternos']);

Route::get('certificacion.variables.crear_requerimientos_pdr', ['as' => 'crear_requerimientos_pdr', 'uses' => 'PagesController@crearRequerimientosPdr']);

Route::get('certificacion.variables.crear_sitios', ['as' => 'crear_sitios', 'uses' => 'PagesController@crearSitios']);


Route::delete('deleteestadoprograma/{idestadoprograma}', 'EstadosProgramaController@deleteEstadoPrograma')->name('deleteestadoprograma');

Route::post('editestadoprograma', 'EstadosProgramaController@editEstadoPrograma')->name('editestadoprograma');

Route::resource('estadosprograma', 'EstadosProgramaController');

//****** Certificacion de productos *******
Route::resource('productos', 'ProductosController');
Route::post('pca', 'ProductosController@pca')->name('productos.pca');
Route::get('productos/{id}/notas', 'ProductosController@notas')->name('productos.notas');
Route::get('productos/{id}/aprobarnota', 'ProductosController@aprobarnota')->name('productos.aprobarnota');

Route::resource('PlanCertificacion', 'PlanCertificacionController');
Route::get('PlanCertificacion/{id}/notas', 'PlanCertificacionController@notas')->name('PlanCertificacion.notas');
Route::get('PlanCertificacion/{id}/aprobarnota', 'PlanCertificacionController@aprobarnota')->name('PlanCertificacion.aprobarnota');
Route::get('pdf/{pca}', 'PlanCertificacionController@pdf');

Route::get('pruebashtml/{pca}', 'PlanCertificacionController@pruebahtml');




Route::post('storedemandapotencial', 'DemandaPotencialController@storeDemandaPotencial')->name('storedemandapotencial');

Route::post('storeconsumorotacion', 'DemandaPotencialController@storeConsumoRotacion')->name('storeconsumorotacion');

Route::post('storefactibilidadtecnica', 'DemandaPotencialController@storeFactibilidadTecnica')->name('storefactibilidadtecnica');

Route::post('storeprioridaduma', 'DemandaPotencialController@storePrioridadUma')->name('storeprioridaduma');

Route::post('storevaloracioneconomica', 'DemandaPotencialController@storeValoracionEconomica')->name('storevaloracioneconomica');

Route::post('storevaloraciontecnica', 'DemandaPotencialController@storeValoracionTecnica')->name('storevaloraciontecnica');

Route::post('storeofertaaeronautica', 'DemandaPotencialController@storeOfertaAeronautica')->name('storeofertaaeronautica');


Route::delete('deleteofertaaeronautica/{idofertaaeronautica}', 'DemandaPotencialController@deleteOfertaAeronautica');

Route::delete('deletevaloraciontecnica/{idvaloraciontecnica}', 'DemandaPotencialController@deleteValoracionTecnica');

Route::delete('deletevaloracioneconomica/{idvaloracioneconomica}', 'DemandaPotencialController@deleteValoracionEconomica');

Route::delete('deleteprioridaduma/{idprioridaduma}', 'DemandaPotencialController@deletePrioridadUma');

Route::delete('deletefactibilidadtecnica/{idfactibilidad}', 'DemandaPotencialController@deleteFactibilidadTecnica');

Route::delete('deleteconsumorotacion/{idconsumorotacion}', 'DemandaPotencialController@deleteconsumorotacion');

Route::get('demandapotencial/afiliados/{id}', 'DemandaPotencialController@getAfiliados');

Route::resource('demandapotencial', 'DemandaPotencialController');

Route::get('listademandapotencial/matriz','ListadoDemandaPotencialController@vmatrizDemandaPotencial');
Route::resource('listademandapotencial', 'ListadoDemandaPotencialController');

Route::resource('listadomatrizcumplimiento', 'ListadoMatrizCumplimientoController');



Route::post('/editactividad', 'ActividadesTipoProgController@editActividad')->name('editactividad');


Route::resource('actividadesTipoProg', 'ActividadesTipoProgController');

//Seguimiento SECAD
Route::resource('listasProyecto', 'ListaSeguimientoProgController'); //Lista de Proyectos
Route::resource('seguimientoActividades', 'ListaSeguimientoProgActController'); //Seguimieto Actividades SeguimientoController
Route::resource('seguimiento', 'SeguimientoController'); //Seguimieto
Route::resource('especialistasSeg', 'EspecialistasSeguimientoController'); //Especialistas Seguimiento

//Segumiento Empresas
Route::resource('listasProyectoEmp', 'ListasSegProgEmpController'); //Lista de Proyectos
Route::resource('seguimientoActividadesEmp', 'ListaSegProgActEmpController'); //Seguimieto Actividades SeguimientoController
Route::resource('seguimientoEmp', 'SeguimientoEmpresaController'); //Seguimieto

//Matriz Cumplimiento
Route::resource('matrizCumplimiento', 'matrizCumplimientoController'); //matriz
Route::put('matrizCumplimiento/{id}/update_anexos', 'matrizCumplimientoController@update_anexos')->name('matrizCumplimiento.update_anexos');
Route::put('matrizCumplimiento/{id}/update_aprobacion', 'matrizCumplimientoController@update_aprobacion')->name('matrizCumplimiento.update_aprobacion');
Route::resource('requisitosMatrizCumpli', 'MatrizComplimientoRequisitosProgController'); //Requsitos
Route::resource('evidenciasMocReq', 'EvidenciasMOCReqController'); //Evidencias
Route::resource('evidenciasReq', 'EvidenciaRequisitoController'); //Evidencias req
Route::resource('fcarMoc', 'FCARMocController'); //FCAR MOCs
Route::resource('fcar', 'FCARController'); //FCAR


Route::resource('informeMatrizCumpli', 'InformeMatrizCumplimientoProgramaController'); //Evidencias req

Route::get('vistaProgramas/vistaTipoEstado','VistaProgramasCompController@vProgramas');
Route::resource('vistaProgramas', 'VistaProgramasCompController'); //Evidencias req



Route::get('vistaBalanceo/vistaBalanceoManoObra','VistaBalanceoManoObraController@vBalanceo');
Route::resource('vistaBalanceo', 'VistaBalanceoManoObraController'); //Evidencias req

Route::get('consultahoraslaboradas/info', 'ConsultaHorasLaboradasController@vBalanceo'); //Evidencias req
Route::resource('consultahoraslaboradas', 'ConsultaHorasLaboradasController');



Route::resource('mocsSupartes', 'mocsSubparteController');
Route::resource('evidenciasMocsSupartes', 'evidenciasMocsMatrizController');
Route::resource('aprobacionMocsSupartes', 'aprobacionMocsMatrizController');

//CMD

Route::resource('cmdProgramas', 'cmdProgramasController'); //Seguimieto
Route::resource('cmdProgramasConsultar', 'cmdProgramasConsultarController');
Route::resource('cmdcontrolconfiguracion', 'CMDControlConfiguracionController');
Route::resource('cmdEvidencias', 'CMDEvidenciasController');
Route::resource('cmdEvidenciasCaracteristicas', 'CMDEvidenciasCaracteristicasController');
Route::resource('cmdEvidenciasManufactura', 'CMDEvidenciasManufacturaController');
Route::resource('cmdEvidenciasInspeccion', 'CMDEvidenciasInspeccionConformidadController');
Route::resource('cmdEvidenciasSSA', 'CMDEvidenciasSSAController');
Route::resource('cmdEvidenciasMAC', 'CMDEvidenciasManteniAeronavegaCompController');

//RIESGOS PRODUCTOS POR PROGRAMAS
Route::resource('riesgoprogramaseguimiento', 'RiesgoProgramaSeguimientoController');
Route::resource('riesgoprograma', 'RiesgoProgramaController');
Route::get('riesgoprograma/crear/{id}', 'RiesgoProgramaController@store')->name('riesgoprograma.crear');
Route::post('riesgoprograma/crear', 'RiesgoProgramaController@crear')->name('riesgoprograma.creado');



//****** End Certificacion de productos *******

/*** Fomento Aeronautico ***/
	//*** Informes Empresas *****
	Route::resource('informeempresas', 'InformeEmpresasController');
	Route::resource('informeareasxcoopindustri', 'InformeAreasXCooperacionIndustrialController');
	Route::resource('informefuncionariosempresa', 'InformeFuncionariosEmpresaController');
	Route::resource('informetotalempresas', 'InformeTotalEmpresasController');
	Route::resource('informeactulizacionempresas', 'InformeActualizacionesEmpController');
	Route::resource('informeresumen', 'InformeCuadroEmpresasController', ['only' => ['index', 'store']]);
	Route::resource('informedinamicoempresa', 'InformeDinamicoEmpresaController');


	//*** End Informes Empresas *****

	//*** Informes Fomento Aeronautico *****
	Route::resource('informecapacidadtotalpais', 'InformeCapacidadTotalPaisController');
	Route::resource('informeempresasxsector', 'InformeEmpresasXSectorController');
	Route::resource('informeofertassectoraeronautico', 'InformeOfertasSectorAeronauticoController');
	Route::resource('informecapacidadtotalciudad', 'InformeTotalOfertasxCiudadController');
	Route::resource('informetotalofertaspais', 'InformeTotalOfertasxPaisController');
	Route::resource('informeofertasporciudad', 'InformeOfertasPorCiudadController');
	Route::resource('informeofertasporcapacidad', 'InformeOfertasPorCapacidadController');
	Route::resource('informeControlObservaciones', 'informeControlObservacionesController');
	//*** End Informes Fomento Aeronautico *****

	//*** Informes Agremiaciones *****
	Route::resource('informeafiliadoscluster', 'InformeAfiliadosClusterController');
	Route::resource('informeresumencluster', 'InformeResumenClusterController');
	//*** End Informes Agremiaciones *****

	//*** Informes Convenios *****
	Route::resource('informeconvenios', 'InformeConveniosController');
	//*** End Informes Convenios *****

		//*** Informes Capacitacion Empresas *****
	Route::resource('informeasistencia', 'InformeAsistenciaController');
	Route::resource('informeescarapelas', 'InformeEscarapelasController');
	//*** End Informes Capacitacion Empresas *****

	//Control proyectos 1234abcd
	Route::resource('controlProyectos','ControlProyectosController');
	Route::resource('informeControlProyectos', 'InformeControlProyectosController');
	Route::resource('observacionProyecto', 'ObservacionProyectoController');
	Route::resource('informeObservaciones', 'InformeObservacionesController');


	//Informe H/H Auditorias
/*

	Route::get('vistaBalanceo/vistaBalanceoManoObra','VistaBalanceoManoObraController@vBalanceo');
	Route::resource('vistaBalanceo', 'VistaBalanceoManoObraController'); //Evidencias req
*/

	//Route::get('vistaHHAuditoria/{id}','VistaHHAuditoriasController@vAuditoria');
	//Route::resource('vistaHHAuditoria', 'VistaHHAuditoriasController'); //Evidencias req

	//1234abcd
/*
	Route::get('getHHAuditoria','VistaHHAuditoriasController@vAuditoria');
	Route::resource('vistaBalanceo', 'VistaHHAuditoriasController'); //Evidencias req
*/

 Route::get('nombreAnotacion/{id}','AnotacionesController@MostrarNombre');
	Route::get('getHHAuditoria', array(
		'as' => 'getHHAuditoria',
		'uses' => 'VistaHHAuditoriasController@vAuditoria'
	 ));

	Route::resource('VistaHHAuditorias', 'VistaHHAuditoriasController');

	Route::resource('informeFuncionariosAuditorias', 'informeFuncionariosAuditoriasController');


/*** End Fomento Aeronautico ***/


//*** Auditoria *****
Route::resource('tipoAuditoria', 'TipoAuditoriaController');
Route::resource('criteriosAuditoria', 'CriteriosController');
Route::resource('procesosAuditoria', 'ProcesosController');
Route::resource('auditoria', 'AuditoriaController');
Route::resource('planeInspeccion', 'PlanInspeccionController');
Route::resource('actividadesInspeccion', 'ActividadesInspeccionesController');
Route::resource('informeInspeccion', 'InformeInspeccionController');
Route::resource('seguimientoCausaRaiz', 'SeguimientoCausaRaizController');
Route::resource('actividadesHallazgo', 'ActividadesHallazgoController');
Route::get('sigla/{id}', 'AuditoriaController@siglatipo');
//informe inspeccion obtner cantidad
Route::get('informeInspeccion/totalAnotacionesAll/{id}','InformeInspeccionController@getTotalAnotacionesAll');

Route::resource('causaRaiz', 'CausaRaizController');

	//*** Informes Auditoria *****
	Route::resource('informeplaninspeccionfinal', 'InformePlanInspeccionFinalController');
	Route::resource('informeplanmejora', 'InformePlanMejoraController');
	Route::resource('informeinspeccionicfr03', 'InformeInspeccionIcfr03Controller');
	Route::resource('informeinspeccionicfr08', 'InformeInspeccionIcfr08Controller');
	Route::resource('informeseguimientoconsolidado', 'InformeSeguimientoConsolidadoController');
	Route::resource('informeanotacionesseguimiento', 'InformeAnotacionesSeguimientoController');
	Route::resource('informevisitaacompanamiento', 'InformeVisitaAcompanamientoController');

	Route::resource('informehallazgosgenerados', 'InformeHallazgosGeneradosController');
	//*** End Informes Auditoria *****

Route::resource('APACxAuditoria', 'APACxAuditoriaController');

//Dependent Dropdowns
Route::get('auditoria/funcionarios/{id}','AuditoriaController@getFuncionarios');
Route::get('auditoria/funcionariosLDAP/{id}','AuditoriaController@getFuncionariosLDAP');
Route::get('auditoria/funcionariosAuditoria/{id}','AuditoriaController@getAuditorias');
Route::get('informevisitaacompanamiento/NoVisitas/{id}','InformeVisitaAcompanamientoController@getNoVisita');
Route::get('auditoria/consecutivo/{id}','AuditoriaController@getNextCodeAuditoriaEmpresa');

//Datos Funcionario
Route::get('auditoria/funcionario/{id}','AuditoriaController@getFuncionario');

//Consecutivo ANotaciones X Auditoria
Route::get('anotacion/consecutivo/{id}','AnotacionesController@getNextNotaAuditoria');
Route::get('anotacion/actividadesInspeccion/{id}','AnotacionesController@getActividadesInspeccion');
Route::get('anotacion/estadoAuditoria/{id}','AnotacionesController@getEstadoInsertOrganizacion');
Route::get('anotacion/subProcesosAuditoria/{id}','AnotacionesController@getSubProcesos');
Route::get('anotacion/equipoInspectorEmpresa/{id}','AnotacionesController@getEquipoInspectorEmpresa');
Route::get('anotacion/equipoInspectorLDAP/{id}','AnotacionesController@getEquipoInspectorLDAP');
Route::get('anotacion/CriterioActividad/{id}','AnotacionesController@getCriterioActividad');

//*** Informes Auditoria *****
Route::resource('informeplaninspeccionfinal', 'InformePlanInspeccionFinalController');
Route::resource('informeplanmejora', 'InformePlanMejoraController');
//*** End Informes Auditoria *****

//Datos Auditor auditoria
Route::get('seguimientoCausaRaiz/auditor/{id}','SeguimientoCausaRaizController@getAuditor');
Route::get('seguimientoCausaRaiz/anotaciones/{id}','SeguimientoCausaRaizController@getAnotacionesAuditoria');
Route::get('seguimientoCausaRaiz/causaraiz/{id}','SeguimientoCausaRaizController@getCausaRaizaAnotacion');
Route::get('seguimientoCausaRaiz/tareascausaraiz/{id}','SeguimientoCausaRaizController@getTareasCausasRaiz');
Route::get('exportSeguimientoCausaRaiz', 'SeguimientoCausaRaizController@exportSeguimientos');
Route::get('seguimientoCausaRaiz/AprobarSeguimiento/{id}','SeguimientoCausaRaizController@aprobarSeguimiento');

Route::get('querys', 'AuditoriaController@ejecutarquerys');
Route::resource('/SeguimientoPercentage', 'SeguimientoPercentage', [
    'names' => [
        'create' => 'SeguimientoPercentage'
    ]
]);

//*** Vista Auditorias *****
Route::get('apacAuditoria/vistaAuditorias','APACxAuditoriaController@vAuditorias');
Route::resource('apacAuditoria', 'APACxAuditoriaController');
Route::resource('nuerepadi', 'NUEREPADICController');
Route::get('consolidadoxfuente/vistaAuditorias','ConsolidadoXfuenteController@vAuditorias');
Route::resource('consolidadoxfuente', 'ConsolidadoXfuenteController');
Route::get('consolidadoXProgramaCalidad/vistaAuditorias','ConsolidadoXProgramaCalidadController@vAuditorias');
Route::resource('consolidadoXProgramaCalidad', 'ConsolidadoXProgramaCalidadController');
Route::get('consolidadoXProgramaTipo/vistaAuditorias','ConsolidadoProgramaXTipoController@vAuditorias');
Route::resource('consolidadoXProgramaTipo', 'ConsolidadoProgramaXTipoController');
Route::get('organizacionXAuditoria/vistaAuditorias','OrganizacionXAuditoriaController@vAuditorias');
Route::resource('organizacionXAuditoria', 'OrganizacionXAuditoriaController');
Route::get('anotacionesXObjeto/vistaAuditorias','AnotacionesXObjetoController@vAuditorias');
Route::resource('anotacionesXObjeto', 'AnotacionesXObjetoController');

Route::get('anotacionesXEstadoParcial/vistaAuditorias','AnotacionesEstadoParcialController@vAuditorias');
Route::resource('anotacionesXEstadoParcial', 'AnotacionesEstadoParcialController');

Route::resource('cantidadAnotaciones/vistaAnotaciones', 'InformeCantidadAanotacionesController@vAnotaciones');
Route::resource('cantidadAnotaciones', 'InformeCantidadAanotacionesController');
//*** End Vista Auditorias *****


//*** End Auditoria *****

//**** Nomograma Y Contratos *************/

/**********Informe Control Contratos *****/
Route::resource('InformeContratosA', 'InformeControlContratosController');
Route::resource('InformeContrato', 'ContratosAnualController', ['only' => ['index', 'store'.'show']]);
/*********End Informe Control Contratos***/
/**********Informe Control Contratos *****/
Route::resource('FormularioContrato', 'ControlContratosController');
/*********End Informe Control Contratos***/



/***End Nomograma Y Contratos*** */



/*GestionRecursos*/

/******** Gestion Recurso *******/

Route::resource('especialidades', 'EspecialidadesController');
Route::resource('cargos', 'CargosController');
//Route::resource('perfilesCert', 'PerfilCertificacionController');
Route::resource('eac', 'EACController');
Route::resource('nivelCompetencia', 'NivelCompetenciaController');
Route::resource('costoshh', 'CostosHHController');

Route::resource('asignarusuario', 'AsignarUsuarioController');
Route::resource('asignarusuarioEmpresa', 'AsignarUsuarioEmpresaController');
Route::resource('perfil', 'PerfilController');
Route::get('asignarusuarioEmpresa/funcionariosEmpresa/{id}', 'AsignarUsuarioEmpresaController@getFuncionariosEmpresas');


/*	Cursos Requeridos */

Route::resource('contenidoTematico', 'ContenidoTematicoController');
Route::resource('requisitosNivelCompe', 'RequisitosNivelCompetenciaController');
Route::resource('requisitosCargo', 'RequisitosCargoController');
Route::resource('cursosCargo', 'CursosCargoController');

// *** Roles ****
Route::get('crear_rol', 'RoleController@index')->name('role.index');

//*** Personal *****
Route::resource('personal', 'PersonalController');

	//*** Informes Personal *****
	Route::resource('informehojadevida', 'InformeHojaDeVidaController');
	Route::resource('informetotalpersonal', 'InformeTotalPersonalController');
	Route::resource('informepersonalareasecad', 'InformePersonalAreaSECADController');
	Route::resource('informepersonalespecialidad', 'InformePersonalEspecialidadController');
	Route::resource('informepersonalperfil', 'InformePersonalPerfilController');
	Route::resource('informebalanceomanoobra', 'InformeBalanceoManoObraController');
	Route::resource('informecostohh', 'InformePersonalHHController');
	//*** End Informes Personal  *****
//*** End Personal *****
//*** Capacitacion Personal SECAD *****
Route::resource('cursosformacion', 'CursosFormacionController');
Route::resource('cursos', 'CursosController');
Route::resource('familiares', 'FamiliaresController');
Route::resource('cursosPersonal', 'CursosPersonalController');

//Get
Route::get('personal/Cuerpos/{id}','PersonalController@getCuerposByGrado');

//*** Informes Personal SECAD *****
	Route::resource('informecursosfuncionario', 'InformeCursosFuncionarioController');
	Route::resource('informecurso', 'InformeCursoController');
	Route::resource('informetotalcursos', 'InformeTotalCursosController');
	Route::resource('informeplancapacitacion', 'InformePlanCapacitacionController');
	//*** End Informes Personal SECAD  *****
//*** End Capacitacion Personal SECAD  *****
/*End GestionRecursos*/

// /**** MAIL ****/
// 	Route::get('sendmail', function (){
// 		$data = array('name' => 'Seguimiento Porgama');

// 		Mail::send('emails.mail_seguimiento', $data, function($message){
// 			$message->from('testprojectsysoft@gmail.com', 'Auditor Plus - Seguimiento Porgama');
// 			$message->to('ruben.wilches@symetrixsoft.com')
// 					 ->subject('Se ha adjuntado un nuevo documeto');
// 		});

// 		return "Se ha enviado el email correctamente";
// 	});


Route::match(['get', 'post'], '/scheduler_data', "DashboardController@data");

	/**SubAreasCooperacionIndustrial**/
	Route::get('searchSubArea/{area}', 'AreasCooperacionController@searchSubArea');
	/**filterDinamicCompanyReportCreator**/
	Route::get('filterDinamicCompanyReportCreator', 'InformeDinamicoEmpresaController@filterDinamicCompanyReportCreator');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
