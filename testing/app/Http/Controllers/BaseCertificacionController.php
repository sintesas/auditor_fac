<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\BaseCertificacion;
use App\Origen;
use App\ClaseCertificacion;
use App\Http\Controllers\Controller;
use App\SubPartesBaseCertificacion;
use DB;

class BaseCertificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$basesCertifica = BaseCertificacion::orderBy('IdBaseCertificacion', 'desc')->paginate(10);

        $basesCertifica = BaseCertificacion::orderBy('IdBaseCertificacion', 'desc')
        ->join('dbo.AU_Mst_Origen', 'dbo.AU_Mst_BaseCertificacion.IdOrigen', '=', 'dbo.AU_Mst_Origen.IdOrigen')
        ->select(  'dbo.AU_Mst_BaseCertificacion.IdBaseCertificacion',
                   'dbo.AU_Mst_Origen.Descripcion as Origen',
                   'dbo.AU_Mst_BaseCertificacion.Autoridad',
                   'dbo.AU_Mst_BaseCertificacion.ClaseCertificacion as Clase',
                   'dbo.AU_Mst_BaseCertificacion.Referencia',
                   'dbo.AU_Mst_BaseCertificacion.Nombre',
                   'dbo.AU_Mst_BaseCertificacion.Aplicacion',
                   'dbo.AU_Mst_BaseCertificacion.FechaEnmienda')->get();


        return view ('certificacion.baseCertificacion.ver_base_certificacion')
              ->with('basesCertifica', $basesCertifica);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*Set Dropdown Empresas*/
        $origen = Origen::all(['IdOrigen', 'Descripcion']);
        $origen->prepend('None');

        /*Set Dropdown Tipo Auditoria*/
        $claseCertifi = ClaseCertificacion::all(['IdClaseCertificacion', 'Descripcion']);
        $claseCertifi->prepend('None');

        // return view('auditoria.crear_auditoria', compact('empresas', $empresas));
        return view('certificacion.baseCertificacion.crear_base_certificacion')
            ->with('origen', $origen)
            ->with('claseCertifi', $claseCertifi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $baseCertificacion = new BaseCertificacion;

      $baseCertificacion->Nombre = $request->input('Nombre');
      $baseCertificacion->Referencia = $request->input('Referencia');
      $baseCertificacion->FechaEnmienda = $request->input('FechaEnmienda');
      $baseCertificacion->ClaseCertificacion = $request->input('ClaseCertificacion');
      $baseCertificacion->IdOrigen = $request->input('IdOrigen');
      $baseCertificacion->Autoridad = $request->input('Autoridad');
      $baseCertificacion->Aplicacion = $request->input('Aplicacion');
      $baseCertificacion->Observaciones = $request->input('Observaciones');
      $baseCertificacion->EstructuraCapitulosSubPartes = $request->input('ckeditor');
      $baseCertificacion->Activo = 1;

      $baseCertificacion->save();

      // CREA ARBOL DE SUBPARTES
      $idBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
      $arbol = $request->input('ckeditor');

      $arbol = str_replace('<ul>','', $arbol);
      $arbol = str_replace('</ul>','', $arbol);
      $arbol = str_replace('</li>','', $arbol);
      $arbol = str_replace(' ','', $arbol);
      $arbol = str_replace("\t", '', $arbol); // remove tabs
      $arbol = str_replace("\n", '', $arbol); // remove new lines
      $arbol = str_replace("\r", '', $arbol); // remove carriage returns
      $arbol = trim($arbol);

      $subpartes = explode("<li>", $arbol);

      foreach($subpartes as $subparte){
        if($subparte != ''){
          $subpart = new SubPartesBaseCertificacion;

          $subpart->SubParte = $subparte;
          $subpart->IdBaseCertificacion =$idBaseCertificacion;
          $subpart->Activo = 1;

          $subpart->save();
        }

      }

      $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );

      return redirect()->route('baseCertificacion.index')->with($notification); 
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
    public function edit($IdBaseCertificacion)
    {
        $baseCertifica = BaseCertificacion::find($IdBaseCertificacion);

        $origen = Origen::all(['IdOrigen', 'Descripcion']);
        $origen->prepend('None');

        /*Set Dropdown Tipo Auditoria*/
        $claseCertifi = ClaseCertificacion::all(['IdClaseCertificacion', 'Descripcion']);
        $claseCertifi->prepend('None');

        // return view('auditoria.crear_auditoria', compact('empresas', $empresas));
        return view('certificacion.baseCertificacion.editar_base_certificacion')
            ->withBaseCertificacion($baseCertifica)
            ->with('origen', $origen)
            ->with('claseCertifi', $claseCertifi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdBaseCertificacion)
    {


      $baseCertificacion = BaseCertificacion::find($IdBaseCertificacion);

      $baseCertificacion->Nombre = $request->input('Nombre');
      $baseCertificacion->Referencia = $request->input('Referencia');
      $baseCertificacion->FechaEnmienda = $request->input('FechaEnmienda');
      $baseCertificacion->ClaseCertificacion = $request->input('ClaseCertificacion');
      $baseCertificacion->IdOrigen = $request->input('IdOrigen');
      $baseCertificacion->Autoridad = $request->input('Autoridad');
      $baseCertificacion->Aplicacion = $request->input('Aplicacion');
      $baseCertificacion->Observaciones = $request->input('Observaciones');
      $baseCertificacion->EstructuraCapitulosSubPartes = $request->input('ckeditor');
      $baseCertificacion->Activo = 1;

      $baseCertificacion->save();

      $exists = DB::table('AU_Reg_BasesCertificacionPrograma')->where('IdBaseCertificacion', $IdBaseCertificacion)->first();

      $notification = '';
      $notification2 = '';
      // dd($exists);
      if(!$exists){
        $baseCertificacion->subpartes()->delete();

        // CREA ARBOL DE SUBPARTES
        $idBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
        $arbol = $request->input('ckeditor');

        $arbol = str_replace('<ul>','', $arbol);
        $arbol = str_replace('</ul>','', $arbol);
        $arbol = str_replace('</li>','', $arbol);
        $arbol = str_replace(' ','', $arbol);
        $arbol = trim($arbol);

        $subpartes = explode("<li>", $arbol);

        foreach($subpartes as $subparte){
          if($subparte != ''){
            $subpart = new SubPartesBaseCertificacion;

            $subpart->SubParte = $subparte;
            $subpart->IdBaseCertificacion =$idBaseCertificacion;
            $subpart->Activo = 1;

            $subpart->save();
          }

        }
      }
      else {
        $notification2 = array(
          'message' => 'No se puede Actulizar las Subpartes ya que estan asiganadas a un Programa y pueden afectar su proceso de certificación', 
          'alert-type' => 'warning'
        );
      }

      $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );

       return redirect()->route('baseCertificacion.index')->with($notification)->with($notification2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdBaseCertificacion)
    {
         // USING MODELS

        $exists = DB::table('AU_Reg_BasesCertificacionPrograma')->where('IdBaseCertificacion', $IdBaseCertificacion)->first();
        
        if(!$exists){
          $basesCertifica = BaseCertificacion::find($IdBaseCertificacion);
          $basesCertifica->subpartes()->delete();
          $basesCertifica->delete();

          $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
          $notification = array(
            'message' => 'No se puede eliminar esta Base de Certificacion ya que esta asiganada a un Programa y pueden afectar su proceso de certificación', 
            'alert-type' => 'warning'
          );
        }

        
        
        return redirect()->route('baseCertificacion.index')->with($notification);
    }
}
