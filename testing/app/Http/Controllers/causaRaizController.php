<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CausaRaiz;
use App\ProgramaCalidad;
use App\FuenteAnotacion;
use App\ProcesoInterno;
use App\TipoAnotacion;
use App\CriticidadAnotacion;
Use App\Auditoria;
Use App\Anotacion;
Use App\Aspecto5m;
Use App\Fivem;

class causaRaizController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $causaRaiz = new CausaRaiz;

        $causaRaiz->IdAnotacion = $request->input('IdAnotacion');
        $causaRaiz->Id5M = $request->input('Id5M');
        $causaRaiz->IdAspecto5M = $request->input('IdAspecto5M');
        $causaRaiz->Priorizacion = $request->input('Priorizacion');
        $causaRaiz->CausaRaiz = $request->input('CausaRaiz');
        $causaRaiz->AccionTarea = $request->input('AccionTarea');
        $causaRaiz->FechaInicio = $request->input('FechaInicio');
        $causaRaiz->FechaTermino = $request->input('FechaTermino');
        $causaRaiz->Responsable = $request->input('Responsable');
        $causaRaiz->Entregable = $request->input('Entregable');

        // dd($causaRaiz);

        $causaRaiz->save();

        return back();

    }

    
    public function show($IdAnotacion)
    {   


        $causasRaiz = Anotacion::find($IdAnotacion)->causasraiz;

        $anotacion = Anotacion::find($IdAnotacion);

        $aspectos5m = Aspecto5m::all(['IdAspecto5M', 'Aspecto']);

        $record5m = Fivem::all(['Id5M', 'Metodo']);

        return view('auditoria.anotaciones.ver_detalle_anotacion')
        ->with('anotacion', $anotacion)
        ->with('causasRaiz', $causasRaiz)
        ->with('aspectos5m', $aspectos5m)
        ->with('record5m', $record5m);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $causaRaiz = CausaRaiz::find($request->IdCausaRaiz);

        $causaRaiz->Id5M = $request->input('Id5M');
        $causaRaiz->IdAspecto5M = $request->input('IdAspecto5M');
        $causaRaiz->Priorizacion = $request->input('Priorizacion');
        $causaRaiz->CausaRaiz = $request->input('CausaRaiz');
        $causaRaiz->AccionTarea = $request->input('AccionTarea');
        $causaRaiz->FechaInicio = $request->input('FechaInicio');
        $causaRaiz->FechaTermino = $request->input('FechaTermino');
        $causaRaiz->Responsable = $request->input('Responsable');
        $causaRaiz->Entregable = $request->input('Entregable');

        // dd($causaRaiz);

        $causaRaiz->save();

        return back();
    }

    
    public function destroy($IdCausaRaiz)
    {
        $causaRaiz = CausaRaiz::find($IdCausaRaiz);
        $causaRaiz->delete();
        return back();
    }
}
