<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'dbo.AU_Mst_EstadosPrograma';

	public $timestamps = false;

	public function getKeyName(){
    	return "AU_Mst_EstadosPrograma";
	}
}
