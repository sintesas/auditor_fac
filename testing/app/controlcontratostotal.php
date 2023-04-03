<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class controlcontratostotal extends Model
{
     //busqueda tabla 
     protected $table = 'AUFACVW_ControlContratos_TOTAL';

    public $timestamps = false;

    public static function obtenerContratosAniototal($Vigencia){
        return VWcontratoanualsearch::where('AñoVigencia', '=', $Vigencia)->get();
    }
}
