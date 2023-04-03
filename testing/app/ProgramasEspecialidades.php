<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramasEspecialidades extends Model
{
    protected $primaryKey = 'IdEspecialidadPrograma';

    protected $table = 'AU_Reg_ProgramasEspecialidades';

    public $timestamps = false;
}
