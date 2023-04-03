<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadesInspeccion extends Model
{
    protected $table = 'dbo.AU_Reg_ActividadesPlanInspeccion';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdActividadPlanIns";
	}

	public static function getActividadesPlan($IdPlanInspeccion){
		return ActividadesInspeccion::where('dbo.AU_Reg_ActividadesPlanInspeccion.IdPlanInspeccion','=',$IdPlanInspeccion)
		->select( 'dbo.AU_Reg_ActividadesPlanInspeccion.IdActividadPlanIns',
				'dbo.AU_Reg_ActividadesPlanInspeccion.IdPlanInspeccion',
		       	'dbo.AU_Reg_ActividadesPlanInspeccion.Actividades',
		   		'dbo.AU_Reg_ActividadesPlanInspeccion.InspeccionadoLugar',
		   		'dbo.AU_Reg_ActividadesPlanInspeccion.IdPersonalInsp',
		   		'dbo.AU_Reg_ActividadesPlanInspeccion.Fecha',
		   		'dbo.AU_Reg_ActividadesPlanInspeccion.HoraInicio',
		   		'dbo.AU_Reg_ActividadesPlanInspeccion.HoraFinal')
		->get();
	}

	public static function getCriterioActividad($IdActividadPlanIns){
		return DB::table('AU_Reg_ActividadesPlanInspeccion as actividad')
				->join('AU_Reg_CriteriosAuditorias as criterio','criterio.IdCriterio', 'actividad.IdCriterio')
				->where('actividad.IdActividadPlanIns','=',$IdActividadPlanIns)
				->get();
	}
}
