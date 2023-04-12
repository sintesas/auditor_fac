<?php

Breadcrumbs::register('dashboard', function($breadcrumbs){
	$breadcrumbs->push('Inicio', route('dashboard'));
	});

// Roles
Breadcrumbs::register('crear_rol', function($breadcrumbs) {
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Crear Roles', route('role.index'));
});

// empresas
Breadcrumbs::register('empresa', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Empresas', route('empresa.index'));
});

Breadcrumbs::register('crear_empresa', function($breadcrumbs){
	$breadcrumbs->parent('empresa');
	$breadcrumbs->push('Crear Empresa', route('empresa.create'));
});

Breadcrumbs::register('editar_empresa', function($breadcrumbs){
	$breadcrumbs->parent('empresa');
	$breadcrumbs->push('Editar Empresa', route('empresa.edit', 'IdEmpresa'));
});

Breadcrumbs::register('controlempresa', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Control de Actualización de Empresas', route('empresa.index'));
});

Breadcrumbs::register('resumenempresa', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Cuadro Resumen Empresas', route('empresa.index'));
});

Breadcrumbs::register('controlcontratos', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Cuadro Control Contratos', route('InformeContrato.index'));
});

Breadcrumbs::register('formcontrolcontratos', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Crear Contratos', route('FormularioContrato.index'));
});


Breadcrumbs::register('capacidades_empresa', function($breadcrumbs){
	$breadcrumbs->parent('empresa');
	$breadcrumbs->push('capacidades', route('capacidadesEmpresa.show', 'IdEmpresa'));
});

Breadcrumbs::register('funcionarios_empresa', function($breadcrumbs){
	$breadcrumbs->parent('empresa');
	$breadcrumbs->push('funcionarios', route('funcionariosEmpresa.show', 'IdEmpresa'));
});
	//Informes
	//Informe Empresas
	 Breadcrumbs::register('informe_empresas', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Ver Empresas', route('informeempresas.index'));
	 });
	  Breadcrumbs::register('informe_empresa', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Empresas', route('informeempresas.index'));
	 	$breadcrumbs->push('Informe Empresa', route('informeempresas.index'));
	 });
	 //Informe Funcionarios Empresas
	 Breadcrumbs::register('ver_funcionarios_empresas', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Empresas', route('informefuncionariosempresa.index'));
	 });
	 Breadcrumbs::register('funcionarios_empresas', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Empresas', route('informefuncionariosempresa.index'));
	 	$breadcrumbs->push('Informe Funcionarios Empresas', route('informefuncionariosempresa.index'));
	 });
	  //Informe Total Empresas
	 Breadcrumbs::register('ver_informe_total_empresas', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Informe Total Empresas', route('informeempresas.index'));
	 });
	 //Informe Areas x cooperacion industrial
	 Breadcrumbs::register('ver_informe_areas_x_cooperacion_industrial', function($breadcrumbs){
		$breadcrumbs->parent('dashboard');
		$breadcrumbs->push('Informe Áreas x cooperación Industrial', route('informeareasxcoopindustri.index'));
	 });
	 //Informe Dinamico
	 Breadcrumbs::register('ver_informe_dinamico_empresas', function($breadcrumbs){
		$breadcrumbs->parent('dashboard');
		$breadcrumbs->push('Informe Dinámico', route('informedinamicoempresa.index'));
	 });

// SectorAeronautico
	//Informes
	//Ver Empresas X Sector
	 Breadcrumbs::register('ver_empresas_sector', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Informe Empresas por Sector', route('informeempresasxsector.index'));
	 });
	//Empresas X Sector
	 Breadcrumbs::register('empresas_sector', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Ver Empresas por Sector', route('informeempresasxsector.index'));
	 	$breadcrumbs->push('Empresas por Sector', route('informeempresasxsector.index'));
	 });
	 //Informe Ofertas Sector Aeronautico
	 Breadcrumbs::register('informe_ofertas_sector_aeronautico', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Informe Ofertas Sector Aeronautico', route('informeofertassectoraeronautico.index'));
	 });
	 //Informe Capacidad Total Pais
	 Breadcrumbs::register('informe_capacidad_total_pais', function($breadcrumbs){
	 	$breadcrumbs->parent('dashboard');
	 	$breadcrumbs->push('Informe Capacidad Total Pais', route('informecapacidadtotalpais.index'));
	  });
// clusters

 Breadcrumbs::register('clusters', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('clusters', route('cluster.index'));
 });

 Breadcrumbs::register('editar_cluster', function($breadcrumbs){
 	$breadcrumbs->parent('clusters');
 	$breadcrumbs->push('Editar Cluster', route('cluster.edit', 'IdCluster'));
 });

 Breadcrumbs::register('afiliados_cluster', function($breadcrumbs){
 	$breadcrumbs->parent('clusters');
 	$breadcrumbs->push('Afiliados Cluster', route('afiliado.show', 'IdCluster'));
 });



 // Estados programa

 Breadcrumbs::register('estadosprograma', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Estados Programa', route('estadosprograma.index'));
 });


