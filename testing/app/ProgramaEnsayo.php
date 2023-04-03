<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaEnsayo extends Model
{
    protected $table = 'AU_Reg_ProgramasEnsayos';

	protected $primaryKey = 'IdProgramasEnsayos';

	public $timestamps = false;

	public function ensayoListado(){
		return $this->hasOne('App\Ensayo', 'IdEnsayo', 'IdEnsayo');
	}

	public function tipoEnsayoListado(){
		return $this->hasOne('App\TipoEnsayo', 'IdTipoEnsayo', 'IdTipoEnsayo');
	}

}
