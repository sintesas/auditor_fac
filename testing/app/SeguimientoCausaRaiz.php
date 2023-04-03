<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientoCausaRaiz extends Model
{
    protected $table = 'dbo.AU_Reg_Seguimiento';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdSeguimiento";
	}

	public static function getAll(){
		return SeguimientoCausaRaiz::orderBy('IdSeguimiento', 'desc')
            ->join('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Seguimiento.IdAnotacion', '=', 'dbo.AU_Reg_Anotaciones.IdAnotacion')
            ->leftJoin('dbo.AU_Reg_CausasRaiz', 'dbo.AU_Reg_Seguimiento.IdCausaRaiz', '=', 'dbo.AU_Reg_CausasRaiz.IdCausaRaiz')
            ->join('dbo.AU_Mst_EstadoSeguimiento', 'dbo.AU_Reg_Seguimiento.IdEstadoSeguimiento', '=', 'dbo.AU_Mst_EstadoSeguimiento.IdEstadoSeguimiento')
            ->select('dbo.AU_Reg_Seguimiento.IdSeguimiento', 
                'dbo.AU_Reg_Anotaciones.NoAnota', 
                'dbo.AU_Reg_CausasRaiz.IdCausaRaiz',
                'dbo.AU_Reg_Seguimiento.Porcentaje', 
                'dbo.AU_Mst_EstadoSeguimiento.NombreEstado', 
                'dbo.AU_Reg_Seguimiento.FechaSeguimiento',
                'dbo.AU_Reg_Seguimiento.Codigo')
            ->get();
	}

	public static function getByUser($IdPersonal){
		return SeguimientoCausaRaiz::orderBy('IdSeguimiento', 'desc')
            ->join('dbo.AU_Reg_Anotaciones', 'dbo.AU_Reg_Seguimiento.IdAnotacion', '=', 'dbo.AU_Reg_Anotaciones.IdAnotacion')
            ->leftJoin('dbo.AU_Reg_CausasRaiz', 'dbo.AU_Reg_Seguimiento.IdCausaRaiz', '=', 'dbo.AU_Reg_CausasRaiz.IdCausaRaiz')
            ->join('dbo.AU_Mst_EstadoSeguimiento', 'dbo.AU_Reg_Seguimiento.IdEstadoSeguimiento', '=', 'dbo.AU_Mst_EstadoSeguimiento.IdEstadoSeguimiento')
            ->join('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdAuditoria', '=', 'dbo.AU_Reg_Anotaciones.IdAuditoria')
            ->select('dbo.AU_Reg_Seguimiento.IdSeguimiento', 
                'dbo.AU_Reg_Anotaciones.NoAnota', 
                'dbo.AU_Reg_CausasRaiz.IdCausaRaiz',
                'dbo.AU_Reg_Seguimiento.Porcentaje', 
                'dbo.AU_Mst_EstadoSeguimiento.NombreEstado', 
                'dbo.AU_Reg_Seguimiento.FechaSeguimiento',
                'dbo.AU_Reg_Seguimiento.Codigo')
            ->where('dbo.AU_Reg_Auditorias.IdPersonalAudi ', '=', $IdPersonal)
            ->get();
	}
}
