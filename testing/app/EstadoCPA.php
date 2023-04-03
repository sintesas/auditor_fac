<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCPA extends Model
{
     //busqueda tabla 
     protected $primaryKey = 'IdEstadoPCA';

     protected $table = 'AU_Mst_EstadoPCA';
 
     public $timestamps = false;
}
