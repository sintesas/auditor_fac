<?php

namespace App\Http\Controllers;

use App\Programa;
use App\VWInformeHistorialPrograma;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InformeHistorialProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $programa = Programa::all();
        // return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programa);

        $idPersonal = Auth::user()->IdPersonal;
        $idEmpresa = Auth::user()->IdEmpresa;        

        if (Auth::user()->hasRole('administrador')) {
            $programa = Programa::all();
            return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programa);          
        }else{

            if (Auth::user()->hasRole('empresario')) {
                 $programa = Programa::getProgramasTipoByEmpresa($idEmpresa);
                 return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programa);
            }
            else
            {
                $programa= Programa::getByUser($idPersonal);

                return view ('certificacion.programasSECAD.informes.ver_informe_historial_programa')->with('programa', $programa);
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
    public function show($IdPrograma)
    {
        $informeHistorialPrograma = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->orderBy('Orden', 'ASC')
            ->get();

        // dd($informeHistorialPrograma);

        $totalHoras = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->select(DB::raw("SUM(Horas) as TotalHoras"))
            ->first();
        

        return view ('certificacion.programasSECAD.informes.visual_informe_historial_programa')
                    ->with('informeHistorialPrograma', $informeHistorialPrograma)
                    ->with('totalHoras', $totalHoras);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdPrograma)
    {

        $programa = Programa::find($IdPrograma);

         $informeHistorialPrograma = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->orderBy('Orden', 'ASC')
            ->get();

        // dd($informeHistorialPrograma);

        $totalHoras = VWInformeHistorialPrograma::where('dbo.AUFACVW_InformeHistorialPrograma.IdPrograma','=',$IdPrograma)
            ->select(DB::raw("SUM(Horas) as TotalHoras"))
            ->first();

        return \PDF::loadView('certificacion.programasSECAD.informes.pdf_informe_historial_programa', 
                             ['informeHistorialPrograma' => $informeHistorialPrograma, 
                             'totalHoras' => $totalHoras])
                    ->setOption('disable-smart-shrinking', false)
                    ->setOption('margin-top', '25mm')
                    ->setOption('lowquality', false)
                    ->setOption('page-width', '280')
                    ->setOption('page-height', '380')
                    ->download('informe_historial_programa_'.$programa->NombrePrograma.'.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
