<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosEmpresa extends Model
{
    protected $table = 'AU_Mst_EstadosEmpresa';

    protected $primaryKey = 'IdEstadoEmpesa';

    public $timestamps = false;
}