// atas
 Breadcrumbs::register('ata', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Ver ATAS', route('ata.index'));
 });

 Breadcrumbs::register('editar_ata', function($breadcrumbs){
 	$breadcrumbs->parent('ata');
 	$breadcrumbs->push('Editar Ata', route('ata.edit', 'IdATA'));
 });

 // mocs
 Breadcrumbs::register('moc', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('MOC', route('readmocs'));
 });

 Breadcrumbs::register('editar_moc', function($breadcrumbs){
 	$breadcrumbs->parent('moc');
 	$breadcrumbs->push('Editar MOC', route('moc.edit', 'IdMOC'));
 });
// Aeronaves
 Breadcrumbs::register('aeronaves', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Aeronaves', route('aeronave.index'));
 });

 Breadcrumbs::register('editar_aeronave', function($breadcrumbs){
 	$breadcrumbs->parent('aeronaves');
 	$breadcrumbs->push('Editar Aeronave', route('aeronave', 'IdAeronave'));
 });


 // Unidad
 Breadcrumbs::register('unidades', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tablas Unidades', route('unidad.index'));
 });


 Breadcrumbs::register('editar_contrato', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Editar Contratos');
});


// eventos

  Breadcrumbs::register('eventos', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tablas Eventos Capacitación', route('evento.index'));
 });

Breadcrumbs::register('crear_evento', function($breadcrumbs){
 	$breadcrumbs->parent('eventos');
 	$breadcrumbs->push('Crear Evento de Capacitación', route('evento.create'));
 });

 Breadcrumbs::register('editar_evento', function($breadcrumbs){
 	$breadcrumbs->parent('eventos');
 	$breadcrumbs->push('Editar Evento de Capacitación', 'IdEvento');
 });

 Breadcrumbs::register('participantes_evento', function($breadcrumbs){
 	$breadcrumbs->parent('eventos');
 	$breadcrumbs->push('Participantes Evento de Capacitación', route('participantesevento.show', 'IdEvento'));
 });

 //Actividades Hallazgos
 Breadcrumbs::register('actividades_hallazgos', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Actividades', route('actividadesHallazgo.index'));
});

// Anotacion
 Breadcrumbs::register('anotacion', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Anotaciones', route('anotacion.index'));
 });

 Breadcrumbs::register('crear_anotacion', function($breadcrumbs){
 	$breadcrumbs->parent('anotacion');
 	$breadcrumbs->push('Crear nueva Anotación');
 });

 Breadcrumbs::register('editar_anotacion', function($breadcrumbs){
 	$breadcrumbs->parent('anotacion');
 	$breadcrumbs->push('Editar Anotación', 'IdAnotacion');
 });

 Breadcrumbs::register('ver_detalle_anotacion', function($breadcrumbs){
 	$breadcrumbs->parent('anotacion');
 	$breadcrumbs->push('Detalle Anotación', 'IdAnotacion');
 });

 Breadcrumbs::register('editar_causa_raiz', function($breadcrumbs){
	$breadcrumbs->parent('ver_detalle_anotacion');
	$breadcrumbs->push('Editar Causa Raiz', 'IdAnotacion');
});


// Tipo programa

 Breadcrumbs::register('tiposprograma', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tipos de Programa', route('tipoprograma.index'));
 });

Breadcrumbs::register('activ_tiposprograma', function($breadcrumbs){
 	$breadcrumbs->parent('tiposprograma');
 	$breadcrumbs->push('Actividades Tipo de Programa', route('tipoprograma.index'));
 });

// programa
Breadcrumbs::register('programa', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tabla Programas', route('programa.index'));
 });

Breadcrumbs::register('editar_programa', function($breadcrumbs){
 	$breadcrumbs->parent('programa');
 	$breadcrumbs->push('Tabla Programas', route('programa.index'));
 	$breadcrumbs->push('Editar Programa', 'IdPrograma');
 });

 //Riesgos programa producto
 Breadcrumbs::register('riesgo_crear', function($breadcrumbs){
  	$breadcrumbs->parent('dashboard');
  	$breadcrumbs->push('Crear Riesgos - Programas', route('riesgoprograma.create'));
  });

	Breadcrumbs::register('riesgo_ver', function($breadcrumbs){
		 $breadcrumbs->parent('dashboard');
		 $breadcrumbs->push('Ver Riesgos - Programas', route('riesgoprograma.index'));
	 });


