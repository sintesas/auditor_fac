<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\CriteriosAuditorias;
use App\ProcesosAuditorias;
use App\CriteriosAsociados;
use App\UsersLDAP;
use DB;

class CriteriosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = UsersLDAP::perteneceIGEFA();

        $criterios = CriteriosAuditorias::All();
        $procesos = ProcesosAuditorias::All();
        return view ('auditoria.crear_criterios')
                    ->with('criterios', $criterios)
                    ->with('procesos', $procesos)
                    ->with('rol', $rol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Fecha Actual
        $hoy = getdate();

       $criterios = new CriteriosAuditorias;
       // store info 
       $criterios->Norma = $request->input('Norma');
       $criterios->IdProceso = null;
       $criterios->Proceso = null;
       $criterios->SubProceso = null;
       /*$criterios->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
       $criterios->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];*/
       
       $criterios->save();
       return redirect()->route('criteriosAuditoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {$criterios = CriteriosAuditorias::find($id);
      return   $criterios;      
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdCriterio)
    {
        $criterios = CriteriosAuditorias::find($IdCriterio);
        $procesos = ProcesosAuditorias::All();
        return view('auditoria.editar_criterios')->with('criterios',$criterios)->with('procesos', $procesos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdCriterio)
    {

        //Fecha Actual
        $hoy = getdate();

        // bring one record using IdCriterio or something
       $criterios = CriteriosAuditorias::find($IdCriterio);
       
       $criterios->Norma = $request->input('Norma');
       $criterios->Proceso = null;
       $criterios->SubProceso = null;
       $criterios->IdProceso = null;
       //$criterios->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
       
       $criterios->save();

       return redirect()->route('criteriosAuditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existCriterio = CriteriosAsociados::where('IdCriterio', $id)->first();
        if(!$existCriterio){
            // USING MODELS
            $criterios = CriteriosAuditorias::find($id);
            $criterios->delete();
            
            $notification = array(
              'message' => 'Criterio eliminado correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
                'message' => 'No se puede eliminar este criterio ya que contiene datos asociados.', 
                'alert-type' => 'warning'
          );
        }
        return redirect()->route('criteriosAuditoria.index')->with($notification);
    }
}
