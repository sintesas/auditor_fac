<?php

namespace App\Http\Controllers;

use App\SeguimientoCausaRaiz;
use App\Anotacion;
use App\CausaRaiz;
use App\EstadoSeguimiento;
use App\Auditoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeguimientoCausaRaizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
            $seguimientos = SeguimientoCausaRaiz::getAll(); 
           
        }else{
            $seguimientos = SeguimientoCausaRaiz::getByUser($idPersonal); 
        }

        return view ('auditoria.ver_seguimiento_causa_raiz')->with('seguimientos', $seguimientos);

        $result = File::makeDirectory('/certifi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
            //Set Dropdown Auditoria
            $auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditorias->prepend('None');  
           
        }else{
            //Set Dropdown Auditoria
            $auditorias = Auditoria::getByUser($idPersonal);
            $auditorias->prepend('None'); 
        }

        // /* Caraa Combo Anotcaciones*/
        $anotaciones = Anotacion::all();
        $anotaciones->prepend('None');

        $causasRaiz = CausaRaiz::all();
        $causasRaiz->prepend('None');

        $estadosSeguimiento = EstadoSeguimiento::all(['IdEstadoSeguimiento', 'NombreEstado']);
        $estadosSeguimiento->prepend('None');

        return view('auditoria.crear_seguimiento_causa_raiz')
                ->with('anotaciones', $anotaciones)
                ->with('causasRaiz', $causasRaiz)
                ->with('estadosSeguimiento', $estadosSeguimiento)
                ->with('auditorias', $auditorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*Create Plan Inspeccion */
       $seguimiento = new SeguimientoCausaRaiz;
       // store info 
       $seguimiento->IdAnotacion = $request->input('IdAnotacion');
       $seguimiento->IdCausaRaiz = $request->input('IdCausaRaiz');
       $seguimiento->AccionSeguimiento = $request->input('AccionSeguimiento');
       $seguimiento->Porcentaje = $request->input('Porcentaje');
       $seguimiento->IdEstadoSeguimiento = $request->input('IdEstadoSeguimiento');
       $seguimiento->FechaSeguimiento = $request->input('FechaSeguimiento');
       $seguimiento->IdAuditoria = $request->input('IdAuditoria');
       $seguimiento->Codigo = $request->input('Codigo');
       $seguimiento->Fortalezas = $request->input('Fortalezas');
       $seguimiento->Limitaciones = $request->input('Limitaciones');
       $seguimiento->Anexos = $request->input('Anexos');
       $seguimiento->Auditor = $request->input('Auditor');
       $seguimiento->Activo = 1; 
       $seguimiento->save();

       
         //dd($_FILES);
        $path = public_path().'/uploads/';
        $files = $request->file('file');
        //dd($files);
        //foreach($files as $file){
        if ($files != null){
            $fileName = $files->getClientOriginalName();
            $files->move($path, $fileName);
        //}
        }
        //return redirect()->route('seguimientoCausaRaiz.create');
        return redirect()->route('seguimientoCausaRaiz.index');
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
    public function edit($IdSeguimiento)
    {
        $seguimientos = SeguimientoCausaRaiz::find($IdSeguimiento);

        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
            //Set Dropdown Auditoria
            $auditorias = Auditoria::all(['IdAuditoria', 'Codigo']);
            $auditorias->prepend('None');  
           
        }else{
            //Set Dropdown Auditoria
            $auditorias = Auditoria::getByUser($idPersonal);
            $auditorias->prepend('None'); 
        }  

        /* Caraa Combo Anotcaciones*/
        $anotaciones = Anotacion::all();
        $anotaciones->prepend('None');

        $causasRaiz = CausaRaiz::all();
        $causasRaiz->prepend('None');

        $estadosSeguimiento = EstadoSeguimiento::all(['IdEstadoSeguimiento', 'NombreEstado']);
        $estadosSeguimiento->prepend('None');

        return view('auditoria.editar_seguimiento_causa_raiz')
                ->withSeguimientoCausaRaiz($seguimientos)
                ->with('anotaciones', $anotaciones)
                ->with('causasRaiz', $causasRaiz)
                ->with('estadosSeguimiento', $estadosSeguimiento)
                ->with('auditorias', $auditorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdSeguimiento)
    {
        $seguimiento = SeguimientoCausaRaiz::find($IdSeguimiento);

        $seguimiento->IdAnotacion = $request->input('IdAnotacion');
        $seguimiento->IdCausaRaiz = $request->input('IdCausaRaiz');
        $seguimiento->AccionSeguimiento = $request->input('AccionSeguimiento');
        $seguimiento->Porcentaje = $request->input('Porcentaje');
        $seguimiento->IdEstadoSeguimiento = $request->input('IdEstadoSeguimiento');
        $seguimiento->FechaSeguimiento = $request->input('FechaSeguimiento');
        // $seguimiento->Codigo = $request->input('Codigo');
        $seguimiento->Fortalezas = $request->input('Fortalezas');
        $seguimiento->Limitaciones = $request->input('Limitaciones');
        $seguimiento->Anexos = $request->input('Anexos');
        $seguimiento->Auditor = $request->input('Auditor');
        $seguimiento->Activo = 1; 
        $seguimiento->save();

       return redirect()->route('seguimientoCausaRaiz.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdSeguimiento)
    {
        $seguimiento = SeguimientoCausaRaiz::find($IdSeguimiento);
        // delete
        $seguimiento->delete();
        
        return redirect()->route('seguimientoCausaRaiz.index');
    }

    public function getAuditor(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $auditoria = Auditoria::getAuditor($IdAuditoria);
            return response()->json($auditoria);
        }
    }

    public function getAnotacionesAuditoria(Request $request, $IdAuditoria){
        if($request->ajax())
        {
            $anotaciones = Anotacion::getAnotacionesAuditoria($IdAuditoria);
            return response()->json($anotaciones);
        }
    }

    public function getCausaRaizaAnotacion(Request $request, $IdAnotacion)
    {
        if($request->ajax())
        {
            $causasRaiz = CausaRaiz::where('IdAnotacion',$IdAnotacion)->get();
            return response()->json($causasRaiz);
        }
    }

}
