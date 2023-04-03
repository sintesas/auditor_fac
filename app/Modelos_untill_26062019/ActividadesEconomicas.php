<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadesEconomicas extends Model
{
    protected $table = 'AU_Mst_ActividadesEconomicas';

    protected $primaryKey = 'IdActividadEconomica';

    public $timestamps = false;

}