<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class ProcesosAuditorias extends Model
{
    protected $primaryKey = 'IdProceso';

    protected $table = 'dbo.AU_Reg_ProcesosAuditorias';

  public $timestamps = false;  
    
    public static function getProcesosGroupBy(){
        return ProcesosAuditorias::select('IdProceso','Proceso')
        ->get()
        ->keyBy('Proceso');
    }

    public static function getSubProcesosGroupBy($texto){
        return ProcesosAuditorias::select('IdProceso','SubProceso')
        ->where('Proceso','like',$texto)
        ->get();
    }
}
