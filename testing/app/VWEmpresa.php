<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VWEmpresa extends Model
{
    protected $table = 'AUFACVW_Empresa';

    protected $primaryKey = 'IdEmpresa';

    public $timestamps = false;
}
