<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteFfmm extends Model
{
    
	protected $table = 'AU_Mst_ClientesFFMM';

	protected $primaryKey = 'IdClienteFM';

	public $timestamps = false;

	public function productoffmm(){
		return $this->belongsTo('App\ProductoFfmm');
	}

}
