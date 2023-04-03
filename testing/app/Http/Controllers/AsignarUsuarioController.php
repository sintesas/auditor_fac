<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Personal;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AsignarUsuarioController extends Controller
{
    
    public function index()
    {

        $personal = Personal::getlistPersonalWithRangoAndEmail();
        $roles = Role::all();
        

        return view ('gestionRecursos/recursoHumano/ver_personal_asignar')
        ->with('personal', $personal)
        ->with('roles', $roles);
    }

    public function create()
    {


    }

    
    public function store(Request $req)
    {
        
        //define name and put it together

        $nombres = $req->input('nombres');
        $apellidos = $req->input('apellidos');
        $fullname = (string) $nombres . ' ' . $apellidos;


        //check password

        $pass1 = $req->input('password');
        $pass2 = $req->input('passwordverify');

        //salting set to automatic and cost up to 15 after evaluating server requirements, recommended lowering to 10 if
        //ms > 50

        $options = [
            'cost' => 15,
        ];
        
        $securePass = password_hash($pass1, PASSWORD_BCRYPT, $options);


        if($pass1 == $pass2){

           $user = new User;

           $user->name = $fullname;
           $user->password = $securePass;
           $user->email = $req->input('email');
           $user->IdPersonal = $req->input('IdPersonal');
           $user->activated = 1;

           $role = $req['idrole']; //Retrieving the roles field
           $role_r = Role::where('id', '=', $role)->firstOrFail();

           $user->save();
           
           $user->assignRole($role_r);

           

           $notification = array(
                'message' => 'Usuario Creado',
                'alert-type' => 'success' 
           );

           return back()->with($notification);

        }else{

            $error = array(
                'message' => 'Las contraseñas no coinciden',
                'alert-type' => 'warning'
            );

            return back()->with($error);

        }

       


    }

   
    public function show($IdPersonal)
    {
        $persona = Personal::find($IdPersonal);

        $nomApellidos = Personal::getlistPersonalWithRangoAndEmail();

        $roles = Role::all();

        $permissions = Permission::all();
        
        return view ('gestionRecursos/recursoHumano/asignar_usuarios')
        ->with('nomApellidos', $nomApellidos)
        ->with('roles', $roles)
        ->with('persona', $persona)
        ->with('permissions', $permissions);
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
