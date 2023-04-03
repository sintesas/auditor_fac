<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public static function rolUser(){
        $idPersonal = Auth::user()->IdPersonal;

        return DB::table('Rol_User as userAdmin')
                ->select('name as Perfil', 'rol.id as IdRol')
                ->join('roles as rol', 'userAdmin.IdRol', '=', 'rol.id')
                ->where('userAdmin.IdUser', '=', $idPersonal)
                ->take(1)
                ->get();
    }
}
