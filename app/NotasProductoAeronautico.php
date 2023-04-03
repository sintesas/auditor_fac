<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;



class NotasProductoAeronautico extends Model
{

protected $table = 'AU_Reg_NotasProductoAeronautico';

protected $primaryKey = 'idNotasProdAero';

public $timestamps = false;

}
