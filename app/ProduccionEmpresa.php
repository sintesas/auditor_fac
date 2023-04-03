<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduccionEmpresa extends Model
{
    protected $table = 'AU_Reg_ProduccionEmpresa';

    protected $primaryKey = 'IdProduccionEmpresa';

    public $timestamps = false;

    public function produccionEmpresa(){
    	return $this->belongsto('App\Empresa');
    }

    public $fillable = [
    	'ProductosProcesosPatentados',
    	'ActividadesInvestigacion',
    	'TransferenciaTecnologiaKnowHow',
    	'ConveniosInteruniversidadesInvestigacion',
    	'DetalleConveniosParticipacion',
    	'ParticipacionDesarrolloTecnolgico',
    	'IdEmpresa',
    	'Activo',
    ];
}