/* Lista seguimiento */
//Lista seguiemitno programas
Breadcrumbs::register('programasSeguimiento', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Programas Lista Seguimiento', route('listasProyecto.index'));
 });

Breadcrumbs::register('actividadesSeguimiento', function($breadcrumbs, $IdProg){
 	$breadcrumbs->parent('programasSeguimiento');
 	$breadcrumbs->push('Actividades Lista Seguimiento', route('listasProyecto.show', $IdProg));
 });

Breadcrumbs::register('verseguimiento', function($breadcrumbs, $IdProg, $Ids){
 	$breadcrumbs->parent('actividadesSeguimiento', $IdProg);
 	$breadcrumbs->push('Ver Seguimiento', route('seguimientoActividades.show', $Ids));
 });

Breadcrumbs::register('crearseguimiento', function($breadcrumbs, $IdProg, $Ids){
 	$breadcrumbs->parent('verseguimiento', $IdProg, $Ids);
 	$breadcrumbs->push('Crear Seguimiento', route('seguimiento.index'));
 });


Breadcrumbs::register('especialistassegui', function($breadcrumbs, $IdProg, $Ids){
 	$breadcrumbs->parent('verseguimiento', $IdProg, $Ids);
 	$breadcrumbs->push('Ver Especialistas', route('seguimientoActividades.index'));
 });

Breadcrumbs::register('programasObservaciones212', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Programas Observaciones Informe LAFR212', route('listasProyecto.index'));
 });

Breadcrumbs::register('Observaciones212', function($breadcrumbs){
 	$breadcrumbs->parent('programasObservaciones212');
 	$breadcrumbs->push('Observaciones Informe LAFR212', route('listasProyecto.index'));
 });

// LAFR212
Breadcrumbs::register('programasla', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tabla Programas LAFR212', route('informelafr212.index'));
 });

Breadcrumbs::register('lafr212', function($breadcrumbs){
 	$breadcrumbs->parent('programasla');
 	$breadcrumbs->push('Informe LAFR212', route('informelafr212.index'));
 });


/* Lista seguimiento Empresa*/
//Lista seguiemitno programas
Breadcrumbs::register('programasSeguimientoEmp', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Seguimiento - Programas', route('listasProyectoEmp.index'));
 });

Breadcrumbs::register('actividadesSeguimientoEmp', function($breadcrumbs, $IdProg){
 	$breadcrumbs->parent('programasSeguimientoEmp');
 	$breadcrumbs->push('Seguimiento - Actividades', route('listasProyectoEmp.show', $IdProg));
 });

Breadcrumbs::register('verseguimientoEmp', function($breadcrumbs, $IdProg, $Ids){
 	$breadcrumbs->parent('actividadesSeguimientoEmp', $IdProg);
 	$breadcrumbs->push('Ver Evidencias', route('seguimientoActividadesEmp.show', $Ids));
 });

Breadcrumbs::register('crearseguimientoEmp', function($breadcrumbs, $IdProg, $Ids){
 	$breadcrumbs->parent('verseguimientoEmp', $IdProg, $Ids);
 	$breadcrumbs->push('Crear Seguimiento', route('seguimiento.index'));
 });
/* End Lista seguiemitno programas*/

// Demanda Potencial
Breadcrumbs::register('demandaPotencialImpacto', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Demanda Potencial', route('demandapotencial.index'));
 });



//  detalleprograma
Breadcrumbs::register('detalleprograma', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tabla Programas', route('programa.index'));
 	$breadcrumbs->push('Detalle Programa', route('detalleprograma.index'));
 });

Breadcrumbs::register('demandapotencial', function($breadcrumbs){
 	$breadcrumbs->parent('detalleprograma');
 	$breadcrumbs->push('Demanda Potencial', route('demandapotencial.index'));
 });




// basecertificacion
Breadcrumbs::register('basecertificacion', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Base Certificación', route('baseCertificacion.index'));
 });

Breadcrumbs::register('crearbasecertificacion', function($breadcrumbs){
 	$breadcrumbs->parent('basecertificacion');
 	$breadcrumbs->push('Crear Base Certificación', route('baseCertificacion.create'));
 });


Breadcrumbs::register('editarbasecertificacion', function($breadcrumbs){
 	$breadcrumbs->parent('basecertificacion');
 	$breadcrumbs->push('Editar Base Certificación', route('baseCertificacion.edit', 'IdBaseCertificación'));
 });


//Matriz de Cumplimiento
Breadcrumbs::register('progMatrizCumplimiento', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Matriz Cumplimiento - Programas', route('baseCertificacion.index'));
 });

//CMD
Breadcrumbs::register('progCMD', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('CMD - Programas', route('baseCertificacion.index'));
 });
