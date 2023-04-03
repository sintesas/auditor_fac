<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desarrollado extends Model
{
	protected $table = 'AU_Reg_Desarrollado';
    protected $primaryKey = 'IdDesarrollado';

    public $timestamps = false;

    public function agente(){
    	return $this->hasOne('App\AgenteDesarrollador', 'IdAgente', 'IdAgente');
    }

    public function sector(){
    	return $this->hasOne('App\SectorMercado', 'IdSector', 'IdSector');
    }


}
