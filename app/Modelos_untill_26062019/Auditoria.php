<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Auditoria extends Model
{
    protected $table = 'AU_Reg_Auditorias';

	public $timestamps = false;

	public function getKeyName(){
    	return "IdAuditoria";
	}

	public function planesInspeccion(){
		return $this->hasmany('App\PlanInspeccion', 'IdPlanInspeccion');
	}

	public static function validateCode($code)
	{
		return Auditoria::where('Codigo','=',$code)->get();
	}

	public function NoVisitas(){
       return $this->hasMany('App\NoVisitas', 'IdAuditoria');
    }

    public function anotaciones(){
    	return $this->hasMany('App\Anotacion', 'IdAuditoria');
    }

    public function empresas(){
    	return $this->hasMany('App\Empresa');
    }

    public static function getAuditor($IdAuditoria){
    	return Auditoria::where('dbo.AU_Reg_Auditorias.IdAuditoria','=', $IdAuditoria)
    				->join('dbo.AU_Reg_Personal', 'dbo.AU_Reg_Personal.IdPersonal', '=', 'dbo.AU_Reg_Auditorias.IdPersonalAudi')
    				->join('dbo.AU_Mst_Grado', 'dbo.AU_Mst_Grado.IdGrado', '=', 'dbo.AU_Reg_Personal.IdGrado')
    				->select("dbo.AU_Reg_Personal.IdPersonal", 
				    DB::raw("CONCAT ( dbo.AU_Mst_Grado.Abreviatura, ' | ',dbo.AU_Reg_Personal.Nombres, ' ',dbo.AU_Reg_Personal.Apellidos) as Nombres"))->get();
    }

    public static function getByInspectorAndAuditor($IdPersonal){
        return Auditoria::where('IdPersonalInsp', '=', $IdPersonal)
                        ->orWhere('IdPersonalAudi', $IdPersonal)
                        ->orderby('Codigo', 'DESC')
                        ->get();
    }

    public static function getByUser($IdPersonal){
        return Auditoria::where('IdPersonalAudi ', '=', $IdPersonal)
                        ->join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
                        ->select('IdAuditoria', 'Codigo', 'SiglasNombreClave', 'NombreAuditoria')
                        ->get();
    }

    public static function getByEmpresa($idEmpresa)
    {
        return Auditoria::where('IdEmpresa ', '=', $idEmpresa)
                        ->get();
    }

    public static function getAuditoriasTabla(){
        return Auditoria::join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
                        ->select('IdAuditoria', 'Codigo', 'SiglasNombreClave', 'NombreAuditoria')
                        ->get();
    }
}
