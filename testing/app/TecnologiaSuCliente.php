<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TecnologiaSuCliente extends Model
{
	protected $table = 'AU_Reg_TecnologiaSuCliente';
    protected $primaryKey = 'IdSuCliente';

    public $timestamps = false;
}
