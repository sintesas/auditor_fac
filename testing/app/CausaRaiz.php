<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CausaRaiz extends Model
{
    protected $table = 'AU_Reg_CausasRaiz';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCausaRaiz";
	}

	public function causasRaiz(){
		return $this->belongsTo('App\Anotacion');
	}
	
	public static function getCausaRaizaAnotacion($IdAnotacion){
		return CausaRaiz::where('dbo.AU_Reg_CausasRaiz.IdAnotacion','=', $IdAnotacion)
            ->select('dbo.AU_Reg_CausasRaiz.IdCausaRaiz')
            ->get();
	}
}
