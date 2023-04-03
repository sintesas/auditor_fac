<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use DB;

class Empresa extends Model
{
    use LogsActivity;

    protected $table = 'AU_Reg_Empresas';

    protected $primaryKey = 'IdEmpresa';

    public $timestamps = false;
    


    public function funcionarios(){
       return $this->hasMany('App\FuncionariosEmpresa', 'IdEmpresa');
    }

    public function capacidades(){
        return $this->hasMany('App\CapacidadesEmpresa', 'IdEmpresa');
    }

    public function auditorias(){
        return $this->belongsTo('App\Auditoria', 'IdEmpresa');
    }

    public static function empresasBySector($IdSector){
        return Empresa::where('AU_Reg_OfertaComercialEmpresa.IdOfertaComercial', '=', $IdSector)
                ->join('AU_Reg_OfertaComercialEmpresa', 'AU_Reg_OfertaComercialEmpresa.IdEmpresa', '=', 'dbo.AU_Reg_Empresas.IdEmpresa')
                ->orderBy('NombreEmpresa', 'desc')->get();
    }

    public static function sigla($id){
        // return Empresa::where('IdEmpresa','=',$id)->get();

        return Empresa::where('dbo.AU_Reg_Empresas.IdEmpresa','=',$id)
         ->leftJoin('dbo.AU_Reg_Auditorias', 'dbo.AU_Reg_Auditorias.IdEmpresa', '=', 'dbo.AU_Reg_Empresas.IdEmpresa')
         ->leftjoin('AU_Mst_TiposAuditoria','AU_Mst_TiposAuditoria.IdTipoAuditoria','=','dbo.AU_Reg_Auditorias.IdTipoAuditoria' )     
->select(  'dbo.AU_Reg_Empresas.SiglasNombreClave',
                   'dbo.AU_Reg_Auditorias.Codigo',
                   'dbo.AU_Reg_Empresas.TipoOrganizacion',
                   'AU_Mst_TiposAuditoria.Sigla as siglatipo')
                      
        ->orderBy('IdAuditoria', 'desc')->get();
    }

    public static function getById($idEmpresa){
        return Empresa::where('IdEmpresa', '=', $idEmpresa)->get();
    }


    public static function getEmpresasAreasSubareas($status){
        // return Empresa::where('IdEmpresa','=',$id)->get();
        if($status == 1){
            return DB::table('AU_Reg_Empresas as e')
            ->join('AU_Mst_SubAreasCooperacionIndustrial as s', 'e.IdSubAreasCooperacionIndustrial', '=', 's.IdSubAreasCooperacionIndustrial')
            ->join('AU_Mst_AreasCooperacionIndustrial as a', 'e.IdAreasCooperacionIndustrial', '=', 'a.IdAreasCooperacionIndustrial')
            ->distinct()
            ->select('e.NombreEmpresa','Nit', 'Ciudad', 'Telefono','e.IdEmpresa','s.Descripcion as subAreasEmpresa', 'a.Descripcion as areasEmpresa')
            ->orderBy('areasEmpresa', 'asc')
            ->get();
        }else if($status == 2){
            return DB::table('AU_Reg_Empresas as e')
            ->join('AU_Mst_SubAreasCooperacionIndustrial as s', 'e.IdSubAreasCooperacionIndustrial', '=', 's.IdSubAreasCooperacionIndustrial')
            ->join('AU_Mst_AreasCooperacionIndustrial as a', 'e.IdAreasCooperacionIndustrial', '=', 'a.IdAreasCooperacionIndustrial')
            ->distinct()
            ->select('e.NombreEmpresa','Nit', 'Ciudad', 'Telefono','e.IdEmpresa','s.Descripcion as subAreasEmpresa', 'a.Descripcion as areasEmpresa')
            ->orderBy('e.NombreEmpresa', 'asc')
            ->get();
        }
        
    }
    
    public function gestionCalidad(){
        return $this->hasOne('App\GestionCalidad', 'IdEmpresa');
    }

    public function sistemascertificacioncalidad(){
        return $this->hasMany('App\sistemaCertificacionCalidad', 'IdEmpresa');
    }

    public function aspectoEstrategico(){
        return $this->hasOne('App\AspectoEstrategico', 'IdEmpresa');
    }

    public function objetivossEstratecigosAspectos(){
        return $this->hasMany('App\ObjetivoEstrategicoAspecto', 'IdEmpresa');
    }


    public function caracteristicaEmpresa(){
        return $this->hasOne('App\CaracteristicaEmpresa', 'IdEmpresa');
    }

    public function produccionEmpresa(){
        return $this->hasOne('App\ProduccionEmpresa', 'IdEmpresa');
    }

    public function productosFfmm(){
        return $this->hasMany('App\ProductoFfmm', 'IdEmpresa');
    }

    public function materiasPrimas(){
        return $this->hasMany('App\MateriaPrima', 'IdEmpresa');
    }

    public function actividadesEconomicas(){
        return $this->hasMany('App\ActividadEconomica', 'IdEmpresa');
    }

    public function produccionesTercerizacion(){
        return $this->hasMany('App\ProduccionTercerizacion', 'IdEmpresa');
    }

    public function maquinarias(){
        return $this->hasMany('App\MaquinariaEquipoProduccion', 'IdEmpresa');
    }

    public function mercados(){
        return $this->hasMany('App\Mercado', 'IdEmpresa');
    }

    public function tecnologiaEmpresa(){
        return $this->hasOne('App\TecnologiaEmpresa', 'IdEmpresa');
    }

    public function productosOfrecidos(){
        return $this->hasMany('App\ProductoOfrecido', 'IdEmpresa')->with('demandaproducto');
    }

    public function serviciosOfrecidos(){
        return $this->hasMany('App\ServicioOfrecido', 'IdEmpresa');
    }


    // tecnologias
    public function productosSector(){
        return $this->hasMany('App\ProductoSector', 'IdEmpresa');
    }

    public function antecedentesAutor(){
        return $this->hasMany('App\AntecedenteAutor', 'IdEmpresa');
    }

    public function desarrollados(){
        return $this->hasMany('App\Desarrollado', 'IdEmpresa');
    }

    public function tecnologiasSucliente(){
        return $this->hasMany('App\TecnologiaSuCliente', 'IdEmpresa');
    }

}
