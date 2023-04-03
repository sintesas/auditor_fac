<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntecedenteAutor extends Model
{
    protected $table = 'AU_Reg_AntecedentesAutores';
    protected $primaryKey = 'IdAntecedentes';

    public $timestamps = false;

    
}
