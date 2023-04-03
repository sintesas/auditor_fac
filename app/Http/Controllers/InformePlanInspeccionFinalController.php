<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditoria;
use DB;
use App\VWInformeInspeccionFinal;
use App\UsersLDAP;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use PDF;

class InformePlanInspeccionFinalController extends Controller
{

    public function index()
    {
      $audiorias = Auditoria::all();
        /*$rol = UsersLDAP::perteneceIGEFA();

        if($rol){
            $audiorias = Auditoria::all();
        }else{
            $rol = UsersLDAP::perteneceCEOAF();
            if($rol){
                $audiorias = Auditoria::all();
            }
        }*/
        return view ('auditoria.informes.ver_informe_inspeccion_final')
            ->with('audiorias', $audiorias);
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
      //dd(VWInformeInspeccionFinal::all() ); 
        $dataAuditoria = VWInformeInspeccionFinal::getDataAuditoria($IdAuditoria);
   //var_dump($dataAuditoria);
 //die();        
//$datanewdataaudito=DB::table('AU_Reg_Auditorias')->select(['criteriosgeneral','criteriosParticular','procesosParticular'])->where('IdAuditoria','=',$IdAuditoria)->first();

   
        //$dataCriterios = VWInformeInspeccionFinal::getDataCriterios($IdAuditoria);

        $dataEquipoInspector = VWInformeInspeccionFinal::getDataEquipoInspector($IdAuditoria);

        $dataActividades = VWInformeInspeccionFinal::getDataActividades($IdAuditoria);
      //dd($dataActividades);
        $criteriosA = DB::table('AU_Reg_Auditorias')->select(['criteriosgeneral','criteriosParticular','procesosParticular'])->where('IdAuditoria','=',$IdAuditoria)->first();
        //dd($criteriosA);
         $criteriosid= explode(',',$criteriosA->criteriosgeneral);
 //dd($criteriosid);
        $criteriosGnrales = DB::table('AU_Reg_CriteriosAuditorias')->select(['Norma'])->whereIn('IdCriterio', $criteriosid)->get();
/*
+"criteriosgeneral": "2,3"
  +"criteriosParticular": "2,3,3"
  +"procesosParticular": "7,1,2"
*/
        //$criteriosA = DB::table('AU_Reg_Auditorias')->select(['criteriosgeneral'])->where('IdAuditoria','=',$IdAuditoria)->first();
        $criteriosp = explode(',', $criteriosA->criteriosParticular);
        $criteriosparticulares = DB::table('AU_Reg_CriteriosAuditorias')->select(['Norma'])->whereIn('IdCriterio', $criteriosp)->get();
        $procesosP= explode(',', $criteriosA->procesosParticular);
        //dd($procesosP);
        $procesos = DB::table('AU_Reg_ProcesosAuditorias')->select('IdProceso', 'Proceso as proces', 'SubProceso')
            ->whereIn('IdProceso', $procesosP)->get();



        //dd($procesos);

        //dd($criteriosparticulares);
       /* for ($i = 0; $i < count($procesos); $i++ ){
          echo "P".$procesos[$i]->proces." ".$procesos[$i]->SubProceso."<br>"; # code...
            for ($j = 0; $j < count($criteriosparticulares); $j++ ) {
                
              echo $criteriosparticulares[$j]->Norma."<br>";
        }
     }*/


        $EQUIPOINSPECTOR = DB::select("select P.Proceso,P.IdProceso,P.SubProceso,U.Name,U.Dependencia  from  EquiposauditoriaP EP   
                                            inner join  AU_Reg_ProcesosAuditorias P   
                                            on  EP.procesoinspector=P.IdProceso
                                            inner join AU_Reg_usersLDAP U   
                                            on  
                                            U.IdUserLDAP=EP.equipoinspector
                                            where EP.idauditoria=$IdAuditoria");

        //dd($EQUIPOINSPECTOR);
    $expertostecnicos = DB::select("select P.Proceso,P.IdProceso,P.SubProceso,U.Name,U.Dependencia  from  EquiposauditoriaP EP   
                                        inner join  AU_Reg_ProcesosAuditorias P   
                                        on  EP.procesosexpertostecnicos=P.IdProceso
                                        inner join AU_Reg_usersLDAP U   
                                        on  
                                        U.IdUserLDAP=EP.expertostecnicos
                                        where EP.idauditoria=$IdAuditoria

"); 
 //var_dump($criteriosid);

 //dd($criteriosid);
      $AU_Reg_Auditorias= DB::table('AU_Reg_Auditorias')->where('IdAuditoria','=',$IdAuditoria)->first();
        //dd($AU_Reg_Auditorias->);
        $obs = explode(',',$AU_Reg_Auditorias->Observador);
        $observadores = DB::table("AU_Reg_usersLDAP")->whereIn('IdUserLDAP',$obs)->get();

        //dd($observadores);
//print_r($observadores);        
//var_dump($observadores);
        //die();
//
//dd($dataAuditoria);
     
        return view ('auditoria.informes.visual_informe_inspeccion_final')
                    ->with('dataAuditoria', $dataAuditoria)
                    ->with('criteriosgenerales', $criteriosGnrales)
                    ->with('criteriosparticulares', $criteriosparticulares)
                   ->with('procesos', $procesos)
                    ->with('observadores',$observadores)
                     ->with('equipoinspector', $EQUIPOINSPECTOR)
                      ->with('expertostecnicos', $expertostecnicos)
                    ->with('dataActividades', $dataActividades);
    }


    public function edit($IdAuditoria)
    { $dataActividades = VWInformeInspeccionFinal::getDataActividades($IdAuditoria);
        $criteriosA = DB::table('AU_Reg_Auditorias')->select(['criteriosgeneral','criteriosParticular','procesosParticular'])->where('IdAuditoria','=',$IdAuditoria)->first();
        //dd($criteriosA);
         $criteriosid= explode(',',$criteriosA->criteriosgeneral);
 //dd($criteriosid);
        $criteriosGnrales = DB::table('AU_Reg_CriteriosAuditorias')->select(['Norma'])->whereIn('IdCriterio', $criteriosid)->get();
/*
+"criteriosgeneral": "2,3"
  +"criteriosParticular": "2,3,3"
  +"procesosParticular": "7,1,2"
*/
        //$criteriosA = DB::table('AU_Reg_Auditorias')->select(['criteriosgeneral'])->where('IdAuditoria','=',$IdAuditoria)->first();
        $criteriosp = explode(',', $criteriosA->criteriosParticular);
        $criteriosparticulares = DB::table('AU_Reg_CriteriosAuditorias')->select(['Norma'])->whereIn('IdCriterio', $criteriosp)->get();
        $procesosP= explode(',', $criteriosA->procesosParticular);
        //dd($procesosP);
        $procesos = DB::table('AU_Reg_ProcesosAuditorias')->select('IdProceso', 'Proceso as proces', 'SubProceso')
            ->whereIn('IdProceso', $procesosP)->get();



        //dd($procesos);

        //dd($criteriosparticulares);
       /* for ($i = 0; $i < count($procesos); $i++ ){
          echo "P".$procesos[$i]->proces." ".$procesos[$i]->SubProceso."<br>"; # code...
            for ($j = 0; $j < count($criteriosparticulares); $j++ ) {
                
              echo $criteriosparticulares[$j]->Norma."<br>";
        }
     }*/


        $EQUIPOINSPECTOR = DB::select("select P.Proceso,P.IdProceso,P.SubProceso,U.Name,U.Dependencia  from  EquiposauditoriaP EP   
                                            inner join  AU_Reg_ProcesosAuditorias P   
                                            on  EP.procesoinspector=P.IdProceso
                                            inner join AU_Reg_usersLDAP U   
                                            on  
                                            U.IdUserLDAP=EP.equipoinspector
                                            where EP.idauditoria=$IdAuditoria");

        //dd($EQUIPOINSPECTOR);
    $expertostecnicos = DB::select("select P.Proceso,P.IdProceso,P.SubProceso,U.Name,U.Dependencia  from  EquiposauditoriaP EP   
                                        inner join  AU_Reg_ProcesosAuditorias P   
                                        on  EP.procesosexpertostecnicos=P.IdProceso
                                        inner join AU_Reg_usersLDAP U   
                                        on  
                                        U.IdUserLDAP=EP.expertostecnicos
                                        where EP.idauditoria=$IdAuditoria

");    


    
          $AU_Reg_Auditorias= DB::table('AU_Reg_Auditorias')->where('IdAuditoria','=',$IdAuditoria)->first();
        //dd($AU_Reg_Auditorias->);
        $obs = explode(',',$AU_Reg_Auditorias->Observador);
        $observadores = DB::table("AU_Reg_usersLDAP")->whereIn('IdUserLDAP',$obs)->get();

        $dataAuditoria = VWInformeInspeccionFinal::getDataAuditoria($IdAuditoria);

        $dataCriterios = VWInformeInspeccionFinal::getDataCriterios($IdAuditoria);

        $dataEquipoInspector = VWInformeInspeccionFinal::getDataEquipoInspector($IdAuditoria);

        $dataActividades = VWInformeInspeccionFinal::getDataActividades($IdAuditoria);

        //dd($dataAuditoria);

        return \PDF::loadView('auditoria.informes.pdf_informe_inspeccion_final',
                    ['dataAuditoria' => $dataAuditoria, 'dataCriterios' => $dataCriterios, 'dataEquipoInspector' => $dataEquipoInspector, 
                'dataActividades' => $dataActividades,
                'criteriosgenerales'=> $criteriosGnrales,
                'criteriosparticulares'=> $criteriosparticulares,
                'procesos'=> $procesos,
                'observadores'=>$observadores,
                'equipoinspector'=> $EQUIPOINSPECTOR,
                'expertostecnicos'=> $expertostecnicos])->setOption('disable-smart-shrinking', false)->setOption('margin-top', '0mm')->setOption('lowquality', false)->setOption('page-size', 'A4')->download('informe-inspeccion-final.pdf');
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
