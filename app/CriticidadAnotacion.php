<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriticidadAnotacion extends Model
{
    protected $primaryKey = 'IdCriticidadAnotacion';

    protected $table = 'AU_Mst_CriticidadAnotacion';

    public $timestamps = false;
}
