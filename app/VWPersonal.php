<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWPersonal extends Model
{
    protected $table = 'dbo.AUFACVW_Personal';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdPersonal";
	}
}
