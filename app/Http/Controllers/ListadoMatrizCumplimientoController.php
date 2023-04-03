<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListadoDemandaPotencial;

use App\Programa;
use App\BaseCertificacion;
use App\BasesCertificacionPrograma;
use App\SubPartesBaseCertificacion;
use App\SubParteMatrizCumpliProg;
use App\Moc;
use DB;

class ListadoMatrizCumplimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listado = Programa::leftjoin('AU_Reg_BasesCertificacionPrograma', 'AU_Reg_Programas.IdPrograma','=','AU_Reg_BasesCertificacionPrograma.IdPrograma')
      ->leftjoin('AU_Mst_BaseCertificacion', 'AU_Mst_BaseCertificacion.IdBaseCertificacion','=','AU_Reg_BasesCertificacionPrograma.IdBaseCertificacion')
      ->leftjoin('AU_Mst_MOC', 'AU_Mst_MOC.IdMOC','=','AU_Reg_BasesCertificacionPrograma.mocs')
      ->get();

      //dd($listado);


        $listDemandaPotencias = DB::table('dbo.AUFACVW_DemandaPotencial as p')->select('p.AltaRotacion',
                'p.AltosTiempos',
                'p.Anio as Año',
                'p.AnioOferta as AñoOferta',
                'p.AnioProximaEntrega as AñoProximaEntrega',
                'p.BajoMTBF',
                'p.Cantidad',
                'p.CantidadPrioridad',
                'p.CodATA',
                'p.CodigoSAP',
                'p.Complejidad',
                'p.ContratarCompra',
                'p.DeficitExistencias',
                'p.Equipo',
                'p.FabricanteOrinal as FabricanteOriginal',
                'p.FlotaAntigua',
                'p.Funcionamiento',
                'p.Identificacion',
                'p.NSN',
                'p.Nombre',
                'p.NombreCluster',
                'p.NombreEmpresa',
                'p.NombreUnidad',
                'p.Observaciones',
                'p.ObservacionesOferta',
                'p.OcurrenciaFalla',
                'p.ParteNumero',
                'p.PrioridadUMA',
                'p.PublicacionTecnica',
                'p.Severidad',
                'p.TOTAL',
                'p.TiempoEntregaOferta',
                'p.TipoLista',
                'p.UltimoPrecio',
                'p.VT',
                'p.ValorHistorico',
                'p.AnioVUC as AñoVUC',
                'p.AnioVH  as AñoVH',
                'p.ValorTotal',
                'p.ValorTotaloferta',
                'p.ValorUnitario',
                'p.ValorUnitarioOferta'
                    )->where('p.Activo',1)->distinct('p.ParteNumero')->get();

        return view ('certificacion.programasSECAD.matrizCumplimiento.ListadoMatrizCumplimiento',compact('listado'));
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
    public function edit($id)
    {
        //
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

     public function vmatrizDemandaPotencial(Request $request){
        if($request->ajax())
        {
            $dcr = date_create("today");
            $presente_anio =  date_format($dcr, 'Y') - 1;
            // $listDemandaPotencias = ListadoDemandaPotencial::getDemandaPotencialAnio($presente_anio);
            $listDemandaPotencias = DB::table('dbo.AUFACVW_DemandaPotencial as p')->select('p.AltaRotacion',
                'p.AltosTiempos',
                'p.Anio as Año',
                'p.AnioOferta as AñoOferta',
                'p.AnioProximaEntrega as AñoProximaEntrega',
                'p.BajoMTBF',
                'p.Cantidad',
                'p.CantidadPrioridad',
                'p.CodATA',
                'p.CodigoSAP',
                'p.Complejidad',
                'p.ContratarCompra',
                'p.DeficitExistencias',
                'p.Equipo',
                'p.FabricanteOrinal as FabricanteOriginal',
                'p.FlotaAntigua',
                'p.Funcionamiento',
                'p.Identificacion',
                'p.NSN',
                'p.Nombre',
                'p.NombreCluster',
                'p.NombreEmpresa',
                'p.NombreUnidad',
                'p.Observaciones',
                'p.ObservacionesOferta',
                'p.OcurrenciaFalla',
                'p.ParteNumero',
                'p.PrioridadUMA',
                'p.PublicacionTecnica',
                'p.Severidad',
                'p.TOTAL',
                'p.TiempoEntregaOferta',
                'p.TipoLista',
                'p.UltimoPrecio',
                'p.VT',
                'p.ValorHistorico',
                'p.ValorTotal',
                'p.ValorTotaloferta',
                'p.ValorUnitario',
                'p.ValorUnitarioOferta'
                    )->distinct('ParteNumero')->get();
            //$listDemandaPotencias = ListadoDemandaPotencial::all()->distinct()->select('ParteNumero')->where(1, '=', 1)->groupBy('ParteNumero')->get();

            //$auditorias = Empresa::all();
            return response()->json($listDemandaPotencias);
        }
    }

}
