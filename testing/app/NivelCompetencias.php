<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelCompetencias extends Model
{
    protected $table = 'AU_Mst_NivelCompetencia';
    protected $primaryKey = 'IdNivelCompetencia';

    public $timestamps = false;
}
