<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandaPotencialConsumoRotacion extends Model
{
    protected $table = 'AU_Reg_DemandaPotencialConsumoRotacion';

    protected $primaryKey = 'IdConsumoRotacion';

    public $timestamps = false;
}
