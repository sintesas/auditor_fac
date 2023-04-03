<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talleres extends Model
{
    protected $table = 'dbo.AU_Mst_Taller';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdTaller";
	}
}