Breadcrumbs::register('matrizCMD', function($breadcrumbs){
 	$breadcrumbs->parent('progCMD');
 	$breadcrumbs->push('CMD - Matriz', route('baseCertificacion.index'));
 });

// Especialidades Certificación


Breadcrumbs::register('especialidadescertificacion', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Especialidades Certificación', route('especialidades.index'));
 });


Breadcrumbs::register('crearespecialidadecertificacion', function($breadcrumbs){
 	$breadcrumbs->parent('basecertificacion');
 	$breadcrumbs->push('Crear Especialidad Certificación', route('especialidades.create'));
 });

// Tipo de auditoria

Breadcrumbs::register('tipoauditoria', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tipo Inspección', route('tipoAuditoria.index'));
 });

Breadcrumbs::register('editar_tipoAuditoria', function($breadcrumbs){
 	$breadcrumbs->parent('tipoauditoria');
 	$breadcrumbs->push('Editar Tipo Inspección', route('tipoAuditoria.edit', 'IdTipoAuditoria'));
 });


 //Criterios Crear
Breadcrumbs::register('criterios', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Criterios', route('criteriosAuditoria.index'));
});

 //Procesos Crear
 Breadcrumbs::register('procesos', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Procesos', route('procesosAuditoria.index'));
});

//Editar Criterio
Breadcrumbs::register('edit_criterio', function($breadcrumbs){
	$breadcrumbs->parent('criterios');
	$breadcrumbs->push('Editar criterio');
});

//Editar Proceso
Breadcrumbs::register('edit_proceso', function($breadcrumbs){
	$breadcrumbs->parent('procesos');
	$breadcrumbs->push('Editar proceso');
});


// Auditoria

Breadcrumbs::register('auditoria', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Inspecciones', route('auditoria.index'));
 });

Breadcrumbs::register('crear_auditoria', function($breadcrumbs){
 	$breadcrumbs->parent('auditoria');
 	$breadcrumbs->push('Crear Inspección', route('auditoria.create'));
 });

Breadcrumbs::register('editar_auditoria', function($breadcrumbs){
 	$breadcrumbs->parent('auditoria');
 	$breadcrumbs->push('Editar Inspección', route('auditoria.edit', 'IdAuditoria'));
 });


// planeInspeccion
Breadcrumbs::register('planinspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Planes Inspección', route('planeInspeccion.index'));
 });
 // planeInspeccion Detalle
Breadcrumbs::register('planinspeccionDetalle', function($breadcrumbs){
	$breadcrumbs->parent('planinspeccion');
	$breadcrumbs->push('Actividades de Inspección', route('planeInspeccion.index'));
});

Breadcrumbs::register('crear_plan_inspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('planinspeccion');
 	$breadcrumbs->push('Crear Plan Inspección', route('planeInspeccion.create'));
 });


Breadcrumbs::register('editar_plan_inspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('planinspeccion');
 	$breadcrumbs->push('Editar Plan Inspección', route('planeInspeccion.edit', 'IdPlanInspeccion'));
 });

// informe Inspeccion

Breadcrumbs::register('informeinspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informes Inspección', route('informeInspeccion.index'));
 });

Breadcrumbs::register('crear_informe_inspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('informeinspeccion');
 	$breadcrumbs->push('Crear Informe Inspección', route('informeInspeccion.create'));
 });


Breadcrumbs::register('editar_informe_inspeccion', function($breadcrumbs){
 	$breadcrumbs->parent('informeinspeccion');
 	$breadcrumbs->push('Editar Informe Inspección', route('informeInspeccion.edit', 'IdCrearInforme'));
 });

// seguimientoCausaRaiz

Breadcrumbs::register('seguimientocausaraiz', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Seguimientos Causa Raiz', route('seguimientoCausaRaiz.index'));
});

Breadcrumbs::register('seguimientocausaraizporcentaje', function($breadcrumbs){
	$breadcrumbs->parent('seguimientocausaraiz');
	$breadcrumbs->push('Seguimientos Causa Raiz - Actividad', route('seguimientoCausaRaiz.index'));
});

Breadcrumbs::register('crear_seguimientocausaraiz', function($breadcrumbs){
 	$breadcrumbs->parent('seguimientocausaraiz');
 	$breadcrumbs->push('Crear', route('seguimientoCausaRaiz.create'));
 });

Breadcrumbs::register('editar_seguimientocausaraiz', function($breadcrumbs){
 	$breadcrumbs->parent('seguimientocausaraiz');
 	$breadcrumbs->push('Editar Seguimiento Causa Raiz', route('seguimientoCausaRaiz.edit', 'IdSeguimiento'));
 });


// informeplaninspeccionfinal

