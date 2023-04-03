<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CapacidadesEmpresa extends Model
{

	use LogsActivity;

	protected $table = 'AU_Reg_OfertaComercialEmpresa';

    protected $primaryKey = 'IdOfertaComercial';

    public $timestamps = false;

    public function capacidadesEmpresa(){
    	return $this->belongsTo('App\Empresa');
    }

    public function ofertasComerciales(){
    	return $this->hasOne('App\OfertaComercial', 'IdOfertaComercial');
    }
}
