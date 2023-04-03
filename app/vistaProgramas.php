<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vistaProgramas extends Model
{
    protected $table = 'dbo.AUFACVW_Programas';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdPrograma";
	}
}
