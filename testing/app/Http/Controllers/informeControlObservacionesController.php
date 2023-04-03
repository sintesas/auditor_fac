<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VWInformeResumenPrograma;
use PDF;
use App\ResumenProgramaRecord;


class informeControlObservacionesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // $programa = VWInformeResumenPrograma::all();
          $programa = VWInformeResumenPrograma::orderby('Consecutivo','ASC')->get();
          $count = VWInformeResumenPrograma::all()->count();
  
          return view ('certificacion.programasSECAD.informes.ver_informe_controlObservacion')
          ->with('programa', $programa)
          ->with('count', $count);
  
    }
    
    public function create()
    {
      $data = ResumenProgramaRecord::getLastrow();
      $fecha = date("d-m-Y G:i");
      return view ('certificacion.programasSECAD.informes.pdf_informe_controlobservaciones', compact('data','fecha'));
    }

}
