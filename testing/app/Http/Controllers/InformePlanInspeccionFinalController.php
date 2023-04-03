<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
use DB;
use App\VWInformeInspeccionFinal;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use PDF;

class InformePlanInspeccionFinalController extends Controller
{
   
    public function index()
    {

        $idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;

        if (Auth::user()->hasRole('administrador')) {
            $audiorias = Auditoria::all();
            return view ('auditoria.informes.ver_informe_inspeccion_final')
                    ->with('audiorias', $audiorias);          
        }else{

            if (Auth::user()->hasRole('empresario')) {
                $audiorias = Auditoria::getByEmpresa($idEmpresa);
                return view ('auditoria.informes.ver_informe_inspeccion_final')
                    ->with('audiorias', $audiorias);
            }
            else
            {
                $audiorias = Auditoria::getByUser($idPersonal);
                return view ('auditoria.informes.ver_informe_inspeccion_final')
                    ->with('audiorias', $audiorias);
            }
        }
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($IdAuditoria)
    {
        /*$informeinspeccion= DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=1, @IdAuditoria = ?', array($IdAuditoria));*/
        $informeinspeccion= VWInformeInspeccionFinal::where('IdAuditoria','=',$IdAuditoria)->get();
        $auditoria = Auditoria::find($IdAuditoria);

        return view ('auditoria.informes.visual_informe_inspeccion_final')
                    ->with('informeinspeccion', $informeinspeccion)
                    ->with('auditoria', $auditoria);

        // return view ('auditoria.informes.pdf_informe_inspeccion_final')
        //             ->with('informeinspeccion', $informeinspeccion);
    }

    
    public function edit($IdAuditoria)
    {

        $informeinspeccion= VWInformeInspeccionFinal::where('IdAuditoria','=',$IdAuditoria)->get();

        // return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_final', ['informeinspeccion' => $informeinspeccion])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_final', ['informeinspeccion' => $informeinspeccion])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');    
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
