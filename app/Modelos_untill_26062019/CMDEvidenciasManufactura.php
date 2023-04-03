<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMDEvidenciasManufactura extends Model
{
    protected $primaryKey = 'IdCMDEviManufactura';

    protected $table = 'AU_Reg_CMDEvidenciasManufactura';

    public $timestamps = false;

    public static function getByEvidencia($IdCMDEvidencias){
    	return CMDEvidenciasManufactura::where('IdCMDEvidencias', '=' , $IdCMDEvidencias)->get()->first();
    }
}
