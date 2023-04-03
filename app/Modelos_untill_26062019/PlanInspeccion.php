<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanInspeccion extends Model
{
    protected $table = 'dbo.AU_Reg_PlanesInspeccion';

	
	public $timestamps = false;

	public function getKeyName(){
    	return "IdPlanInspeccion";
	}

	public function auditorias(){
		return $this->belongsTo('App\Auditoria', 'IdAuditoria');
	}

	// public function actividades(){
	// 	return $this->hasMany()
	// }


}
