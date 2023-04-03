<?php

namespace App\Http\Controllers;

use App\ActividadesInspeccion;
use App\Personal;
use App\PlanInspeccion;
use Illuminate\Http\Request;

class ActividadesInspeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $actividades = new ActividadesInspeccion;
        $actividades->IdPlanInspeccion = $request->input('IdPlanInspeccion');
        $actividades->Actividades = $request->input('Actividades');
        $actividades->InspeccionadoLugar = $request->input('InspeccionadoLugar');
        $actividades->IdPersonalInsp = $request->input('IdPersonalInsp');
        //$actividades->CargoInsp = $request->input('CargoInsp');
        $actividades->Fecha = $request->input('Fecha');
        $actividades->HoraInicio = $request->input('HoraInicio');
        $actividades->HoraFinal = $request->input('HoraFinal');
        $actividades->activo = 1;
        $actividades->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPlanInspeccion)
    {
        // $capacidades = Empresa::find($IdEmpresa)->capacidades;
        // $empresa = Empresa::find($IdEmpresa);
        // return view('fomento.empresas.capacidades_empresa')->with('capacidades', $capacidades)->with('empresa', $empresa);

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $actividadesPlan= ActividadesInspeccion::getActividadesPlan($IdPlanInspeccion);

        $planesIns = PlanInspeccion::find($IdPlanInspeccion);

        return view('auditoria.ver_actividades_inspeccion')
            ->with('actividadesPlan', $actividadesPlan)
            ->with('planesIns', $planesIns)
            ->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdActividadPlanIns)
    {
         /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $actividadesInspeccion= ActividadesInspeccion::find($IdActividadPlanIns);

        return view('auditoria.editar_actividades_plan')
              ->withActividadesInspeccion($actividadesInspeccion)
              ->with('personal', $personal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdActividadPlanIns)
    {
        $actividadesPlan = ActividadesInspeccion::find($IdActividadPlanIns);

        $actividadesPlan->IdPlanInspeccion = $request->input('IdPlanInspeccion');
        $actividadesPlan->Actividades = $request->input('Actividades');
        $actividadesPlan->InspeccionadoLugar = $request->input('InspeccionadoLugar');
        $actividadesPlan->IdPersonalInsp = $request->input('IdPersonalInsp');
        $actividadesPlan->CargoInsp = $request->input('CargoInsp');
        $actividadesPlan->Fecha = $request->input('Fecha');
        $actividadesPlan->HoraInicio = $request->input('HoraInicio');
        $actividadesPlan->HoraFinal = $request->input('HoraFinal');
        $actividadesPlan->Activo = 1; 

        $actividadesPlan->save();

        return redirect()->route('actividadesInspeccion.show', $actividadesPlan->IdPlanInspeccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdActividadPlanIns)
    {
        $actividades= ActividadesInspeccion::find($IdActividadPlanIns);
        $actividades->delete();
        return back();
    }
}
