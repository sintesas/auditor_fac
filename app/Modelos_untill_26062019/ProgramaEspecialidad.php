<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaEspecialidad extends Model
{
    protected $table = 'AU_Reg_ProgramasEspecialidades';

	protected $primaryKey = 'IdEspecialidadPrograma';

	public $timestamps = false;

	public function especialidadlistado(){
		return $this->hasOne('App\EspecialidadCertificacion', 'IdEspecialidadCertificacion', 'IdEspecialidadCertificacion');
	}

	public function personalListado(){
		return $this->hasOne('App\Personal', 'IdPersonal', 'IdPersonal');
	}
	
}
