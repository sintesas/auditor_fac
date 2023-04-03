<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Personal;
use App\TipoDocumento;
use App\CuerposFAC;
use App\Grado;
use App\Empresa;
use App\CarrerasProfesiones;
use App\Cargos;
use App\Especialidades;
use App\EspecialidadCertificacion;
use App\NivelCompetencias;
use App\AreasExperiencia;
use App\Unidad;
use App\Fuerzas;
use App\Talleres;
use App\Grupos;
use App\Escuadrones;
use File;


class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personales = Personal::getlistPersonalWithRango();
        return view ('gestionRecursos.recursoHumano.ver_personal')
        ->with('personales', $personales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dropdown Tipo Documento
        $tipodoc = TipoDocumento::all();
        $tipodoc->prepend('None');

        //DropDawn Cuerpos
        $cuerpos = CuerposFAC::getCuerpos();
        $cuerpos->prepend('None');

        //DropDown Grado
        $grados = Grado::all();
        $grados->prepend('None');

        //DropDown Empresa
        $empresa = Empresa::all();
        $empresa->prepend('None');

        //DropDown Profesiones
        $profesiones = CarrerasProfesiones::all();
        $profesiones->prepend('None');

        //DropDown Cargos
        $cargos = Cargos::all();
        $cargos->prepend('None');

        //DropDown Especialidades
        $especialidades = Especialidades::all();
        $especialidades->prepend('None');
    
        //DropDown Especialidades
        $nivelCompetencias = NivelCompetencias::all();
        $nivelCompetencias->prepend('None');

        $areasExperiencia = AreasExperiencia::all();
        $areasExperiencia->prepend('None');

         /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

         /*Set Dropdown Unidades*/
        $unidades = Unidad::all();
        $unidades->prepend('None');

         /*Set Dropdown Fuerzas*/
        $fuerzas = Fuerzas::all();
        $fuerzas->prepend('None');
        
        /*Set Dropdown Talleres*/
        $talleres = Talleres::all();
        $talleres->prepend('None');

        /*Set Dropdown Grupos*/
        $grupos = Grupos::all();
        $grupos->prepend('None');

        /*Set Dropdown EspecialidadCertificacion*/
        $espeCert = EspecialidadCertificacion::all();
        $espeCert->prepend('None');
        
        /*Set Dropdown Escuadrones*/
        $escuadrones = Escuadrones::all();
        $escuadrones->prepend('None');
        
        //DropDown Categoria
        $acciones = ["", "Realizada",
                       "Recibida"];

        return view ('gestionRecursos.recursoHumano.crear_personal')
            ->with('tipodoc', $tipodoc)
            ->with('cuerpos', $cuerpos)
            ->with('grados', $grados)
            ->with('empresa', $empresa)
            ->with('profesiones', $profesiones)
            ->with('cargos', $cargos)
            ->with('especialidades', $especialidades)
            ->with('nivelCompetencias', $nivelCompetencias)
            ->with('areasExperiencia', $areasExperiencia)
            ->with('personal', $personal)
            ->with('unidades', $unidades)
            ->with('fuerzas', $fuerzas)
            ->with('talleres', $talleres)
            ->with('grupos', $grupos)
            ->with('espeCert', $espeCert)
            ->with('escuadrones', $escuadrones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesona = new Personal;

        // // INFORMACION BASICA
        $pesona->Categoria = $request->input('Categoria');
        $pesona->Nombres = $request->input('Nombres');
        $pesona->Apellidos = $request->input('Apellidos');
        $pesona->IdTipoDoc = $request->input('IdTipoDoc');
        $pesona->Cedula = $request->input('Cedula');
        $pesona->LugarExpedicion = $request->input('LugarExpedicion');
        $pesona->LugarNacim = $request->input('LugarNacim');
        $pesona->FechaNacim = $request->input('FechaNacim');
        $pesona->Edad = $request->input('Edad');
        $pesona->Email = $request->input('Email');
        $pesona->EmailPersonal = $request->input('EmailPersonal');
        //dd($pesona);
        if($pesona->Categoria == 'Civil')
        {

            // INFORMACION CIVIL
            $pesona->IdEmpresa = $request->input('IdEmpresa');
            $pesona->DependeciaFacultad = $request->input('DependeciaFacultad');
            $pesona->IdCarreraProfesion = $request->input('IdCarreraProfesion');
            $pesona->Escolaridad = $request->input('Escolaridad');
            $pesona->IdCargo = $request->input('IdCargo');
            $pesona->IdNivelCompetencia = $request->input('IdNivelCompetencia');
            $pesona->Experiencia = $request->input('Experiencia');
            $pesona->Fechaingreso = $request->input('FechaIncorporacionSecad');
            $pesona->IdAreaExperiencia = $request->input('IdAreaExperiencia');
            $pesona->IdSupervisor = $request->input('IdSupervisor');
            $pesona->Celular = $request->input('Celular');
            $pesona->Fijo = $request->input('Fijo');
            $pesona->Oficina = $request->input('Oficina');
            $pesona->PaisResidencia = $request->input('PaisResidencia');
            $pesona->FechaTermino = $request->input('FechaTermino');
            $pesona->EstadoCivil = $request->input('EstadoCivil');
            $pesona->DireccionResi = $request->input('DireccionResi');
            $pesona->Barrio = $request->input('Barrio');
            
            // INFORMACION MILITAR
            $pesona->IdGrado = NULL;
            $pesona->CodMilitar = 'NULL';
            $pesona->NoFolioVida = 'NULL';
            $pesona->IdFuerza = NULL;
            $pesona->IdCuerpo = NULL;
            $pesona->IdEspecialidad1 = NULL;
            $pesona->IdEspecialidad2 = NULL;
            $pesona->IdEspecialidadCertificacion = NULL;
            $pesona->FechaIncorporacion = '1900-01-01';
            $pesona->FechaAsense = '1900-01-01';
            $pesona->IdUnidad = NULL;
            $pesona->IdGrupo = NULL;
            $pesona->IdTaller = NULL;
            $pesona->IdEscuadron = NULL;
        }
        else
        {
            // INFORMACION CIVIL
            $pesona->IdEmpresa = NULL;
            $pesona->DependeciaFacultad = 'NULL';
            $pesona->IdCarreraProfesion = $request->input('IdCarreraProfesionMil');
            $pesona->Escolaridad = 'NULL';
            $pesona->IdCargo = $request->input('IdCargoMil');
            $pesona->IdNivelCompetencia = $request->input('IdNivelCompetenciaMil');
            $pesona->Experiencia = 'NULL';
            $pesona->Fechaingreso = '1900-01-01';
            $pesona->IdAreaExperiencia =  NULL;
            $pesona->IdSupervisor = NULL;
            $pesona->Celular = 'NULL';
            $pesona->Fijo = 'NULL';
            $pesona->Oficina = 'NULL';
            $pesona->PaisResidencia = 'NULL';
            $pesona->FechaTermino = '1900-01-01';
            $pesona->EstadoCivil = 'NULL';
            $pesona->DireccionResi = 'NULL';
            $pesona->Barrio = 'NULL';
            
            // INFORMACION MILITAR
            $pesona->IdGrado = $request->input('IdGrado');
            $pesona->CodMilitar = $request->input('CodigoMilitar');
            $pesona->NoFolioVida = $request->input('NFolio');
            $pesona->IdFuerza = $request->input('IdFuerza');
            $pesona->IdCuerpo = $request->input('IdCuerpo');
            $pesona->IdEspecialidad1 = $request->input('IdEspecialidad1');
            $pesona->IdEspecialidad2 = $request->input('IdEspecialidad2');
            $pesona->FechaIncorporacion = $request->input('FechaIncorporacion');
            $pesona->FechaAsense = $request->input('FechaAsense');
            $pesona->IdUnidad = $request->input('IdUnidad');
            $pesona->IdGrupo = $request->input('IdGrupo');
            $pesona->IdTaller = $request->input('IdTaller');
            $pesona->IdEspecialidadCertificacion = $request->input('IdEspecialidadCertificacion');
            $pesona->IdEscuadron = $request->input('IdEscuadron');
            
        }
        
        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\Personal\\Fotos\\' . $pesona->Cedula);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->foto;
            $fileName = $file->getClientOriginalName();
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $pesona->Foto = $photo;
            
        }
        else
        {
            $pesona->Foto = 'user.png';
            
        }
        //dd($pesona);
        $pesona->Active = 1;
        $pesona->save();
        return redirect()->route('personal.index');
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
    public function edit($IdPersonal)
    {
        //dropdown Tipo Documento
        $tipodoc = TipoDocumento::all();
        $tipodoc->prepend('None');

        //DropDawn Cuerpos
        $cuerpos = CuerposFAC::all();
        $cuerpos->prepend('None');

        //DropDown Grado
        $grados = Grado::all();
        $grados->prepend('None');

        //DropDown Empresa
        $empresa = Empresa::all();
        $empresa->prepend('None');

        //DropDown Profesiones
        $profesiones = CarrerasProfesiones::all();
        $profesiones->prepend('None');

        //DropDown Cargos
        $cargos = Cargos::all();
        $cargos->prepend('None');

        //DropDown Especialidades
        $especialidades = Especialidades::all();
        $especialidades->prepend('None');
    
        //DropDown Especialidades
        $nivelCompetencias = NivelCompetencias::all();
        $nivelCompetencias->prepend('None');

        $areasExperiencia = AreasExperiencia::all();
        $areasExperiencia->prepend('None');

         /*Set Dropdown Personal*/
        $personal = Personal::getPersonalWithRango();
        $personal->prepend('None');

         /*Set Dropdown Unidades*/
        $unidades = Unidad::all();
        $unidades->prepend('None');

         /*Set Dropdown Fuerzas*/
        $fuerzas = Fuerzas::all();
        $fuerzas->prepend('None');
        
        /*Set Dropdown Talleres*/
        $talleres = Talleres::all();
        $talleres->prepend('None');

        /*Set Dropdown Grupos*/
        $grupos = Grupos::all();
        $grupos->prepend('None');

        /*Set Dropdown EspecialidadCertificacion*/
        $espeCert = EspecialidadCertificacion::all();
        $espeCert->prepend('None');
        
        /*Set Dropdown Escuadrones*/
        $escuadrones = Escuadrones::all();
        $escuadrones->prepend('None');
        
        //DropDown Categoria
        $acciones = ["", "Realizada",
                       "Recibida"];

        $personal = Personal::find($IdPersonal);

        return view('gestionRecursos.recursoHumano.editar_personal')
            ->with('personal', $personal)
            ->with('tipodoc', $tipodoc)
            ->with('cuerpos', $cuerpos)
            ->with('grados', $grados)
            ->with('empresa', $empresa)
            ->with('profesiones', $profesiones)
            ->with('cargos', $cargos)
            ->with('especialidades', $especialidades)
            ->with('nivelCompetencias', $nivelCompetencias)
            ->with('areasExperiencia', $areasExperiencia)
            ->with('personal', $personal)
            ->with('unidades', $unidades)
            ->with('fuerzas', $fuerzas)
            ->with('talleres', $talleres)
            ->with('grupos', $grupos)
            ->with('espeCert', $espeCert)
            ->with('escuadrones', $escuadrones);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdPersonal)
    {
        $pesona = Personal::find($IdPersonal);

        // // INFORMACION BASICA
        $pesona->Categoria = $request->input('Categoria');
        $pesona->Nombres = $request->input('Nombres');
        $pesona->Apellidos = $request->input('Apellidos');
        $pesona->IdTipoDoc = $request->input('IdTipoDoc');
        $pesona->Cedula = $request->input('Cedula');
        $pesona->LugarExpedicion = $request->input('LugarExpedicion');
        $pesona->LugarNacim = $request->input('LugarNacim');
        $pesona->FechaNacim = $request->input('FechaNacim');
        $pesona->Edad = $request->input('Edad');
        $pesona->Email = $request->input('Email');
        $pesona->EmailPersonal = $request->input('EmailPersonal');
        //dd($pesona);
        if($pesona->Categoria == 'Civil')
        {

            // INFORMACION CIVIL
            $pesona->IdEmpresa = $request->input('IdEmpresa');
            $pesona->DependeciaFacultad = $request->input('DependeciaFacultad');
            $pesona->IdCarreraProfesion = $request->input('IdCarreraProfesion');
            $pesona->Escolaridad = $request->input('Escolaridad');
            $pesona->IdCargo = $request->input('IdCargo');
            $pesona->IdNivelCompetencia = $request->input('IdNivelCompetencia');
            $pesona->Experiencia = $request->input('Experiencia');
            $pesona->Fechaingreso = $request->input('FechaIncorporacionSecad');
            $pesona->IdAreaExperiencia = $request->input('IdAreaExperiencia');
            $pesona->IdSupervisor = $request->input('IdSupervisor');
            $pesona->Celular = $request->input('Celular');
            $pesona->Fijo = $request->input('Fijo');
            $pesona->Oficina = $request->input('Oficina');
            $pesona->PaisResidencia = $request->input('PaisResidencia');
            $pesona->FechaTermino = $request->input('FechaTermino');
            $pesona->EstadoCivil = $request->input('EstadoCivil');
            $pesona->DireccionResi = $request->input('DireccionResi');
            $pesona->Barrio = $request->input('Barrio');
            
            // INFORMACION MILITAR
            $pesona->IdGrado = NULL;
            $pesona->CodMilitar = 'NULL';
            $pesona->NoFolioVida = 'NULL';
            $pesona->IdFuerza = NULL;
            $pesona->IdCuerpo = NULL;
            $pesona->IdEspecialidad1 = NULL;
            $pesona->IdEspecialidad2 = NULL;
            $pesona->IdEspecialidadCertificacion = NULL;
            $pesona->FechaIncorporacion = '1900-01-01';
            $pesona->FechaAsense = '1900-01-01';
            $pesona->IdUnidad = NULL;
            $pesona->IdGrupo = NULL;
            $pesona->IdTaller = NULL;
            $pesona->IdEscuadron = NULL;
        }
        else
        {
            // INFORMACION MILITAR
            $pesona->IdEmpresa = NULL;
            $pesona->DependeciaFacultad = 'NULL';
            $pesona->IdCarreraProfesion = $request->input('IdCarreraProfesion');
            $pesona->Escolaridad = 'NULL';
            $pesona->IdCargo = $request->input('IdCargo');
            $pesona->IdNivelCompetencia = $request->input('IdNivelCompetencia');
            $pesona->Experiencia = 'NULL';
            $pesona->Fechaingreso = '1900-01-01';
            $pesona->IdAreaExperiencia =  NULL;
            $pesona->IdSupervisor = NULL;
            $pesona->Celular = 'NULL';
            $pesona->Fijo = 'NULL';
            $pesona->Oficina = 'NULL';
            $pesona->PaisResidencia = 'NULL';
            $pesona->FechaTermino = '1900-01-01';
            $pesona->EstadoCivil = 'NULL';
            $pesona->DireccionResi = 'NULL';
            $pesona->Barrio = 'NULL';
            
            // INFORMACION MILITAR
            $pesona->IdGrado = $request->input('IdGrado');
            $pesona->CodMilitar = $request->input('CodigoMilitar');
            $pesona->NoFolioVida = $request->input('NFolio');
            $pesona->IdFuerza = $request->input('IdFuerza');
            $pesona->IdCuerpo = $request->input('IdCuerpo');
            $pesona->IdEspecialidad1 = $request->input('IdEspecialidad1');
            $pesona->IdEspecialidad2 = $request->input('IdEspecialidad2');
            $pesona->FechaIncorporacion = $request->input('FechaIncorporacion');
            $pesona->FechaAsense = $request->input('FechaAsense');
            $pesona->IdUnidad = $request->input('IdUnidad');
            $pesona->IdGrupo = $request->input('IdGrupo');
            $pesona->IdTaller = $request->input('IdTaller');
            $pesona->IdEspecialidadCertificacion = $request->input('IdEspecialidadCertificacion');
            $pesona->IdEscuadron = $request->input('IdEscuadron');
            
        }
        
        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\\Personal\\Fotos\\' . $pesona->Cedula);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->foto;
            $fileName = $file->getClientOriginalName();
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $pesona->Foto = $photo;
            
        }
        
        //dd($pesona);
        $pesona->Active = 1;
        $pesona->save();
        return redirect()->route('personal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdPersonal)
    {
        try {
            $persona = Personal::find($IdPersonal);
            $persona->delete();

            return redirect()->route('personal.index');
        }
        catch (\Exception $e) {
            $notification = array(
                'message' => 'Este Usuario tiene datos asociados, no se puede eliminar', 
                'alert-type' => 'error'
            );
            //return $e->getMessage();
            return back()->with($notification);
        }
    }

    //Carga los datos de cuerpo dependiendo del Grado
    public function getCuerposByGrado(Request $request, $id)
    {
      if($request->ajax())
        {
            $cuerpos = CuerposFAC::getCuerposByGrado($id);
            return response()->json($cuerpos);
        }
    }
}
