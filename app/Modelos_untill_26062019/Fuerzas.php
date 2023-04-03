<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuerzas extends Model
{
     protected $table = 'dbo.AU_Mst_Fuerza';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdFuerza";
	}
}
