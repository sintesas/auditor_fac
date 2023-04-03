<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPrograma extends Model
{
    protected $table = 'dbo.AU_Mst_TiposPrograma';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdTipoPrograma";
	}
}
