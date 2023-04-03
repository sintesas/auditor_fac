<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWcontratoanualsearch extends Model
{
    protected $table = 'AUFACVW_ControlContratos';

    public $timestamps = false;

    public static function obtenerContratosAnio($Vigencia){
        return VWcontratoanualsearch::where('AñoVigencia', '=', $Vigencia)->get();
    }
}
