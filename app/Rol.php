<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'roles';

  protected $primaryKey = 'id';

  public static function rolUser(){
        $idPersonal = Auth::user()->IdPersonal;

      /*  return DB::table('Rol_User as userAdmin')
                ->select(DB::raw('top 1 name as perfil, rol.id as IdRol'))
                ->join('roles as rol', 'userAdmin.IdRol', '=', 'rol.id')
                ->where('userAdmin.IdUser', '=', '\'' . $idPersonal . '\'');*/
                return DB::table('Rol_User as userAdmin')
                        ->where('userAdmin.IdUser',$idPersonal)
                        ->get();
    }
    public static function rolesUser(){
          $idPersonal = Auth::user()->IdPersonal;
//dd($idPersonal);
          return DB::table('Rol_User as userAdmin')
                  ->where('userAdmin.IdUser',$idPersonal)
                  ->get();
      }

      public static function rolUserName(){
            $idPersonal = Auth::user()->IdPersonal;

          /*  return DB::table('Rol_User as userAdmin')
                    ->select(DB::raw('top 1 name as perfil, rol.id as IdRol'))
                    ->join('roles as rol', 'userAdmin.IdRol', '=', 'rol.id')
                    ->where('userAdmin.IdUser', '=', '\'' . $idPersonal . '\'');*/
                    return DB::table('Rol_User as userAdmin')
                    ->join('roles', 'userAdmin.IdRol','=','roles.id')
                    ->select('roles.name')
                            ->where('userAdmin.IdUser',$idPersonal)
                            ->get();
        }
}
