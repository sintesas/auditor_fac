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

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $idPersonal = Auth::user()->IdPersonal;
        // dd($role->givePermissionTo('edit articles'));
        // $programas= Programa::all();

        if (Auth::user()->hasRole('administrador')) {
            $audiorias = Auditoria::getAuditoriasTabla();
            return view ('auditoria.ver_auditoria')->with('audiorias', $audiorias);           
        }else{
            $audiorias = Auditoria::getByUser($idPersonal);
            return view ('auditoria.ver_auditoria')->with('audiorias', $audiorias);            
        }
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

        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');

        /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

        $acciones = ["", "Realizada",
                       "Recibida"];

        return view('auditoria.crear_auditoria')
            ->with('empresas', $empresas)
            ->with('tiposAuditoria', $tiposAuditoria)
            ->with('personal', $personal);
    }

    public function store(Request $request)
    {
      $codigoAuditoria = $request->input('Codigo');
      //$codigoAuditoria = $request->Codigo;
      //var_dump($codigoAuditoria);
      $audioria = Auditoria::validateCode($codigoAuditoria)->count();

      if($audioria == 0){
        $audioria = new Auditoria;
        // store info 
        $audioria->Codigo = $request->input('Codigo');
        $audioria->FechaInicio = $request->input('FechaInicio');
        $audioria->IdEmpresa = $request->input('IdEmpresa');
        $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');
        $audioria->CargoRespo = $request->input('CargoRespo');
        $audioria->NombreAuditoria = $request->input('NombreAuditoria');
        $audioria->IdPersonalInsp = $request->input('IdPersonalInsp');
        $audioria->Accion = $request->input('Accion');
        $audioria->Lugar = $request->input('Lugar');
        $audioria->IdPersonalAudi = $request->input('IdPersonalAudi');
        $audioria->MarcoLegal = $request->input('MarcoLegal');
        $audioria->Objeto = $request->input('Objeto');
        $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');
        $audioria->FechaAperAudit = $request->input('FechaAperAudit');
        $audioria->HoraIni = $request->input('HoraInicio');
        $audioria->FechaTermino = $request->input('FechaTermino');
        $audioria->HoraTermi = $request->input('HoraTermi');
        $audioria->Alcance = $request->input('Alcance');
        $audioria->EquipoInspector = $request->input('EquipoInspector');
        $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');
        $audioria->Observaciones = $request->input('Observaciones');
        $audioria->Activo = 1; 
        $audioria->save();
        $audioria->IdAuditoria;

        return redirect()->route('auditoria.index');
      }
      else
      { 
        alert()->error('Digite otro código de auditoria', 'Código Repetido auditoria')->persistent('Close');
        return redirect()->route('auditoria.create');
      }
      
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($IdAuditoria)
    {
        $auditoria = Auditoria::find($IdAuditoria);
        // dd($auditoria);
        /*Set Dropdown Empresas*/
        $empresas = Empresa::all(['IdEmpresa', 'NombreEmpresa']);
        $empresas->prepend('None');

        /*Set Dropdown Tipo Auditoria*/
        $tiposAuditoria = TipoAuditoria::all(['IdTipoAuditoria', 'TipoAuditoria']);
        $tiposAuditoria->prepend('None');
        
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');


        return view('auditoria.editar_auditoria')
              ->withAuditoria($auditoria)
              ->with('empresas', $empresas)
              ->with('tiposAuditoria', $tiposAuditoria)
              ->with('personal', $personal);
    }

    
    public function update(Request $request, $IdAuditoria)
    {
       // store info 
       $audioria = Auditoria::find($IdAuditoria);

       $audioria->Codigo = $request->input('Codigo');
       $audioria->FechaInicio = $request->input('FechaInicio');
       $audioria->IdEmpresa = $request->input('IdEmpresa');
       $audioria->IdFuncionarioEmpresa = $request->input('IdFuncionarioEmpresa');
       $audioria->CargoRespo = $request->input('CargoRespo');
       $audioria->NombreAuditoria = $request->input('NombreAuditoria');
       $audioria->IdPersonalInsp = $request->input('IdPersonalInsp');
       $audioria->Accion = $request->input('Accion');
       $audioria->Lugar = $request->input('Lugar');
       $audioria->IdPersonalAudi = $request->input('IdPersonalAudi');
       $audioria->MarcoLegal = $request->input('MarcoLegal');
       $audioria->Objeto = $request->input('Objeto');
       $audioria->IdTipoAuditoria = $request->input('IdTipoAuditoria');
       $audioria->FechaAperAudit = $request->input('FechaAperAudit');
       $audioria->HoraIni = $request->input('HoraIni');
       $audioria->FechaTermino = $request->input('FechaTermino');
       $audioria->HoraTermi = $request->input('HoraTermi');
       $audioria->Alcance = $request->input('Alcance');
       $audioria->EquipoInspector = $request->input('EquipoInspector');
       $audioria->ExpertosTecnicos = $request->input('ExpertosTecnicos');
       $audioria->Observaciones = $request->input('Observaciones');
       $audioria->Activo = 1; 
       $audioria->save();
       
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

        // dd($exists);
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

    public function getFuncionario(Request $request, $id)
    {
        if($request->ajax())
        {
            $funcionarios = FuncionariosEmpresa::funcionario($id);
            return response()->json($funcionarios);
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
            return response()->json($empresa);
        }
    }
}
