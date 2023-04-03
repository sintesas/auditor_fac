<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramaBanco extends Model
{

	protected $table = 'AU_Reg_ProgramasBancos';

	protected $primaryKey = 'IdProgramasBancos';

	public $timestamps = false;

	public function bancosListado(){
		return $this->hasOne('App\Banco', 'IdBanco', 'IdBanco');
	}


}
