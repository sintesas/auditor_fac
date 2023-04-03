<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasExperiencia extends Model
{
    protected $table = 'dbo.AU_Mst_AreasExperienciaSectorAero';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdAreaExperiencia";
	}
}
