<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// THIS GOES FIRST
class ObjetivoEstrategicoAspecto extends Model
{
    protected $table = 'AU_Reg_ObjetivosEstrategicosAspectos';

	protected $primarykey = 'IdObjetivoEstrategicoEmp';

	public $timestamps = false;

	public function aspectoEstrategico(){
		return $this->belongsTo('App\Empresa');
	}

	public function objetivosEstrategicos(){
		return $this->hasOne('App\ObjetivoEstrategico', 'IdObjetivoEstrategico', 'IdObjetivoEstrategico');
	}

}