Breadcrumbs::register('informeplaninspeccionfinal', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Plan Inspección Final', route('informeplaninspeccionfinal.index'));
 });

Breadcrumbs::register('ver_planinspeccionfinal', function($breadcrumbs){
 	$breadcrumbs->parent('informeplaninspeccionfinal');
 	$breadcrumbs->push('Informe Plan Final de Inspección', route('seguimientoCausaRaiz.show', 'informeinspeccion' ));
 });


// informeplanmejora
Breadcrumbs::register('informeplanmejora', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informes Plan MEJORAMIENTO', route('informeplanmejora.index'));
 });

Breadcrumbs::register('ver_planmejora', function($breadcrumbs){
 	$breadcrumbs->parent('informeplanmejora');
 	$breadcrumbs->push('Informe Plan de MEJORAMIENTO (Hallazgos)', route('informeplanmejora.show', 'informemejora'));
 });


// informeinspeccionicfr03

Breadcrumbs::register('informeinspeccionicfr03', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('INFORMES DE INSPECCIÓN', route('informeinspeccionicfr03.index'));
 });

Breadcrumbs::register('ver_informeinspeccionicfr03', function($breadcrumbs){
 	$breadcrumbs->parent('informeinspeccionicfr03');
 	$breadcrumbs->push('INFORME DE INSPECCIÓN', route('informeinspeccionicfr03.show', 'audiorias'));
 });

// informeinspeccionicfr08

Breadcrumbs::register('informeinspeccionicfr08', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('INFORME DE INSPECCIÓN Y SEGUIMIENTO ', route('informeinspeccionicfr08.index'));
 });

Breadcrumbs::register('ver_informeinspeccionicfr09', function($breadcrumbs){
 	$breadcrumbs->parent('informeinspeccionicfr08');
 	$breadcrumbs->push('INFORME DE INSPECCIÓN Y SEGUIMIENTO DE ACCIONES CORRECTIVAS', route('informeinspeccionicfr08.show', 'informeinspeccionicfr08'));
 });

// informeseguimientoconsolidado

Breadcrumbs::register('informeseguimientoconsolidado', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('INFORME ANALISIS DE CAUSAS', route('informeseguimientoconsolidado.index'));
 });

Breadcrumbs::register('ver_informeseguimientoconsolidado', function($breadcrumbs){
 	$breadcrumbs->parent('informeseguimientoconsolidado');
 	$breadcrumbs->push('INFORME ANALISIS DE CAUSAS', route('informeseguimientoconsolidado.show', 'informeseguimientoconsolidado'));
 });

// informeanotacionesseguimiento

Breadcrumbs::register('informeanotacionesseguimiento', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Anotaciones con Seguimiento', route('informeanotacionesseguimiento.index'));
 });

Breadcrumbs::register('ver_informeanotacionesseguimiento', function($breadcrumbs){
 	$breadcrumbs->parent('informeanotacionesseguimiento');
 	$breadcrumbs->push('Informe', route('informeanotacionesseguimiento.show', 'informeseguimientoconsolidado'));
 });

// informevisitaacompanamiento

Breadcrumbs::register('informevisitaacompanamiento', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Visita y Acompañamiento', route('informevisitaacompanamiento.index'));
 });

// pending as no show was found under controller

// Breadcrumbs::register('ver_informevisitaacompanamiento', function($breadcrumbs){
//  	$breadcrumbs->parent('informevisitaacompanamiento');
//  	$breadcrumbs->push('Informe', route('informevisitaacompanamiento.show', 'informeseguimientoconsolidado'));
//  });

// informehallazgosgenerados

Breadcrumbs::register('informehallazgosgenerados', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Hallazgos Generados', route('informehallazgosgenerados.index'));
 });


// APACxAuditoria

Breadcrumbs::register('APACxAuditoria', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Consolidado AP AC x Auditoria', route('APACxAuditoria.index'));
 });

// Informacion produccion

Breadcrumbs::register('informacion_produccion', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Información de Producción', route('informacionproduccion.index') );
});

Breadcrumbs::register('detalle_informacion_produccion', function($breadcrumbs){
	$breadcrumbs->parent('informacion_produccion');
	$breadcrumbs->push('Detalle producción', 'IdEmpresa');
});


// Informacion crearespecialidadecertificacion

Breadcrumbs::register('informacion_calidad', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Información de Calidad', route('informacioncalidad.index'));
});


Breadcrumbs::register('detalle_informacion_calidad', function($breadcrumbs){
	$breadcrumbs->parent('informacion_calidad');
	$breadcrumbs->push('Detalle', 'IdEmpresa');
});

// oferta comercial
Breadcrumbs::register('ofertas_comerciales', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Ofertas Comerciales', route('ofertacomercial.index'));
});


