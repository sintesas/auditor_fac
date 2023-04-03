<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriteriosAsociados extends Model
{
    protected $primaryKey = 'IdAsociado';

    protected $table = 'dbo.AU_Reg_CriteriosAsociados';

	public $timestamps = false;
}
