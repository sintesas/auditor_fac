<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialFactibilidadTecnica extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialFactibilidadTecnica';

    protected $primaryKey = 'IdFactibilidadTecnica';

    public $timestamps = false;

    protected $fillable = [
    	'IdDemandaPotencial',
    	'Severidad',
    	'OcurrenciaFalla',
    	'Complejidad',
    	'Activo',
    ];

}
