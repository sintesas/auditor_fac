<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuenteAnotacion extends Model
{
    protected $primaryKey = 'IdFuentesAnotacion';

    protected $table = 'AU_Mst_FuentesAnotacion';

    public $timestamps = false;
}
