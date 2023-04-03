<?php

namespace App\Exports;

use App\SeguimientoCausaRaiz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\Auth;

use DB;

class SeguimientosExport implements FromCollection,  WithHeadings
{

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Actividad - Porcentaje',
            'Anotación - Porcentaje',
            'Auditoria - Código',
            'Anotación - Código',
            'Anotación - Tipo',
            'Anotación - Es una',
            'Anotación - Fecha',
            'Anotación - Fuente',
            'Anotación - Clase',
            'Anotación - Descripción',
            'Anotación - Responsables Corrección',
            'Anotación - Responsables Plan Mejoramiento',
            'Anotación - Responsables Hallazgos',
            'Anotación - Responsables Seguimiento',
            //'Causa Raíz - Fecha Apertura',
            'Causa Raíz - Causa',
            'Causa Raíz - Efecto',
            'Causa Raíz - Metodo',
            'Causa Raíz - Aspecto',
            'Causa Raíz - Priorización',
            'Causa Raíz - Falencia',
            'Tareas Causa Raíz - Actividad ',
            'Tareas Causa Raíz - Entregable ',
            'Tareas Causa Raíz - Cantidad Entregable ',
            'Tareas Causa Raíz - Fecha Inicio ',
            'Tareas Causa Raíz - Fecha Final ',
            'Tareas Causa Raíz - Responsable ',
            'Seguimiento - Acción ',
            'Seguimiento - Fecha ',
            'Seguimiento - Fortalezas ',
            'Seguimiento - Limitaciones ',
            'Seguimiento - Anexos ',
            'Auditoria - Nombre ',
            'Auditoria - Fecha Inicio ',
            'Auditoria - Organización Auditada ',
            'Auditoria - Organización que Audita ',
            'Auditoria - Inspector Lider ',
            'Auditoria - Auditor Lider ',
            'Auditoria - Equipo Inspector ',
            'Auditoria - Expertos Técnicos ',
            'Auditoria - Criterios ',
            'Auditoria - Nombre ',
            'Auditoria - Tipo ',
            'Auditoria - Acción ',
            'Auditoria - Lugar ',
            'Auditoria - Objeto ',
            'Auditoria - Fecha Apertura ',
            'Auditoria - Hora Inicio ',
            'Auditoria - Fecha Termino ',
            'Auditoria - Hora Termino ',
            'Auditoria - Alcance ',
            'Auditoria - Observaciones ',
            'Plan Inspección - Plan ',
            'Plan Inspección - Fecha ',
            'Plan Inspección - Actividad ',
            'Plan Inspección - Lugar ',
            'Plan Inspección - Inspeccionado ',
            'Plan Inspección - Fecha Inicio ',
            'Plan Inspección - Fecha Final ',
            'Plan Inspección - Hora Inicio ',
            'Plan Inspección - Hora Final '
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('AU_Reg_CausasRaizTareas as tareaCausa')
            ->select(DB::raw(
                "distinct
                --Porcentajes totales
                IsNULL(seguimiento.Porcentaje,0) as porcentaje_actividad,

				IsNULL((select CAST((sum(rs.Porcentaje)/COUNT(rcr.IdAnotacion)) AS INT) from AU_Reg_Anotaciones as ra inner join AU_Reg_CausasRaiz as rcr on rcr.IdAnotacion = ra.IdAnotacion inner join AU_Reg_CausasRaizTareas as rcrt on rcrt.IdCausaRaiz = rcr.IdCausaRaiz left join AU_Reg_Seguimiento as rs on rs.IdTareaCausa = rcrt.IdTarea where rcr.IdAnotacion = causa_seguimiento.IdAnotacion ),0)

                 as porcentaje_total,

                auditoria.Codigo as CodigoAuditoria,

                --Anotaciones
                anotaciones.NoAnota as CodigoAnotacion, tipoAnotacion.Anotacion as TipoAnotacion,
                case anotaciones.IdEnUnaAnotacion when 1 then 'Nueva' when 2 then 'Repetida' when 3 then 'Adicional' end as EsUnaAnotacion,
                anotaciones.Fecha as FechaAnotacion, fuente.Fuente as FuenteAnotacion,claseAnotacion.Nombre as ClaseAnotacion,
                anotaciones.DescripcionEvidencia as DescripcionAnotacion,


                isnull( STUFF(
                    (SELECT  ' | '  + dependenciaCorreccion.Nombre
                    FROM  AU_Reg_AnotacionesResponsables as responsableCorreccion
                    INNER JOIN AU_Reg_DependenciasLDAP as dependenciaCorreccion
                    ON dependenciaCorreccion.IdDependencia = responsableCorreccion.IdResponsableCorreccion
                    WHERE responsableCorreccion.IdAnotacion = anotaciones.IdAnotacion
                    FOR XML PATH('')),
                    1, 2, ' '), 'N/A') As ResponsablesCorreccionAnotaciones,

                isnull( STUFF(
                    (SELECT  ' | '  + dependenciaCorreccion.Nombre
                    FROM  AU_Reg_AnotacionesResponsables as responsableCorreccion
                    INNER JOIN AU_Reg_DependenciasLDAP as dependenciaCorreccion
                    ON dependenciaCorreccion.IdDependencia = responsableCorreccion.IdResponsableMejoramiento
                    WHERE responsableCorreccion.IdAnotacion = anotaciones.IdAnotacion
                    FOR XML PATH('')),
                    1, 2, ' '), 'N/A') As ResponsablesPlanMejoramientoAnotaciones,

                isnull( STUFF(
                    (SELECT  ' | '  + responsablesldap.Name
                    FROM  AU_Reg_AnotacionesResponsables as responsableCorreccion
                    INNER JOIN AU_Reg_usersLDAP as responsablesldap
                    ON responsablesldap.IdUserLDAP = responsableCorreccion.IdResponsableHallazgo
                    WHERE responsableCorreccion.IdAnotacion = anotaciones.IdAnotacion
                    FOR XML PATH('')),
                    1, 2, ' '), 'N/A') As ResponsablesHallazgoAnotaciones,

                isnull( STUFF(
                    (SELECT  ' | '  + responsablesldap.Name
                    FROM  AU_Reg_AnotacionesResponsables as responsableCorreccion
                    INNER JOIN AU_Reg_usersLDAP as responsablesldap
                    ON responsablesldap.IdUserLDAP = responsableCorreccion.IdResponsableSeguimiento
                    WHERE responsableCorreccion.IdAnotacion = anotaciones.IdAnotacion
                    FOR XML PATH('')),
                    1, 2, ' '), 'N/A') As ResponsablesSeguimientoAnotaciones,

                --Causas Raiz
                causa_seguimiento.CausaRaiz, isnull(causa_seguimiento.Efecto, 'N/A') as EfectoCausaRaiz, causa1.Metodo as MetodoCausaRaiz ,
                apecto5m.Aspecto as AspectoCausaRaiz, causa_seguimiento.Priorizacion as PriorizacionCausaRaiz,
                falenciaCausa.NombreFalencia as FalenciaCausa,

                --Actividades Causa Raiz
                tareaCausa.AccionTarea as ActividadCausaRaiz, tareaCausa.Entregable as EntregableActividadCausa,
                tareaCausa.CantidadEntregable as CantidadEntregableActividadCausa, tareaCausa.FechaInicio as FechaInicioActividadCausa,
                tareaCausa.FechaFinal as FechaFinalActividadCausa, userldapActividad.Name as ResponsableActividadCausa,

                --Seguimiento

                seguimiento.AccionSeguimiento , seguimiento.FechaSeguimiento,
                ISNULL(seguimiento.Fortalezas, 'N/A') AS FortalezasSeguimiento, ISNULL(seguimiento.Limitaciones, 'N/A') AS LimitacionesSeguimiento,

                isnull( STUFF(
                    (SELECT  ' | '  + fileSeguimiento.FileNameDoc
                    FROM  AU_Reg_SeguimientoFiles as fileSeguimiento
                    WHERE fileSeguimiento.IdSeguimiento = seguimiento.IdSeguimiento
                    FOR XML PATH('')),
                    1, 2, ' '), 'N/A') As AnexosSeguimientos
                ,
                auditoria.NombreAuditoria, auditoria.FechaInicio as FechaInicioAuditoria,
                    empresaAuditada.NombreEmpresa as OrganizacionAuditada, empresaAudita.NombreEmpresa as OrganizacionQueAudita,
                    userInspector.Name as InspectorLiderAuditoria, userAditor.Name as AuditorLiderAuditoria,
                    STUFF(
                    (SELECT  ' | '  + userWS.Name
                    FROM AU_Reg_Auditorias as auditoria
                    INNER JOIN AU_Reg_EquipoInspectorAsociados as userEquipo ON auditoria.IdAuditoria = userEquipo.IdAuditoria
                    INNER JOIN AU_Reg_usersLDAP userWS on userWS.IdUserLDAP = userEquipo.IdEquipoInspectorWS
                    WHERE auditoria.IdAuditoria = seguimiento.IdAuditoria
                    FOR XML PATH('')),
                    1, 2, ' ') As EquipoInspector, CONVERT(varchar, auditoria.ExpertosTecnicos) as ExpertosTecnicos,

                STUFF(
                    (SELECT ' | ' + criteriosAuditoria.Norma
                    FROM AU_Reg_CriteriosAuditorias as criteriosAuditoria
                    INNER JOIN AU_Reg_CriteriosAsociados as criteriosAsociados
                    ON criteriosAsociados.IdCriterio = criteriosAuditoria.IdCriterio
                    where auditoria.IdAuditoria = criteriosAsociados.IdAuditoria
                    FOR XML PATH('')),
                    1 , 2 ,'') AS CriteriosAuditoria,

                    responsableAuditoria.Nombres, tipoAuditoria.TipoAuditoria, auditoria.Accion as AccionAuditoria, isnull(auditoria.Lugar,'N/A') as LugarAuditoria,
                    isnull(auditoria.Objeto,'N/A') AS ObjetoAuditoria, auditoria.FechaAperAudit, auditoria.HoraIni as HoraInicioAuditoria, auditoria.FechaTermino as FechaTerminoAuditoria,
                    auditoria.HoraTermi as HoraTermiAuditoria, auditoria.Alcance as AlcanceAuditoria, auditoria.Observaciones as ObservacionesAuditoria,

                    --Plan Inspección

                STUFF(
                    (SELECT ' | ' + planInspeccion.Observaciones
                    FROM AU_Reg_PlanesInspeccion as planInspeccion
                    where auditoria.IdAuditoria = planInspeccion.IdAuditoria
                    FOR XML PATH('')),
                    1 , 2 ,'') AS PlanesInspecciones,

                    planInspeccion.Fecha as FechaPlanInspeccion, actividadesInspeccion.Actividades as ActividadInspeccion,
                    isnull(actividadesInspeccion.Lugar, 'N/A') as LugarActividadInspeccion, userInspeccionado.Name as InspeccionadoActividadInspeccion,
                    actividadesInspeccion.FechaInicio as FechaInicioActividadInspeccion, actividadesInspeccion.FechaCierre as FechaFinalActividadInspeccion,
                    actividadesInspeccion.HoraInicio as HoraInicioActividadInspeccion, actividadesInspeccion.HoraFinal as HoraFinalActividadInspeccion

				"
            ))
            ->join('AU_Reg_CausasRaiz as causa_seguimiento','causa_seguimiento.IdCausaRaiz', '=', DB::raw(
                    " tareaCausa.IdCausaRaiz
                    INNER JOIN AU_Reg_Anotaciones as anotaciones
                    ON anotaciones.IdAnotacion = causa_seguimiento.IdAnotacion


					 left JOIN AU_Reg_Seguimiento as seguimiento
                    ON tareaCausa.IdTarea = seguimiento.IdTareaCausa

					left join AU_Reg_Auditorias as auditoria
					on auditoria.IdAuditoria = anotaciones.IdAuditoria

                    INNER JOIN AU_Reg_Empresas as empresaAuditada
                    ON empresaAuditada.IdEmpresa = auditoria.IdEmpresa
                    LEFT JOIN AU_Reg_Empresas as empresaAudita
                    ON empresaAudita.IdEmpresa = auditoria.IdEmpresaAudita
                    INNER JOIN AU_Reg_usersLDAP as userInspector
                    ON userInspector.IdUserLDAP = auditoria.IdPersonalInsp
                    INNER JOIN AU_Reg_usersLDAP as userAditor
                    ON userAditor.IdUserLDAP = auditoria.IdPersonalAudi
                    LEFT JOIN AU_Reg_FuncionariosEmpresa as responsableAuditoria
                    ON responsableAuditoria.IdFuncionarioEmpresa = auditoria.IdFuncionarioEmpresa
                    LEFT JOIN AU_Mst_TiposAuditoria as tipoAuditoria
                    ON tipoAuditoria.IdTipoAuditoria = auditoria.IdTipoAuditoria
                    LEFT JOIN AU_Reg_PlanesInspeccion planInspeccion
                    ON planinspeccion.IdAuditoria = auditoria.IdAuditoria

                    LEFT JOIN AU_Reg_ActividadesPlanInspeccion as actividadesInspeccion
                    ON actividadesInspeccion.IdActividadPlanIns = anotaciones.IdActividadPlanInspeccion
                    LEFT JOIN AU_Reg_usersLDAP userInspeccionado
                    ON userInspeccionado.IdUserLDAP = actividadesInspeccion.IdPersonalInsp

                    INNER JOIN AU_Mst_TiposAnotacion as tipoAnotacion
                    ON tipoAnotacion.IdTipoAnotacion = anotaciones.IdTipoAnotacion
                    LEFT JOIN AU_Mst_FuentesAnotacion as fuente
                    ON fuente.IdFuentesAnotacion = anotaciones.IdFuentesAnotacion
                    LEFT JOIN AU_Mst_ClasesConnotaciones as claseAnotacion
                    ON claseAnotacion.IdClaseAnotacion = anotaciones.IdClaseAnotacion


                    LEFT JOIN AU_Mst_5M as causa1
                    ON causa1.Id5M = causa_seguimiento.Id5M
                    LEFT JOIN AU_Mst_Aspectos5M as apecto5m
                    ON apecto5m.IdAspecto5M = causa_seguimiento.IdAspecto5M
                    LEFT JOIN AU_Mst_FalenciasCausasRaiz as falenciaCausa
                    ON falenciaCausa.IdFalencia = causa_seguimiento.IdFalencia
                    INNER JOIN AU_Reg_usersLDAP as userldapActividad
                    ON userldapActividad.IdUserLDAP = tareaCausa.IdResponsable"
            ))
            ->get();

    }
}
