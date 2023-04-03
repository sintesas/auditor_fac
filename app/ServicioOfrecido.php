<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioOfrecido extends Model
{
    protected $table = 'AU_Reg_ServiciosOfrecidos';

    protected $primaryKey = 'IdServiciosOfrecidos';

    public $timestamps = false;

    public function servicioOfrecido(){
    	return $this->belongsTo('App\Empresa');
    }

}
