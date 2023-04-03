<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VWcontratoanual;
use App\VWcontratoanualsearch;

class ContratosAnualController extends Controller
{
    public function index()
    {
        $contrat = VWcontratoanual::all();
        foreach($contrat as $contrato)
        {
            $contratos = VWcontratoanualsearch::where('AñoVigencia',$contrato->Vigencia)->get();

            /*foreach($contratos as $eachcontrato)
            $porcentaje = 0;
            {
                $porcentaje+=((float)$eachcontrato->PorcentajeEjecucion);
            }
            $total = $porcentaje/count($contratos);*/
            $total = $contratos->count();
            array_add($contrato, 'total',$total);
        }

        return view('Normogramaycontratos.Contratos.ver_informe_contratoAnual')
                ->with('contrat', $contrat);
    }

    public function show($Vigencia)
    {
        //
        $contratos = VWcontratoanualsearch::find($Vigencia);
        return view('Normogramaycontratos.Contratos.formcontrolcontratosA')
            ->with('contratos', $contratos);
    }

}
