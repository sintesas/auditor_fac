<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InfoControlContratos;

use App\VWcontratoanualsearch;

use App\controlcontratostotal;

class InformeControlContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = InfoControlContratos::all();
        return view('Normogramaycontratos.Contratos.ver_informe_controlcontratos')
            ->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
    public function show($Vigencia)
    {
        $contratos = VWcontratoanualsearch::obtenerContratosAnio($Vigencia);
        $contratostotal = controlcontratostotal::where('AñoVigencia',$Vigencia)->get();
        $contratosAct = $contratos->where('NombreEstadoPCA','!=','CANCELADO');
        $valorTotal = 0;//Valor total presupuesto
        $valorTotalContratado = 0;//Sumatoria de valor de contratos contratado/adjudicado
        $prePorcentajeContratado =0;
        $valorEnEstructuracion =0;//Sumatoria de contratos en estructuración
        $prePorcentajeEstructuracion =0;
        $valorEjecutado = 0; //Sumatoria de contratos en ejecución
        $prePorcentajeEjecutado =0;
        foreach ($contratosAct as $contrato) 
        {
            $valorTotal+= ((int)$contrato->Valor);
            if(trim($contrato->NombreEstadoPCA)=='CONTRATADO')
            {
                $valorTotalContratado +=  ((int)$contrato->Valor);
                $prePorcentajeContratado++;
            }
            elseif(trim($contrato->NombreEstadoPCA)=='ESTRUCTURACIÓN')
            {
                $valorEnEstructuracion +=  ((int)$contrato->Valor);
                $prePorcentajeEstructuracion++;
            }
            elseif(trim($contrato->NombreEstadoPCA)=='EJECUCIÓN')
            {
                $valorEjecutado +=  ((int)$contrato->Valor);
                $prePorcentajeEjecutado++;
            }
        }

        $contratosCancelados = $contratos->where('NombreEstadoPCA','CANCELADO');
        $valorCancelado = 0; //Sumatoria de contratos contratosCancelados
        foreach ($contratosCancelados as $contrato) 
        {
            $valorCancelado+= ((int)$contrato->Valor);
        }

        $porcentajeContratado =  round($prePorcentajeContratado*100/count($contratosAct), 2);
        $porcentajeEstructuracion = round($prePorcentajeEstructuracion*100/count($contratosAct), 2);
        $porcentajeEjecutado =round($prePorcentajeEjecutado*100/count($contratosAct), 2);

        return view('Normogramaycontratos.Contratos.ver_informe_controlcontratos')
        ->with('contratostotal', $contratostotal)
        ->with('contratos', $contratos)
        ->with('valorTotal', $valorTotal)
        ->with('valorTotalContratado', $valorTotalContratado)
        ->with('valorEnEstructuracion', $valorEnEstructuracion)
        ->with('valorEjecutado', $valorEjecutado)
        ->with('valorCancelado', $valorCancelado)
        ->with('porcentajeContratado', $porcentajeContratado)
        ->with('porcentajeEstructuracion', $porcentajeEstructuracion)
        ->with('porcentajeEjecutado', $porcentajeEjecutado);
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
}
