<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseCertificacion extends Model
{
    protected $table = 'dbo.AU_Mst_BaseCertificacion';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdBaseCertificacion";
	}

	 public function subpartes(){
    	return $this->hasMany('App\SubPartesBaseCertificacion', 'IdBaseCertificacion');
    }
}
