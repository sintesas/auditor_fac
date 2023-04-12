<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListasDinamicas extends Model
{
    protected $table = 'tb_listas_dinamicas';

	public $timestamps = false;

	public function getKeyName(){
    	return "lista_dinamica_id";
	}
}
