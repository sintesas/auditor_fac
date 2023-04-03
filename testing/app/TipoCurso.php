<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCurso extends Model
{
    protected $table = 'AU_Mst_TipoCurso';
    protected $primaryKey = 'IdTipoCurso';

    public $timestamps = false;
}
