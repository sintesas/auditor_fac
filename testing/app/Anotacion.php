<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Anotacion extends Model
{
    protected $primaryKey = 'IdAnotacion';

    protected $table = 'AU_Reg_Anotaciones';

    public $timestamps = false;


    public function auditorias(){
    	return $this->belongsTo('App\Auditoria','IdAuditoria','IdAuditoria');
    }

    public function causasraiz(){
    	return $this->hasMany('App\CausaRaiz', 'IdAnotacion');
    }

    public function tiposanotacion(){
    	return $this->hasMany('App\TipoAnotacion');
    }

    public static function getAnotacionesAuditoria($IdAuditoria){
        return Anotacion::where('dbo.AU_Reg_Anotaciones.IdAuditoria','=', $IdAuditoria)
            ->select('dbo.AU_Reg_Anotaciones.IdAnotacion',
                     'dbo.AU_Reg_Anotaciones.NoAnota')
            ->get();
    }

    public static function getNextNotaAuditoria($IdAuditoria){
        return Auditoria::where('dbo.AU_Reg_Auditorias.IdAuditoria','=', $IdAuditoria)
                    ->leftJoin('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Anotaciones.IdAuditoria', '=', 'dbo.AU_Reg_Auditorias.IdAuditoria')
                    ->select('dbo.AU_Reg_Auditorias.Codigo',
                             'dbo.AU_Reg_Auditorias.MarcoLegal',
                             DB::raw('count(IdAnotacion) as ContAnotaciones'))
                    ->groupBy('Codigo', 'dbo.AU_Reg_Auditorias.MarcoLegal')
                    // ->groupBy('MarcoLegal')
                    ->get();

    }

    public static function getAnotacionesByUser($IdPersonal){
        return Anotacion::join('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdAuditoria', '=', 'dbo.AU_Reg_Anotaciones.IdAuditoria')
            ->where('dbo.AU_Reg_Auditorias.IdPersonalAudi ', '=', $IdPersonal)
            ->get();
    }
}
