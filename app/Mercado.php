<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercado extends Model
{
    protected $table = 'AU_Reg_Mercado';

    protected $primarykey = 'IdMercado';

    public $timestamps = false;

    public function mercado(){
    	return $this->belongsTo('App\Empresa');
    }

    public function sectorMercado(){
    	return $this->hasOne('App\SectorMercado', 'IdSector', 'IdSector');
    }

    public function categoria(){
    	return $this->hasOne('App\CategoriaTipo', 'IdCategorias', 'IdCategorias');
    }

    public function subcategoria(){
    	return $this->hasOne('App\SubcategoriaTipo', 'IdSubcategoria', 'IdSubcategoria');
    }
}
