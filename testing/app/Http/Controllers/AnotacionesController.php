<?php

namespace App\Http\Controllers;
set_time_limit(300);

use Illuminate\Http\Request;

use App\ProgramaCalidad;
use App\FuenteAnotacion;
use App\ProcesoInterno;
use App\TipoAnotacion;
use App\CriticidadAnotacion;
Use App\Auditoria;
Use App\Anotacion;
Use App\CausaRaiz;
Use App\Aspecto5m;
Use App\Fivem;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AnotacionesController extends Controller
{
   
    public function index()
    {
        
       

        $idPersonal = Auth::user()->IdPersonal;

        if (Auth::user()->hasRole('administrador')) {
           // $anotaciones = new Anotacion;
            $anotaciones = Anotacion::all();            
        }else{
            // $anotaciones = new Anotacion;
            $anotaciones = Anotacion::getAnotacionesByUser($idPersonal);          
        }

         return view('auditoria.anotaciones.ver_tablas_anotaciones')
                ->with('anotaciones', $anotaciones);
    }

    //Genera Consecutivo auditoria siguente para el empresa
    public function getMarcoLegal(Request $request, $id){
      if($request->ajax())
        {
            $anotacion = Anotacion::sigla($id);
            return response()->json($anotacion);
        }
    }



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

        $programasCalidad = ProgramaCalidad::all(['IdProgramaCalidad', 'ProgramaCalidad']);
        $programasCalidad->prepend('none');

        $fuentesAnotacion = FuenteAnotacion::all(['IdFuentesAnotacion', 'Fuente']);
        $fuentesAnotacion->prepend('none');

        $procesosInternos = ProcesoInterno::all(['IdProcesoInterno', 'Descripcion']);
        $procesosInternos->prepend('none');

        $tiposAnotacion = TipoAnotacion::all(['IdTipoAnotacion','Anotacion']);
        $tiposAnotacion->prepend('none');

        $criticidadesAnotacion = CriticidadAnotacion::all(['IdCriticidadAnotacion','CriticidadAnotacion']);
        $criticidadesAnotacion->prepend('none');

        return view ('auditoria.anotaciones.crear_anotacion')
            ->with('auditorias', $auditorias)
            ->with('programasCalidad', $programasCalidad)
            ->with('fuentesAnotacion', $fuentesAnotacion)
            ->with('procesosInternos', $procesosInternos)
            ->with('tiposAnotacion', $tiposAnotacion)
            ->with('criticidadesAnotacion', $criticidadesAnotacion);
    }

   
    public function store(Request $request)
    {
        $anotacion = new Anotacion;

        $anotacion->IdAuditoria = $request->input('IdAuditoria');
        $anotacion->IdTipoAnotacion = $request->input('IdTipoAnotacion');
        $anotacion->Fecha = $request->input('Fecha');
        $anotacion->IdFuentesAnotacion = $request->input('IdFuentesAnotacion');
        $anotacion->Antecedente = $request->input('Antecedente');
        $anotacion->IdEnUnaAnotacion = $request->input('IdEnUnaAnotacion');
        $anotacion->DescripcionEvidencia = $request->input('DescripcionEvidencia');
        // $anotacion->IdPersonalAudi = $request->input('IdPersonalAudi');
        // $anotacion->IdPersonalResponsa = $request->input('IdPersonalResponsa');
        $anotacion->IdProcesoInterno = $request->input('IdProcesoInterno');
        $anotacion->IdProgramaCalidad = $request->input('IdProgramaCalidad');
        $anotacion->IdCriticidadAnotacion = $request->input('IdCriticidadAnotacion');
        $anotacion->Referencia = $request->input('Referencia');
        $anotacion->Correccion = $request->input('Correccion');
        $anotacion->NoAnota = $request->input('NoAnota');
        $anotacion->Plazo = $request->input('Plazo');
        $anotacion->IdClaseAnotacion = $request->input('Clase');
        $anotacion->AuditoriaAnterior = $request->input('AuditoriaAnterior');

        // dd($anotacion);

        $anotacion->save();

        return redirect()->route('anotacion.index');
    }

    
    public function show($id)
    {
        

    }

   
    public function edit($IdAnotacion)
    {
        $anotacion = Anotacion::find($IdAnotacion);

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

        $programasCalidad = ProgramaCalidad::all(['IdProgramaCalidad', 'ProgramaCalidad']);
        $programasCalidad->prepend('none');

        $fuentesAnotacion = FuenteAnotacion::all(['IdFuentesAnotacion', 'Fuente']);
        $fuentesAnotacion->prepend('none');

        $procesosInternos = ProcesoInterno::all(['IdProcesoInterno', 'Descripcion']);
        $procesosInternos->prepend('none');

        $tiposAnotacion = TipoAnotacion::all(['IdTipoAnotacion','Anotacion']);
        $tiposAnotacion->prepend('none');

        $criticidadesAnotacion = CriticidadAnotacion::all(['IdCriticidadAnotacion','CriticidadAnotacion']);
        $criticidadesAnotacion->prepend('none');

        return view ('auditoria.anotaciones.editar_anotacion')
            ->with('auditorias', $auditorias)
            ->with('programasCalidad', $programasCalidad)
            ->with('fuentesAnotacion', $fuentesAnotacion)
            ->with('procesosInternos', $procesosInternos)
            ->with('tiposAnotacion', $tiposAnotacion)
            ->with('criticidadesAnotacion', $criticidadesAnotacion)
            ->with('anotacion', $anotacion);
    }

   
    public function update(Request $request, $IdAnotacion)
    {
        $anotacion = Anotacion::find($IdAnotacion);

        $anotacion->IdAuditoria = $request->input('IdAuditoria');
        $anotacion->IdTipoAnotacion = $request->input('IdTipoAnotacion');
        $anotacion->Fecha = $request->input('Fecha');
        $anotacion->IdFuentesAnotacion = $request->input('IdFuentesAnotacion');
        $anotacion->Antecedente = $request->input('Antecedente');
        $anotacion->IdEnUnaAnotacion = $request->input('IdEnUnaAnotacion');
        $anotacion->DescripcionEvidencia = $request->input('DescripcionEvidencia');
        // $anotacion->IdPersonalAudi = $request->input('IdPersonalAudi');
        // $anotacion->IdPersonalResponsa = $request->input('IdPersonalResponsa');
        $anotacion->IdProcesoInterno = $request->input('IdProcesoInterno');
        $anotacion->IdProgramaCalidad = $request->input('IdProgramaCalidad');
        $anotacion->IdCriticidadAnotacion = $request->input('IdCriticidadAnotacion');
        $anotacion->Referencia = $request->input('Referencia');
        $anotacion->Correccion = $request->input('Correccion');
        $anotacion->NoAnota = $request->input('NoAnota');
        $anotacion->IdClaseAnotacion = $request->input('Clase');

        $anotacion->save();
        return redirect('/anotacion');
    }

    
    public function destroy($id)
    {
        $anotacion = Anotacion::find($id);
        $anotacion->causasraiz()->forceDelete();
        $anotacion->EstadoAnotacion = 0;
        $anotacion->save();

        $notification = array(
          'message' => 'Se ha eliminado la anotación correctamente',
          'alert-type' => 'success'
        );

        return redirect('anotacion')->with($notification);

    }


    //Genera Consecutivo de anotacion pox auditoria siguente para el empresa
    public function getNextNotaAuditoria(Request $request, $IdAuditoria)
    {
      if($request->ajax())
        {
            $anotacion = Anotacion::getNextNotaAuditoria($IdAuditoria);
            return response()->json($anotacion);
        }
    }
}
