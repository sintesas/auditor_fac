<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoOfrecido extends Model
{
    
    protected $table = 'AU_Reg_ProductosOfrecidos';

    protected $primaryKey = 'IdProductosOfrecidos';

    public $timestamps = false;

    public function productoOfrecido(){
    	return $this->belongsTo('App\Empresa');
    }

    public function demandasPotenciales(){
    	return $this->hasMany('App\DemandaPotencial', 'IdEmpresa');
    }
    public function demandaproducto()
    {
    	return $this->belongsTo(DemandaPotencial::class,'IdDemandaPotencial','IdDemandaPotencial');
    }

}
