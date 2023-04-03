<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriterioFinanciero extends Model
{
    protected $table = 'AU_Mst_CriterioFinanciero';

    protected $primaryKey = 'IdCriterioFinanciero';

    public $timestamps = false;
}
