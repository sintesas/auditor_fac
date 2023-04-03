<?php

namespace App\Http\Controllers;

use App\Auditoria;
use App\Empresa;
use App\TipoAuditoria;
use App\FuncionariosEmpresa;
use App\VWSeguimiento;
use App\Personal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProcesosAuditorias;

use App\CriteriosAuditorias;
use App\CriteriosAsociados;
use App\ExpertosTecnicosAsociados;
use App\UsersLDAP;

use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Permission\Models\Role;

use Alert;
use DB;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = UsersLDAP::perteneceIGEFA();
        $procesos = ProcesosAuditorias::All();

        if ($rol) {
            $audiorias = Auditoria::getAuditoriasTabla();
            $eso = Auditoria::join('dbo.AU_Reg_Empresas', 'dbo.AU_Reg_Empresas.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresa')
            //$eso = Auditoria::
            ->leftjoin('dbo.AU_Reg_Empresas as emp2', 'emp2.IdEmpresa', '=', 'dbo.AU_Reg_Auditorias.IdEmpresaAudita')
                            ->select('IdAuditoria', 'Codigo', 'AU_Reg_Empresas.SiglasNombreClave as SiglasNombreClave', 'NombreAuditoria', 'FechaInicio', 'IdTipoAuditoria', 'emp2.NombreEmpresa as EmpresaAudita')
                            ->get();
                            // echo "<pre>";
                            // dd($eso);
        }else{
            $audiorias = Auditoria::getByUserAuditorias($idPersonal, $name);
        }
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        //echo "<pre>";
        //dd($tiposAuditoria);
        return view ('auditoria.ver_auditoria')->with('audiorias', $audiorias)->with('tiposAuditoria', $tiposAuditoria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $criteriosAll = $this->getCriterios();
        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');
      
        $acciones = ["", "Realizada",
                       "Recibida"];
        $procesos = DB::table('AU_Reg_ProcesosAuditorias')->select('IdProceso', 'Proceso','SubProceso')->get();
        //DD($procesos);
        $funcionarios = UsersLDAP::all(['IdUserLDAP','Name']);
        $responsables = DB::select("select IdUserLDAP, Name from AU_Reg_usersLDAP Order by 1");
        $gradosM= DB::table('AU_Reg_usersLDAP')->select('IdUserLDAP','Name')->get();
        //var_dump($funcionarios);
        return view('auditoria.crear_auditoria')
            ->with('empresas', $empresas)
            ->with('tiposAuditoria', $tiposAuditoria)
            ->with('criterios', $criteriosAll)
            ->with('personal', $personal)
            ->with('procesos', $procesos)
            ->with('funcionarios', $funcionarios)
            ->with('responsables', $responsables)
            ->with('funcionarios2', $funcionarios)
            ->with('usuarios', $funcionarios)
            ->with('grado', $gradosM)
            ->with('grado2', $gradosM) ;  
    }

    public function store(Request $request)
    {
       
        //Fecha Actual
        $hoy = getdate();

      $codigoAuditoria = $request->input('Codigo');
      //$codigoAuditoria = $request->Codigo;
      //var_dump($codigoAuditoria);
      $audioria = Auditoria::validateCode($codigoAuditoria)->count();
      if($audioria == 0){

        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;
    
      }

$criteriosgenerales = "";          
    for ($i=0; $i <count($request->IdCriterioGeneral); $i++) {
                    $criteriosgenerales.= $request->IdCriterioGeneral[$i] . ",";
     
}


$criteriosgenerales = substr($criteriosgenerales, 0, -1);
                

  $criteriosParticular = "";

            for ($i=0; $i <count($request->IdCriterioParticular); $i++) {
                    $criteriosParticular.= $request->IdCriterioParticular[$i] . ",";
     
} 
$criteriosParticular = substr($criteriosParticular, 0, -1);
                //echo $criteriosgenerales;
                
            $procesosparticular = "";
          
             for ($i=0; $i <count($request->procesosparticular); $i++) {
                    $procesosparticular.= $request->procesosparticular[$i] . ",";
     
} 
$procesosparticular = substr($procesosparticular, 0, -1);
                


            $obsv="";
$observadores = $request->observadores;

for ($i=0; $i <count($observadores) ; $i++) {
                $obsv .= $observadores[$i].",";
}
 $obsv=substr($obsv, 0, -1);
//echo $criteriosgenerales;
                //die();

        $audioria = new Auditoria;
        // store info
        $audioria->aspecto=$request->input('Aspecto'); 
        $audioria->NombreAuditoria = $request->input('NombreAuditoria'); //Nombre Auditoria
        $audioria->FechaInicio = $request->input('FechaInicio'); //Fecha inicio Auditoria
        $audioria->Codigo = $request->input('Codigo');//Codigo Organizacion Auditada
        $audioria->IdEmpresa = $request->input('IdEmpresa');//Organizacion auditada
        $audioria->IdEmpresaAudita = $request->input('IdEmpresaAudita');//Organizacion que audita
        $audioria->IdPersonalInsp = $request->input('IdPersonalInspectorLider');//Inspector Lider
        $audioria->IdPersonalAudi = $request->input('IdPersonalAuditorLider');//Auditor Lider
        $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');//Expertos Técnicos
        $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');//Responsable
        $audioria->CargoRespo = $request->input('CargoRespo');//Cargo
        $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');//Tipo de auditoria
        $audioria->Accion = $request->input('Accion');//Accion
        $audioria->Lugar = $request->input('Lugar');//Lugar
        $audioria->Objeto = $request->input('Objeto');//Objeto
        $audioria->FechaAperAudit = $request->input('FechaAperAudit');//Fecha de apertura
        $audioria->HoraIni = $request->input('HoraInicio');//Hora Inicio
        $audioria->FechaTermino = $request->input('FechaTermino');//Fecha Termino
        $audioria->HoraTermi = $request->input('HoraTermi');//Hora termino
        $audioria->Alcance = $request->input('Alcance'); //Alcance
        $audioria->Observaciones = $request->input('Observaciones');//Observaciones
        $audioria->Observador = $obsv;
        $audioria->NameCreatedByUser = $name;
        $audioria->IdCreatedByUser = $idPersonal;
        $audioria->Activo = 1;
        $audioria->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
        $audioria->dependencia = $request->input('Dependencia');
        $audioria->criteriosgeneral = $criteriosgenerales;
        $audioria->criteriosParticular = $criteriosParticular;
        $audioria->procesosParticular = $procesosparticular;
        $audioria->save();

        //Criterios
        $IdAuditoria = $audioria->getKey();



      /*  $IdCriterios = $request->input('IdCriterios');
        if(is_array($IdCriterios)) {
            foreach ($IdCriterios AS $value) {
                $regCriteriosAsociados = new CriteriosAsociados;
                $regCriteriosAsociados->IdAuditoria = $IdAuditoria;
                $regCriteriosAsociados->IdCriterio = $value;
                $regCriteriosAsociados->save();
            }
        }

        if($request->input('EstadoInsertOrganizacion') == 'usuarioWS'){
            //Equipo Auditor FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorWS = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }else{
            //Equipo Auditor No FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorEmpresa = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }
*/
 $ProcesosINspector=$request->ProcesosINspector;
 $gradoinspector=$request->GradoEquipoInspector; 
for($i=0;$i<count($ProcesosINspector); $i++){
DB::table('EquiposauditoriaP')->insert([
    'equipoinspector' => $gradoinspector[$i],
    'procesoinspector' =>$ProcesosINspector[$i],
    'idauditoria'=> $IdAuditoria    
]);


}
$ProcesosExpertosTecnicos=$request->ProcesosExpertosTecnicos;
$gradoGradonombreEquipotecnico=$request->GradonombreEquipotecnico;
for($i=0;$i<count($ProcesosExpertosTecnicos); $i++){
                DB::table('EquiposauditoriaP')->insert([

                    'expertostecnicos' => $gradoGradonombreEquipotecnico[$i],
                    'procesosexpertostecnicos' => $ProcesosExpertosTecnicos[$i],
                    'idauditoria' => $IdAuditoria
                ]);


}




        return redirect()->route('auditoria.index');
      }
    

   

    
    public function show($id)
    {
        //
    }


 public   function  ejecutarquerys(){
        $sqlalter1 = "ALTER TABLE AU_Reg_Auditorias ADD criteriosgeneral varchar(455)";
        DB::statement($sqlalter1); 
           $sqlalter2 = "ALTER TABLE AU_Reg_Auditorias
ADD criteriosParticular varchar(455)";
        DB::statement($sqlalter2);
        $sqlalter3 = "ALTER TABLE AU_Reg_Auditorias
ADD procesosParticular varchar(455)";
        DB::statement($sqlalter3);
        $sqlalter4 = "ALTER TABLE AU_Reg_Auditorias
ADD Observador varchar(455)";
        DB::statement($sqlalter4);
        $sqltable = "CREATE TABLE dbo.EquiposauditoriaP(
	id int IDENTITY(1,1) NOT NULL,
	equipoinspector int NULL,
	procesoinspector int NULL,
	expertostecnicos int NULL,
	procesosexpertostecnicos int NULL,
	idauditoria int NULL
) ON PRIMARY
GO";
        DB::statement($sqltable);

}
 

    public function edit($IdAuditoria)
    {  
$equipoinspector=DB::table('EquiposauditoriaP')->select('equipoinspector','procesoinspector')->where('idauditoria','=',$IdAuditoria)->whereNotNull('equipoinspector')->get();
   //dd($equipoinspector);
$equipoinspectordata=array(); 
$procesoinspectordata=array(); 

foreach($equipoinspector as $key=>$value){
$equipoinspectordata[]= $value->equipoinspector;
$procesoinspectordata[]=$value->procesoinspector;
}


$expertostecnicosAuDI=DB::table('EquiposauditoriaP')->select('expertostecnicos','procesosexpertostecnicos')->where('idauditoria','=',$IdAuditoria)->whereNotNull('procesosexpertostecnicos')->get();
   //dd($expertostecnicosAuDI);
$expertosTecnicosdata=array(); 
$procesoExpertosTdata=array(); 

foreach($expertostecnicosAuDI as $key=>$value){
$expertosTecnicosdata[]= $value->expertostecnicos;
$procesoExpertosTdata[]=$value->procesosexpertostecnicos;
}

//dd(count($procesoinspectordata));
        $auditoria = Auditoria::find($IdAuditoria);
        //dd($auditoria);
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        $criterios = CriteriosAuditorias::all();
        $criteriosAll = $this->getCriterios();

        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');

        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        //Criterios
        $procesos = DB::table('AU_Reg_ProcesosAuditorias')->select('IdProceso', 'Proceso','SubProceso')->get();


        //Equipo Inspector
        $resulEquipoInspectorAsociados = ExpertosTecnicosAsociados::select('IdEquipoInspectorEmpresa')->where('IdAuditoria', '=', $IdAuditoria)->get();

        $buildEquipoInspectorAsociados = array();
        foreach(json_decode($resulEquipoInspectorAsociados) AS $value){
            $buildEquipoInspectorAsociados[] = $value->IdEquipoInspectorEmpresa;
        }

        $resulEquipoInspectorAsociadosWS = ExpertosTecnicosAsociados::select('IdEquipoInspectorWS')->where('IdAuditoria', '=', $IdAuditoria)->get();

        $buildEquipoInspectorAsociadosWS = array();
        foreach(json_decode($resulEquipoInspectorAsociadosWS) AS $value){
            $buildEquipoInspectorAsociadosWS[] = $value->IdEquipoInspectorWS;
        }
//dd($auditoria);
     $criteriosgenerales= explode(",",$auditoria->criteriosgeneral);
  //print_r($criteriosgenerales);
     $criteriosgenralesasociados= DB::table('AU_Reg_CriteriosAuditorias')->whereIn('IdCriterio',$criteriosgenerales)->get();
      $datacriteriosA=array();
     foreach ($criteriosgenralesasociados as $key => $value) {
        # code...
       $datacriteriosA[]=$value->IdCriterio;
     }
//die();
$observ=explode(",",$auditoria->Observador);

$observadores=DB::table('AU_Reg_usersLDAP')->whereIn('IdUserLDAP',$observ)->get();

$dataonservadores=array();
 foreach ($observadores as $key => $value) {
        # code...
       $dataonservadores[]=$value->IdUserLDAP;
     }



//criteriosParticular   procesosParticular
$datacriteriosParticular= explode(',',$auditoria->criteriosParticular);
$dataProcesosP=explode(',',$auditoria->procesosParticular);

$funcionarios =DB::table('AU_Reg_usersLDAP')->select(['IdUserLDAP','Name'])->get(); 
//$funcionariosData=json_encode($funcionarios)
//dd($funcionarios);
//UsersLDAP::all(['IdUserLDAP','Name']);
     //dd($criteriosgenerales);


/*

->with('funcionarios', $funcionarios)
             ->with('funcionarios2', $funcionarios)
             ->with('grado', $funcionarios)
              ->with('grado2', $funcionarios)   

*/

        return view('auditoria.editar_auditoria')
              ->withAuditoria($auditoria)
              ->with('empresas', $empresas)
              ->with('tiposAuditoria', $tiposAuditoria)
              ->with('criterios', $criteriosAll)
              ->with('usuarios', $funcionarios)
              ->with('observadores', json_encode($dataonservadores))
               ->with('criteriosgenerales', json_encode($datacriteriosA))  
              ->with('procesos', $procesos)
             
             ->with('equipoinspectordata',$equipoinspectordata)
            ->with('procesoinspectordata',$procesoinspectordata)
             ->with('expertosTecnicosdata',$expertosTecnicosdata)
           ->with('procesoExpertosTdata',$procesoExpertosTdata)   
           ->with('datacriteriosParticular',$datacriteriosParticular)
            ->with('dataProcesosP',$dataProcesosP)
            ->with('regEquipoInspectorAsociadosEmpresa', json_encode($buildEquipoInspectorAsociados))
            ->with('regEquipoInspectorAsociadosWS', json_encode($buildEquipoInspectorAsociadosWS))
            ->with('personal', $personal);
    }


    public function update(Request $request, $IdAuditoria)
    {

        //Fecha Actual
        $hoy = getdate();
 $criteriosgenerales = "";
      if(isset($request->IdCriterioGeneral)){
              
    for ($i=0; $i <count($request->IdCriterioGeneral); $i++) {
                    $criteriosgenerales.= $request->IdCriterioGeneral[$i] . ",";
     
}


$criteriosgenerales = substr($criteriosgenerales, 0, -1);
                
}
  $criteriosParticular = "";
if (isset($request->IdCriterioParticular)) {
            for ($i=0; $i <count($request->IdCriterioParticular); $i++) {
                    $criteriosParticular.= $request->IdCriterioParticular[$i] . ",";
     
} 
$criteriosParticular = substr($criteriosParticular, 0, -1);
                //echo $criteriosgenerales;
                }
            $procesosparticular = "";
            if (isset($request->procesosparticular)) {
             for ($i=0; $i <count($request->procesosparticular); $i++) {
                    $procesosparticular.= $request->procesosparticular[$i] . ",";
     
} 
$procesosparticular = substr($procesosparticular, 0, -1);
                   }


            $obsv="";
$observadores = $request->observadores;

for ($i=0; $i <count($observadores) ; $i++) {
                $obsv .= $observadores[$i].",";
}
 $obsv=substr($obsv, 0, -1);
       // store info
       $audioria = Auditoria::find($IdAuditoria);
        $audioria->aspecto=$request->input('Aspecto'); 
       $audioria->NombreAuditoria = $request->input('NombreAuditoria'); //Nombre Auditoria
        $audioria->FechaInicio = $request->input('FechaInicio'); //Fecha inicio Auditoria
        $audioria->Codigo = $request->input('Codigo');//Codigo Organizacion Auditada
        $audioria->IdEmpresa = $request->input('IdEmpresa');//Organizacion auditada
        $audioria->IdEmpresaAudita = $request->input('IdEmpresaAudita');//Organizacion que audita
        $audioria->IdPersonalInsp = $request->input('IdPersonalInspectorLider');//Inspector Lider
        $audioria->IdPersonalAudi = $request->input('IdPersonalAuditorLider');//Auditor Lider
        $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');//Expertos Técnicos
        $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');//Responsable
        $audioria->CargoRespo = $request->input('CargoRespo');//Cargo
        $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');//Tipo de auditoria
        $audioria->Accion = $request->input('Accion');//Accion
        $audioria->Lugar = $request->input('Lugar');//Lugar
        $audioria->Objeto = $request->input('Objeto');//Objeto
        $audioria->FechaAperAudit = $request->input('FechaAperAudit');//Fecha de apertura
        $audioria->HoraIni = $request->input('HoraIni');//Hora Inicio
        $audioria->FechaTermino = $request->input('FechaTermino');//Fecha Termino
        $audioria->HoraTermi = $request->input('HoraTermi');//Hora termino
        $audioria->Alcance = $request->input('Alcance'); //Alcance
        $audioria->Observaciones = $request->input('Observaciones');//Observaciones
       $audioria->Observador = $obsv;
        $audioria->Activo = 1;
        $audioria->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');

        $audioria->dependencia = $request->input('Dependencia');
        $audioria->criteriosgeneral = $criteriosgenerales;
        $audioria->criteriosParticular = $criteriosParticular;
        $audioria->procesosParticular = $procesosparticular;
       $audioria->save();

  
$deleted = DB::table('EquiposauditoriaP')->where('idauditoria', '=', $IdAuditoria)->delete();
$ProcesosINspector=$request->ProcesosINspector;
 $gradoinspector=$request->GradoEquipoInspector; 
for($i=0;$i<count($ProcesosINspector); $i++){
DB::table('EquiposauditoriaP')->insert([
    'equipoinspector' => $gradoinspector[$i],
    'procesoinspector' =>$ProcesosINspector[$i],
    'idauditoria'=> $IdAuditoria    
]);


}
$ProcesosExpertosTecnicos=$request->ProcesosExpertosTecnicos;
$GradonombreEquipotecnico=$request->GradonombreEquipotecnico;

//dd($GradonombreEquipotecnico);
for($i=0;$i<count($ProcesosExpertosTecnicos); $i++){
                
DB::table('EquiposauditoriaP')->insert([

                    'expertostecnicos' => $GradonombreEquipotecnico[$i],
                    'procesosexpertostecnicos' => $ProcesosExpertosTecnicos[$i],
                    'idauditoria' => $IdAuditoria
                ]);



}

       /*CriteriosAsociados::where('IdAuditoria', $IdAuditoria)->delete();
       $IdCriterios = $request->input('IdCriterios');
        if(is_array($IdCriterios)) {
            foreach ($IdCriterios AS $value) {
                $regCriteriosAsociados = new CriteriosAsociados;
                $regCriteriosAsociados->IdAuditoria = $IdAuditoria;
                $regCriteriosAsociados->IdCriterio = $value;
                $regCriteriosAsociados->save();
            }
        }

        ExpertosTecnicosAsociados::where('IdAuditoria', $IdAuditoria)->delete();
        if($request->input('EstadoInsertOrganizacion') == 'usuarioWS'){
            //Equipo Auditor FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorWS = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }else{
            //Equipo Auditor No FAC
            $IdEquipoInspector = $request->input('IdEquipoInpectorOption');
            if(is_array($IdEquipoInspector)) {
                foreach ($IdEquipoInspector AS $value) {
                    if($value != '' || $value != null){
                        $regExpertosTecnicos = new ExpertosTecnicosAsociados;
                        $regExpertosTecnicos->IdAuditoria = $IdAuditoria;
                        $regExpertosTecnicos->IdEquipoInspectorEmpresa = $value;
                        $regExpertosTecnicos->EstadoInsertOrganizacion = $request->input('EstadoInsertOrganizacion');
                        $regExpertosTecnicos->Created_at = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'];
                        $regExpertosTecnicos->save();
                    }
                }
            }
        }*/

       return redirect()->route('auditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdAuditoria)
    {

        $existsAnota = DB::table('AU_Reg_Anotaciones')->where('IdAuditoria', $IdAuditoria)->first();
        $existsPlane = DB::table('AU_Reg_PlanesInspeccion')->where('IdAuditoria', $IdAuditoria)->first();

        if(!$existsAnota && !$existsPlane){
            // USING MODELS
            $audioria = Auditoria::find($IdAuditoria);
            $audioria->delete();

            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar esta Auditoria ya que contiene datos de Anotaciones o Planes de Inspección.',
            'alert-type' => 'warning'
          );
        }

        return redirect()->route('auditoria.index')->with($notification);
    }

    public function getFuncionarios(Request $request, $id)
    {
        if($request->ajax())
        {
            $funcionarios = FuncionariosEmpresa::funcionariosEmpresa($id);
            return response()->json($funcionarios);
        }
    }

    public function getFuncionariosLDAP(Request $request, $id)
    {
        \Log::info($id);
        if ($request->ajax())
        {   
            //$funcionarios = UsersLDAP::all();
            $funcionarios = FuncionariosEmpresa::funcionario($id);
            return response()->json($funcionarios);
        }
    }

    public function getFuncionario(Request $request, $id)
    {
        if($request->ajax())
        {
            $funcionarios = FuncionariosEmpresa::funcionario($id);
            return response()->json($funcionarios);
        }

    }

    public function getAuditorias(Request $request, $id)
    {
        if($request->ajax())
        {
            $auditorias = Auditoria::where('IdPersonalInsp',$id);
            return response()->json($auditorias);
        }
    }

    //GET No VISITAS BY AUDITORIA
    public function getNoVisita(Request $request, $id)
    {
        if($request->ajax())
        {
            $visitas = VWSeguimiento::noVisitasAuditoria($id);
            return response()->json($visitas);
        }
    }

    //Genera Consecutivo auditoria siguente para el empresa
    public function getNextCodeAuditoriaEmpresa(Request $request, $id)
    {
      if($request->ajax())
        {     
            $empresa = Empresa::sigla($id);
            //dd($empresa);
            return response()->json($empresa);
        }
    }

    //Obtener criterios
    public function getCriterios(){
        $resultCriterios = CriteriosAuditorias::all();
        $buildSection = array();
        foreach(json_decode($resultCriterios) AS $value){
            $buildSection[$value->IdCriterio] = $value->Norma;
        }
        //dd($buildSection);
        return $buildSection;
    }

    public function siglatipo($id)
    {
       $siglas= DB::table('AU_Mst_TiposAuditoria')->select(['Sigla'])->where('IdTipoAuditoria','=',$id)->first();
       return  $siglas->Sigla;       
 
//return $siglas->sigla;

    }

}
