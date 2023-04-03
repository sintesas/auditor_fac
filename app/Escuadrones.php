<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuadrones extends Model
{
    protected $table = 'dbo.AU_Mst_Escuadron';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdEscuadron";
	}
}
