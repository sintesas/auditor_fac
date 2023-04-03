<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evidenciaMocMatriz extends Model
{
    protected $table = 'dbo.AU_Reg_EvidenciasRequisitoMoc';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEvidenciaRequsitoMoc";
	}

	public static function getByMoc($IdMocRequisito)
	{
		return evidenciaMocMatriz::where('IdMocRequisito', '=', $IdMocRequisito)->get();
	}
}
