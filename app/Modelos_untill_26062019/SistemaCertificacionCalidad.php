<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemaCertificacionCalidad extends Model
{
    protected $table = 'AU_Reg_SistemaCertificacionCalidad';

    protected $primarykey = 'IdSistemaCalidad';

    public $timestamps = false;

    public function sistemaCertificacion(){
    	return $this->belongsTo('App\Empresa');
    }

    
}
