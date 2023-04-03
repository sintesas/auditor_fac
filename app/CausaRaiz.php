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
		return CausaRaiz::where('IdAnotacion','=', $IdAnotacion)
            ->select('IdCausaRaiz', 'CausaRaiz')
            ->get();
	}
}
