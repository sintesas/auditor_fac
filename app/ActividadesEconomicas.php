<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadesEconomicas extends Model
{
    protected $table = 'AU_Mst_ActividadesEconomicas';

    protected $primaryKey = 'IdActividadEconomica';

    public $timestamps = false;

    public function actividadEconomica(){
        return $this->belongsTo('App\ActividadesEconomicas');
    }

    public function actividadEconomicaListado(){
        return $this->hasOne('App\ListadoActividadesEconomicas', 'IdActividadEconomica', 'IdActividadEconomica');
    }

}