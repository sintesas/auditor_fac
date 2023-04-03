<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoSector extends Model
{
	protected $table = 'AU_Reg_ProductosSector';
    protected $primaryKey = 'IdProductosSector';

    public $timestamps = false;

    public function sectorMercado(){
        return $this->hasOne('App\sectorMercado', 'IdSector', 'IdSector');
    }
}
