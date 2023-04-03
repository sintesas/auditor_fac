<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// goes first
class AspectoEstrategico extends Model
{
    
	protected $table = 'AU_Reg_AspectosEstrategicosYOrganizaion';

	protected $primaryKey = 'IdAspectoEstrategiaOrganizacion';

	public $timestamps = false;


	public function aspectoEstrategico(){
		return $this->belongsTo('App\Empresa');
	}

	protected $fillable = [
		'SistemasPlaneacion',
		'HorasTiempoTrabajo',
		'IdEmpresa',
		'Activo',
	];


}
