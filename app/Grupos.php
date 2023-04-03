<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    protected $table = 'dbo.AU_Mst_GrupoPersonal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdGrupo";
	}
}