// GestionRecursos

//Especialidades
Breadcrumbs::register('especialidades', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Especialidades FAC', route('especialidades.index'));
 });


Breadcrumbs::register('editar_especialidades', function($breadcrumbs){
 	$breadcrumbs->parent('especialidades');
 	$breadcrumbs->push('Editar Especialidades FAC', route('especialidades.edit', 'IdTipoAuditoria'));
 });


// Capacitacion Programas SECAD
Breadcrumbs::register('cursos', function($breadcrumbs){
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Crear Cursos', route('cursos.index') );
});

Breadcrumbs::register('crear_cursos', function($breadcrumbs){
	$breadcrumbs->parent('cursos');
	$breadcrumbs->push('Crear Cursos', route('cursos.store', 'IdCurso'));
});

Breadcrumbs::register('editar_cursos', function($breadcrumbs){
	$breadcrumbs->parent('cursos');
	$breadcrumbs->push('Editar Cursos', route('cursos.edit', 'IdCurso'));
});


//Especialidades
Breadcrumbs::register('cargos', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Cargos', route('cargos.index'));
 });

Breadcrumbs::register('editar_cargos', function($breadcrumbs){
 	$breadcrumbs->parent('cargos');
 	$breadcrumbs->push('Editar Cargos', route('cargos.edit', 'IdCargo'));
 });


//Perfil Certificacion
Breadcrumbs::register('nivelComp', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Nivel Competencia', route('perfilesCert.index'));
 });

Breadcrumbs::register('editar_nivelComp', function($breadcrumbs){
 	$breadcrumbs->parent('nivelComp');
 	$breadcrumbs->push('Editar Nivel Competencia', route('nivelCompetencia.edit', 'IdNivelCompetencia'));
 });

//Personal
Breadcrumbs::register('personal', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Personal', route('personal.index'));
 });

Breadcrumbs::register('crear_personal', function($breadcrumbs){
 	$breadcrumbs->parent('personal');
 	$breadcrumbs->push('Crear Personal', route('personal.create'));
 });

Breadcrumbs::register('editar_personal', function($breadcrumbs){
 	$breadcrumbs->parent('personal');
 	$breadcrumbs->push('Editar Personal', route('personal.edit', 'IdPersonal'));
 });

//EAC
Breadcrumbs::register('eac', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Escialidades Aeronautica de Certificacion EAC', route('eac.index'));
 });

Breadcrumbs::register('editar_eac', function($breadcrumbs){
 	$breadcrumbs->parent('eac');
 	$breadcrumbs->push('Editar Escialidades Aeronautica de Certificacion EAC', route('eac.edit', 'IdEspecialidadCertificacion'));
 });

//CostosHH
Breadcrumbs::register('costoshh', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Costos H/H', route('costoshh.index'));
 });

Breadcrumbs::register('editar_costoshh', function($breadcrumbs){
 	$breadcrumbs->parent('costoshh');
 	$breadcrumbs->push('Editar Costos H/H', route('costoshh.edit', 'IdGrado'));
 });

//EAC Contenido Tematico
Breadcrumbs::register('eacContenidoTematico', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('EAC Contenido Tematico', route('contenidoTematico.index'));
 });

Breadcrumbs::register('ver_ContenidoTematico', function($breadcrumbs){
 	$breadcrumbs->parent('eacContenidoTematico');
 	$breadcrumbs->push('Contenido Tematico', route('contenidoTematico.show', 'IdEspecialidadCertificacion'));
 });

Breadcrumbs::register('editar_ContenidoTematico', function($breadcrumbs){
 	$breadcrumbs->parent('ver_ContenidoTematico');
 	$breadcrumbs->push('Editar Contenido Tematico', route('contenidoTematico.edit', 'IdContenidoTematico'));
 });

//Requisitos Niveles Competencia
Breadcrumbs::register('nivelesComp', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Niveles Competencia', route('requisitosNivelCompe.index'));
 });

Breadcrumbs::register('ver_requisitosnilves', function($breadcrumbs){
 	$breadcrumbs->parent('nivelesComp');
 	$breadcrumbs->push('Requisitos Niveles Competencia', route('requisitosNivelCompe.show', 'IdNivelCompetencia'));
 });

Breadcrumbs::register('editar_requisitosnilves', function($breadcrumbs){
 	$breadcrumbs->parent('ver_requisitosnilves');
 	$breadcrumbs->push('Editar Requisitos Niveles Competencia', route('requisitosNivelCompe.edit', 'IdRequisitosCompetencia'));
 });

//Requisitos Cargos
Breadcrumbs::register('cargosReq', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Cargos', route('requisitosCargo.index'));
 });

