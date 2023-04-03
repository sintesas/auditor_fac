<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspecialidadCertificacion extends Model
{
    protected $table = 'dbo.AU_Mst_EspecialidadesCertificacion';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEspecialidadCertificacion";
	}

	public function especialidad(){
		return $this->hasOne('App\EspecialidadCertificacion', 'IdEspecialidadCertificacion', 'IdEspecialidadCertificacion');
	}

}
