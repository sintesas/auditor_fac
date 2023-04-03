<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoFfmm extends Model
{
    protected $table = 'AU_Reg_ProductosFFMM';

    protected $primaryKey = 'IdProductosFM';

    public $timestamps = false;

    public $fillable = ['ProductoItem', 'IdVentas', 'IdClienteFM' , 'Activo', 'IdEmpresa'];


    public function productoFfmm(){
    	return $this->belongsTo('App\Empresa');
    }

    public function clienteFfmmListado(){
    	return $this->hasOne('App\ClienteFfmm', 'IdClienteFM', 'IdClienteFM');
    }

}