Breadcrumbs::register('ver_cargosReq', function($breadcrumbs){
 	$breadcrumbs->parent('cargosReq');
 	$breadcrumbs->push('Requisitos Cargos', route('requisitosCargo.show', 'IdCargo'));
 });

Breadcrumbs::register('ver_cursoscargos', function($breadcrumbs){
 	$breadcrumbs->parent('cargosReq');
 	$breadcrumbs->push('Ver Cursos Cargos', route('requisitosCargo.edit', 'IdRequisitosCargo'));
 });


//Informes
//Hoja de vida
Breadcrumbs::register('informehojadevida', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Hoja de Vida', route('informehojadevida.index'));
 });

Breadcrumbs::register('ver_informehojadevida', function($breadcrumbs){
 	$breadcrumbs->parent('informehojadevida');
 	$breadcrumbs->push('Informe Hoja de Vida', route('informehojadevida.show', 'informehojadevida'));
 });
//TotalPersonal
Breadcrumbs::register('informetotalpersonal', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Total Personal', route('informetotalpersonal.index'));
 });

//Personal SECAD
Breadcrumbs::register('informepersonalareasecad', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Personal SECAD', route('informepersonalareasecad.index'));
 });

Breadcrumbs::register('ver_informepersonalareasecad', function($breadcrumbs){
 	$breadcrumbs->parent('informepersonalareasecad');
 	$breadcrumbs->push('Informe Personal SECAD', route('informepersonalareasecad.show', 'informepersonalareasecad'));
 });

//Personal Especialidad
Breadcrumbs::register('informepersonalespecialidad', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Personal Especialidad', route('informepersonalespecialidad.index'));
 });

Breadcrumbs::register('ver_informepersonalespecialidad', function($breadcrumbs){
 	$breadcrumbs->parent('informepersonalespecialidad');
 	$breadcrumbs->push('Informe Personal Especialidad', route('informepersonalespecialidad.show', 'informepersonalespecialidad'));
 });

//Personal Perfil
Breadcrumbs::register('informepersonalperfil', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Personal Perfil', route('informepersonalperfil.index'));
 });

Breadcrumbs::register('ver_informepersonalperfil', function($breadcrumbs){
 	$breadcrumbs->parent('informepersonalperfil');
 	$breadcrumbs->push('Informe Personal Perfil', route('informepersonalperfil.show', 'informepersonalperfil'));
 });

//Personal Personal H/H
Breadcrumbs::register('informecostohh', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Costo H/H', route('informecostohh.index'));
 });

//Personal Cursos Funcionario
Breadcrumbs::register('informecursosfuncionario', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Cursos Funcionario', route('informecursosfuncionario.index'));
 });

Breadcrumbs::register('ver_informecursosfuncionario', function($breadcrumbs){
 	$breadcrumbs->parent('informecursosfuncionario');
 	$breadcrumbs->push('Informe Cursos Funcionario', route('informecursosfuncionario.show', 'informecursosfuncionario'));
 });

//Personal Cursos
Breadcrumbs::register('informecurso', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Cursos ', route('informecurso.index'));
 });

Breadcrumbs::register('ver_informecurso', function($breadcrumbs){
 	$breadcrumbs->parent('informecurso');
 	$breadcrumbs->push('Informe Cursos ', route('informecurso.show', 'informecurso'));
 });

//Personal Familiares
Breadcrumbs::register('familiares', function($breadcrumbs){
 	$breadcrumbs->parent('personal');
 	$breadcrumbs->push('Familiares', route('familiares.index'));
 });

Breadcrumbs::register('editar_familiares', function($breadcrumbs){
 	$breadcrumbs->parent('familiares');
 	$breadcrumbs->push('Editar Familiares', route('familiares.edit', 'IdFamiliar'));
 });

//Personal Cursos
Breadcrumbs::register('cursosPersonal', function($breadcrumbs){
 	$breadcrumbs->parent('personal');
 	$breadcrumbs->push('Cursos', route('cursosPersonal.index'));
 });


//Personal Total Cursos
Breadcrumbs::register('informetotalcursos', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Informe Total Cursos ', route('informetotalcursos.index'));
 });

//Productos
Breadcrumbs::register('productos', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Productos Aeronauticos', route('productos.index'));
 });

Breadcrumbs::register('crear_productos', function($breadcrumbs){
 	$breadcrumbs->parent('productos');
 	$breadcrumbs->push('Crear Productos Aeronauticos', route('productos.create'));
 });

