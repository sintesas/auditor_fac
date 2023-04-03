<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
use DB;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InformeInspeccionIcfr03Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;

        if (Auth::user()->hasRole('administrador')) {
            $audiorias = Auditoria::all();
             return view ('auditoria.informes.ver_informe_inspeccion_icfr03')
                    ->with('audiorias', $audiorias);          
        }else{

            if (Auth::user()->hasRole('empresario')) {
                $audiorias = Auditoria::getByEmpresa($idEmpresa);
                return view ('auditoria.informes.ver_informe_inspeccion_icfr03')
                    ->with('audiorias', $audiorias);
            }
            else
            {
                $audiorias = Auditoria::getByUser($idPersonal);
                return view ('auditoria.informes.ver_informe_inspeccion_icfr03')
                    ->with('audiorias', $audiorias);
            }
        }
       
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdAuditoria)
    {
        $informeinspeccionicfr03= DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=3, @IdAuditoria = ?', array($IdAuditoria));
        $auditoria = Auditoria::find($IdAuditoria)->first();
        return view ('auditoria.informes.visual_informe_inspeccion_icfr03')
                    ->with('informeinspeccionicfr03', $informeinspeccionicfr03)
                    ->with('auditoria', $auditoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdAuditoria)
    {
        

        $informeinspeccionicfr03= DB::select('EXEC AUFACSP_Inf_Auditorias @ProcId=3, @IdAuditoria = ?', array($IdAuditoria));

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_icfr03', ['informeinspeccionicfr03' => $informeinspeccionicfr03])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-empresas.pdf');
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
