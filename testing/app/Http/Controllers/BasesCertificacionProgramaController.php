<?php


namespace App\Http\Controllers;
set_time_limit(300);

use Illuminate\Http\Request;

use App\BaseCertificacion;
use App\BasesCertificacionPrograma;
use App\VistaBaseCertificacionPrograma;
use App\SubParteMatrizCumpliProg;
use App\SubPartesBaseCertificacion;
use App\Programa;
use DB;

class BasesCertificacionProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $IdPrograma = $request->input('IdPrograma');
        $exists = DB::table('AU_Reg_BasesCertificacionPrograma')->where('IdPrograma', $IdPrograma)->first();
        $basesCertificacion = BaseCertificacion::all();

        //Valida si exietn datos den la tabla
        if($exists or !$exists){
            foreach($basesCertificacion as $baseCertificacion){
                $check = $request->input('bsp_'.$baseCertificacion->IdBaseCertificacion);
                $bcp = new BasesCertificacionPrograma;
                $bcp->IdPrograma = $IdPrograma;
                $bcp->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
                $IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;

                if ($check == 'on'){
                    
                    
                    
                    $existsAnota = DB::table('AUFACVW_BaseCertificacion_Programa')->where('IdPrograma', $IdPrograma)->where('IdBaseCertificacion', $IdBaseCertificacion)->first();
                    if(!$existsAnota)
                    {
                          
                      $bcp->save();
                     
                   
                    //Trae todas las subpartes de la norma
                    $subPartesBaseCert = SubPartesBaseCertificacion::getByBaseCertificacion($baseCertificacion->IdBaseCertificacion);

                    //Guarda todas las subpartes de la norma
                        foreach($subPartesBaseCert as $subParteBaseCert){
                            $subParPro = new SubParteMatrizCumpliProg;

                            $subParPro->IdPrograma = $IdPrograma;
                            $subParPro->IdBaseCertificacion = $baseCertificacion->IdBaseCertificacion;
                            $subParPro->NombreBaseCert = $baseCertificacion->Nombre;
                            $subParPro->Referencia = $baseCertificacion->Referencia;
                            $subParPro->SubParte = $subParteBaseCert->SubParte;
                            $subParPro->Estado = 'En Proceso';
                            $subParPro->Activo = 1;

                            $subParPro->save();
                            return redirect()->back();
                        }
                    }

                }
                else {
                    
                    
                    
                 

                 $existsDat = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->get();
                    if(count($existsDat)>0)
                    {
                        $exists = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->where('Estado','En Proceso')->first();
                        $existsAnota = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $IdPrograma)->where('Estado','Null')->first();
                        if(!$existsAnota and !$existsAnota)
                        {
                            $IdBasProg = BasesCertificacionPrograma::getByProgramas($IdPrograma,$IdBaseCertificacion)->first();

                            if($IdBasProg)
                            {
                                $basCertPro = BasesCertificacionPrograma::find($IdBasProg->IdBaseCertPrograma);
                                $basCertPro->delete();
                            }
                            //return redirect()->back();
                        }
                        //dd($existsDat);
                        else
                        {
                            $notification = array(
                                'message' => 'No es Posible Retirar Alguno de los chequeos porque tiene información asociada a la matriz de cumplimiento',
                                'alert-type' => 'Error'
                            );

                        }                        
                    }
                }             
            }

            $subParPro = new SubParteMatrizCumpliProg;

            $subParPro->IdPrograma = $IdPrograma;            
            $subParPro->SubParte = 'Control Configuración';
            $subParPro->Activo = 1;
            
            $subParPro->save();
            //dd($exists);
        }
        // else
        // {
        //     $mocsSaved = MocsSubParteMatriz::getMocsSubsBySubparte($idSubParteMatriz);

        //     foreach($mocsSaved as $mocsave)
        //     {
        //         $moc = MocsSubParteMatriz::find($mocsave->IdMocSubparte);
        //         $moc->delete();
        //     }
            
        //     foreach($mocs as $moc){
        //         $check = $request->input('moc_'.$moc->IdMOC);
        //         if ($check == 'on'){
                    
        //             $mocsub = new MocsSubParteMatriz;

        //             $mocsub->IdMOC = $moc->IdMOC;
        //             $mocsub->IdSubParteMatriz = $idSubParteMatriz;

        //             $mocsub->save();
        //         }                
        //     }
        // }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );


      /*  $basesCertificacion = BaseCertificacion::all();
        $basesCertificacionProg = BasesCertificacionPrograma::getByPrograma($IdPrograma);
*/
        return redirect('/programa')->with($notification);

//
        /*return view ('programasSecad.controlProgramas.ver_BaseCertPrograma')
                ->with('basesCertificacion', $basesCertificacion)
                ->with('basesCertificacionProg', $basesCertificacionProg)
                ->with('IdPrograma', $IdPrograma);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdPrograma)
    {
        //$basesCertificacion = VistaBaseCertificacionPrograma::getByPrograma($IdPrograma);
        //$basesCertificacion =VistaBaseCertificacionPrograma::orderBy('IdBaseCertificacion', 'asc')->distinct()->get();
        $basesCertificacion = BaseCertificacion::all();
        $programa = Programa::find($IdPrograma);
        return view('programasSecad.controlProgramas.ver_BaseCertPrograma')
                ->with('basesCertificacion', $basesCertificacion)
                ->with('IdPrograma', $IdPrograma)
                ->with('programa', $programa);
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
