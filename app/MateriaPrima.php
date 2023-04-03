<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    protected $table = 'AU_Reg_MateriasPrimas';

    protected $primaryKey = 'IdMateriaPrimaComponentes';

    public $timestamps = false;

    public function materiaPrima(){
    	return $this->belongsTo('App\Empresa');
    }

    public function materiaPrimaListado(){
    	return $this->hasOne('App\ListadoMateriasPrimas', 'IdMateriaPrima', 'IdMateriaPrima');
    }

    public function actividadEconomicaListado(){
        return $this->hasOne('App\ActividadesEconomicas', 'IdActividadEconomica', 'IdMateriaPrima');
    }

    public function clienteFfMmListado(){
    	return $this->hasOne('App\clienteFfmm', 'IdMateriaPrimaComponentes');
    }
}
