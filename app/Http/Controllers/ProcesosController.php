<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\ProcesosAuditorias;
use App\UsersLDAP;
use DB;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = UsersLDAP::perteneceIGEFA();
        $procesos = ProcesosAuditorias::All();
        return view ('auditoria.crear_procesos')
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

       $criterios = new ProcesosAuditorias;
       // store info 
       $criterios->Proceso = $request->input('Proceso');
       $criterios->SubProceso = $request->input('SubProceso');
       /*$criterios->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
       $criterios->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];*/
       
       $criterios->save();
       return redirect()->route('procesosAuditoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdProceso)
    {
        $procesos = ProcesosAuditorias::find($IdProceso);
        return view('auditoria.editar_procesos')->with('procesos',$procesos);
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
       $criterios = ProcesosAuditorias::find($IdCriterio);
       $criterios->Proceso = $request->input('Proceso');
       $criterios->SubProceso = $request->input('SubProceso');
       $criterios->Updated_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
       
       $criterios->save();

       return redirect()->route('procesosAuditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // USING MODELS
        $criterios = ProcesosAuditorias::find($id);
        $criterios->delete();
        
        $notification = array(
            'message' => 'Proceso eliminado correctamente',
            'alert-type' => 'success'
        );
        return redirect()->route('procesosAuditoria.index')->with($notification);
    }
}