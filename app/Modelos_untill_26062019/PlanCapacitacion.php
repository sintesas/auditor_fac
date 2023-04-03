<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanCapacitacion extends Model
{
    protected $table = 'AU_Reg_PlanCapacitacionAnual';
    protected $primaryKey = 'IdPlanCapacitacionAnual';

    public $timestamps = false;
}
