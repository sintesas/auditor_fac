<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaseEvento extends Model
{
    protected $table = 'AU_Mst_ClasesEvento';
    protected $primaryKey = 'IdClaseEvento';

    public $timestamps = false;
}
