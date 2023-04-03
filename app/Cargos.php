<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'dbo.AU_Mst_Cargo';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdCargo";
	}
}
