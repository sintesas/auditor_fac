<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class EspecialistasSeguimiento extends Model
{
    protected $table = 'dbo.AU_Reg_EspecialistasSeguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEspecialistaSeguimiento";
	}

	public static function getEspecialistasBySeguimiento($IdListaSeguimiento){
		return EspecialistasSeguimiento::where('IdListaSeguimiento','=', $IdListaSeguimiento)
				->join('dbo.AU_Reg_Personal', 'dbo.AU_Reg_Personal.IdPersonal', '=', 'AU_Reg_EspecialistasSeguimiento.IdPersonal')
				->leftjoin('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
				->select(  	"dbo.AU_Reg_EspecialistasSeguimiento.IdEspecialistaSeguimiento",
                   		DB::raw("CONCAT ( dbo.AU_Mst_Grado.Abreviatura, ' | ',dbo.AU_Reg_Personal.Nombres, ' ',dbo.AU_Reg_Personal.Apellidos) as Nombres"),
                   		'IdListaSeguimiento',
                   		'Horas',
                   		'Fecha')
				->get();

	}
}
