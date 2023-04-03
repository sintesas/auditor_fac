<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'dbo.AU_Mst_TipoDocumento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdTipoDoc";
	}
}
