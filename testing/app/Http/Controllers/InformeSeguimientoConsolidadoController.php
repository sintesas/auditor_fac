<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
use App\VWAuditoriaYSeguimiento;
use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InformeSeguimientoConsolidadoController extends Controller
{
    
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
            $audiorias = Auditoria::all();
            return view ('auditoria.informes.ver_informe_seguimiento_consolidado')
                    ->with('audiorias', $audiorias);
        }else{
            $audiorias = Auditoria::getByUser($idPersonal);
            return view ('auditoria.informes.ver_informe_seguimiento_consolidado')
                    ->with('audiorias', $audiorias);
        }
        
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($IdAuditoria)
    {
        $informeseguimientoconsolidadoA= Auditoria::where('IdAuditoria','=',$IdAuditoria)->get();
        $informeseguimientoconsolidado= VWAuditoriaYSeguimiento::where('IdAuditoria','=',$IdAuditoria)->get();
        return view ('auditoria.informes.visual_informe_seguimiento_consolidado')
                    ->with('informeseguimientoconsolidadoA', $informeseguimientoconsolidadoA)
                    ->with('informeseguimientoconsolidado', $informeseguimientoconsolidado);
    }

    
    public function edit($IdAuditoria)
    {
        $informeseguimientoconsolidadoA= Auditoria::where('IdAuditoria','=',$IdAuditoria)->get();
        $informeseguimientoconsolidado= VWAuditoriaYSeguimiento::where('IdAuditoria','=',$IdAuditoria)->get();



        // return \PDF::loadView('auditoria.informes.pdf_informe_seguimiento_consolidado', ['informeseguimientoconsolidadoA' => $informeseguimientoconsolidadoA, 'informeseguimientoconsolidado' => $informeseguimientoconsolidado])->setOption('page-width', '315.9')->setOption('page-height', '539.7')->download('informe-inspeccion-final.pdf');

        return \PDF::loadView('auditoria.informes.pdf_informe_seguimiento_consolidado', ['informeseguimientoconsolidadoA' => $informeseguimientoconsolidadoA, 'informeseguimientoconsolidado' => $informeseguimientoconsolidado])->setOption('disable-smart-shrinking', true)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->setOption('orientation', 'Landscape')->download('informe-inspeccion-empresas.pdf');    
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