Breadcrumbs::register('editar_productos', function($breadcrumbs){
 	$breadcrumbs->parent('productos');
 	$breadcrumbs->push('Editar Productos Aeronauticos', route('productos.create'));
 });
 Breadcrumbs::register('notas_productos', function($breadcrumbs){
  	$breadcrumbs->parent('productos');
  	$breadcrumbs->push('Notas Producto Aeronautico', route('productos.index'));
  });

 //PCA
 Breadcrumbs::register('pca', function($breadcrumbs){
  	$breadcrumbs->parent('dashboard');
  	$breadcrumbs->push('Plan Certificación Anual', route('PlanCertificacion.index'));
  });

 Breadcrumbs::register('crear_pca', function($breadcrumbs){
  	$breadcrumbs->parent('pca');
  	$breadcrumbs->push('Crear Plan Certificación Anual', route('PlanCertificacion.create'));
  });

 Breadcrumbs::register('editar_pca', function($breadcrumbs){
  	$breadcrumbs->parent('pca');
  	$breadcrumbs->push('Editar Plan Certificación Anual', route('PlanCertificacion.create'));
  });

	Breadcrumbs::register('notas_pca', function($breadcrumbs){
		 $breadcrumbs->parent('pca');
		 $breadcrumbs->push('Notas Plan Certificación Anual', route('PlanCertificacion.index'));
	 });


Breadcrumbs::register('lista_personal', function($breadcrumbs){
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Lista Personal');
});

Breadcrumbs::register('asignar_usuario', function($breadcrumbs){
    $breadcrumbs->parent('lista_personal');
    $breadcrumbs->push('Asignar Usuario', route('asignarusuario.create'));
});


Breadcrumbs::register('balanceo', function($breadcrumbs){
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Balanceo Mano de Obra');
});

Breadcrumbs::register('consultahoraslaborales', function($breadcrumbs){
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('H/H ingresadas(TDIN)');
});

// Convenios

 Breadcrumbs::register('convenios', function($breadcrumbs){
 	$breadcrumbs->parent('dashboard');
 	$breadcrumbs->push('Tablas Convenios', route('convenio.index'));
 });

 Breadcrumbs::register('editar_convenio', function($breadcrumbs){
 	$breadcrumbs->parent('convenios');
 	$breadcrumbs->push('Editar Convenios');
 });


//Control Proyecto Fomento Aeronautico 1234abcd
Breadcrumbs::register('controlProyectos', function($breadcrumbs){
 $breadcrumbs->parent('dashboard');
 $breadcrumbs->push('Crear Proyectos', route('controlProyectos.index'));
});

//Editar proyecto
 Breadcrumbs::register('edit', function($breadcrumbs){
 	$breadcrumbs->parent('controlProyectos');
 	$breadcrumbs->push('Editar Proyecto');
 });

  // Estados programa

Breadcrumbs::register('informeProyectos', function($breadcrumbs){
$breadcrumbs->parent('dashboard');
$breadcrumbs->push('Informe Proyectos', route('informeControlProyectos.index'));
});

 //observaciones proyecto
  Breadcrumbs::register('observacionesControlProyectos', function($breadcrumbs){
  	$breadcrumbs->parent('controlProyectos');
  	$breadcrumbs->push('Crear Observación del Proyecto');
  });

	Breadcrumbs::register('observacionesControlProyectosEdit', function($breadcrumbs){
  	$breadcrumbs->parent('observacionesControlProyectos');
  	$breadcrumbs->push('Editar Observación');
  });

	//Informe Observaciones
	Breadcrumbs::register('informeObservacionesProyectos', function($breadcrumbs){
	 $breadcrumbs->parent('dashboard');
	 $breadcrumbs->push('Historial de Observaciones', route('informeObservaciones.index'));
	});

	Breadcrumbs::register('informeObservacionesProyectosVisual', function($breadcrumbs){
	 $breadcrumbs->parent('informeObservacionesProyectos');
	 $breadcrumbs->push('Informe Observaciones', route('informeObservaciones.index'));
	});
 //Informes Fomento Aeronautico
 Breadcrumbs::register('informeControlProyectos', function ($breadcrumbs) {
     $breadcrumbs->parent('dashboard');
     $breadcrumbs->push('Informes Proyectos', route('informeControlProyectos.index'));
 });

 //Informe funcionarios Auditorias
 Breadcrumbs::register('informeFuncionarioAuditoriaVer', function ($breadcrumbs) {
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Informes Funcionarios por Auditorias', route('informeFuncionariosAuditorias.index'));
});
//informe Visual
Breadcrumbs::register('informeFuncionarioAuditoriaVisual', function ($breadcrumbs) {
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Informe H/H Auditorias por funcionario', route('informeFuncionariosAuditorias.index'));
});

//JDT
//Parametrizacion
Breadcrumbs::register('listas_dinamicas', function ($breadcrumbs) {
	$breadcrumbs->parent('dashboard');
	$breadcrumbs->push('Listas Dinamicas', route('listas_dinamicas.index'));
});

?>
