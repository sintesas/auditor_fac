<?php

namespace App\Http\Controllers;

use App\Anotacion;
use DB;
use App\VWInformePlanMejora;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InformePlanMejoraController extends Controller
{
    
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
           // $anotaciones = new Anotacion;
            $anotaciones = Anotacion::all();            
        }else{
            // $anotaciones = new Anotacion;
            $anotaciones = Anotacion::getAnotacionesByUser($idPersonal);          
        }

        return view ('auditoria.informes.ver_informe_plan_mejora')
                    ->with('anotaciones', $anotaciones);
    }
    

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($IdAnotacion)
    {
        $informemejora= VWInformePlanMejora::where('IdAnotacion','=',$IdAnotacion)->get();
        
        $idanotacion = $IdAnotacion;

        return view ('auditoria.informes.visual_informe_plan_mejora')
                    ->with('informemejora', $informemejora)->with('idanotacion', $idanotacion);
    }

   
    public function edit($IdAnotacion)
    {
        $informemejora= VWInformePlanMejora::where('IdAnotacion','=',$IdAnotacion)->get();

        return \PDF::loadView('auditoria.informes.pdf_informe_plan_mejora', ['informemejora' => $informemejora])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');
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
