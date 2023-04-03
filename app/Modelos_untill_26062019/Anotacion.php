<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Anotacion extends Model
{
    protected $primaryKey = 'IdAnotacion';

    protected $table = 'AU_Reg_Anotaciones';

    public $timestamps = false;


    public function auditorias(){
    	return $this->belongsTo('App\Auditoria','IdAuditoria','IdAuditoria');
    }

    public function causasraiz(){
    	return $this->hasMany('App\CausaRaiz', 'IdAnotacion');
    }

    public function tiposanotacion(){
    	return $this->hasMany('App\TipoAnotacion');
    }

    public static function getAnotacionesAuditoria($IdAuditoria){
        return Anotacion::where('dbo.AU_Reg_Anotaciones.IdAuditoria','=', $IdAuditoria)
            ->select('dbo.AU_Reg_Anotaciones.IdAnotacion',
                     'dbo.AU_Reg_Anotaciones.NoAnota')
            ->get();
    }

    public static function getNextNotaAuditoria($IdAuditoria){
        return Auditoria::where('dbo.AU_Reg_Auditorias.IdAuditoria','=', $IdAuditoria)
                    ->leftJoin('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Anotaciones.IdAuditoria', '=', 'dbo.AU_Reg_Auditorias.IdAuditoria')
                    ->select('dbo.AU_Reg_Auditorias.Codigo',
                             'dbo.AU_Reg_Auditorias.MarcoLegal',
                             DB::raw('count(IdAnotacion) as ContAnotaciones'))
                    ->groupBy('Codigo', 'dbo.AU_Reg_Auditorias.MarcoLegal')
                    // ->groupBy('MarcoLegal')
                    ->get();

    }

    public static function getAnotacionesByUser($IdPersonal, $name = null){
        return DB::table('AU_Reg_Anotaciones an')
            ->join('dbo.AU_Reg_Auditorias au', 'au.IdAuditoria', '=', 'au.IdAuditoria')
            ->join('dbo.AU_Reg_usersLDAP ul', 'ul.IdUserLDAP', '=', 'au.IdPersonalAudi')
            ->leftjoin('AU_Mst_TiposAnotacion as tipo','tipo.IdTipoAnotacion','=', 'AU_Reg_Anotaciones.IdTipoAnotacion')
            ->where('au.IdPersonalAudi', '=', $IdPersonal)
            ->orwhere('ul.Name', 'like', '%'.$name.'%')
            ->get();
    }

    public static function getCausasRaizByAnotacion($IdAnotacion){
        return DB::table('AU_Reg_CausasRaiz as ca')
            ->select('ca.IdCausaRaiz', 'ca.IdAnotacion', 'ca.CausaRaiz', 'ca.Efecto',
                    'm.Metodo', 'ap.Aspecto', 'ca.Priorizacion', 
                    'pr.NombrePrograma', 'fa.NombreFalencia', 'cr.Proceso')
            ->join('AU_Mst_5M as m', 'm.Id5M', '=', 'ca.Id5M')
            ->join('AU_Mst_Aspectos5M as ap', 'ap.IdAspecto5M', '=', 'ca.IdAspecto5M')
            ->join('AU_Mst_ProgramasCausasRaiz as pr', 'pr.IdPrograma', '=', 'ca.IdPrograma')
            ->join('AU_Mst_FalenciasCausasRaiz as fa', 'fa.IdFalencia', '=', 'ca.IdFalencia')
            ->join('AU_Reg_CriteriosAuditorias as cr', 'cr.IdCriterio', '=', 'ca.IdProceso')
            ->where('ca.IdAnotacion', '=', $IdAnotacion)
            ->get();
    }
    public static function findCriterio($IdAnotacion){
        return Anotacion::where('IdAnotacion', '=', $IdAnotacion)
            ->leftjoin('AU_Reg_ActividadesPlanInspeccion as planInsp', 'planInsp.IdActividadPlanIns', '=', 'AU_Reg_Anotaciones.IdActividadPlanInspeccion')
            ->leftjoin('AU_Reg_CriteriosAuditorias as criterio', 'criterio.IdCriterio', '=', 'planInsp.IdCriterio')
            ->get();
    }

    public static function getAllAnotaciones(){
    }
}
