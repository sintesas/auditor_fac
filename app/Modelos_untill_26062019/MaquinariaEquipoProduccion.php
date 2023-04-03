<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaquinariaEquipoProduccion extends Model
{
    protected $table = 'AU_Reg_MaquinariaEquiposProduccion';

    protected $primaryKey = 'IdMaquinariaEquipos';

    public $timestamps = false;

    public function maquinaria(){
    	return $this->belongsTo('App\Empresa');
    }
}
