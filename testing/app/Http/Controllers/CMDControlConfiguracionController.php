<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SubParteMatrizCumpliProg;
use App\CMDRequisitos;
use DB;

class CMDControlConfiguracionController extends Controller
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
        
        $arbol = $request->input('ckeditor');

        $arbol = str_replace('<ul>','', $arbol);
        $arbol = str_replace('</ul>','', $arbol);
        $arbol = str_replace('<div>','', $arbol);
        $arbol = str_replace('</div>','', $arbol);
        $arbol = str_replace('</li>','', $arbol);
        $arbol = str_replace(' ','', $arbol);
        $arbol = str_replace("\t", '', $arbol); // remove tabs
        $arbol = str_replace("\n", '', $arbol); // remove new lines
        $arbol = str_replace("\r", '', $arbol); // remove carriage returns
        $arbol = trim($arbol);

        $nvieles = explode("<li>", $arbol);

        foreach($nvieles as $nivel){
            if($nivel != ''){

                $requsitosCMD = new CMDRequisitos;

                $requsitosCMD->IdSubParteMatriz = $request->input('IdSubParteMatriz');
                $requsitosCMD->IdPrograma = $request->input('IdPrograma');
                $requsitosCMD->CMDNivel = $nivel;
                $requsitosCMD->Arbol = $arbol;
                $requsitosCMD->Active = 1;

                $requsitosCMD->save();
            }
        }

        $notification = array(
            'message' => 'Datos guardados correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('cmdProgramas.show', $request->input('IdPrograma'))->with($notification); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IdSubParteMatriz)
    {
        $subParteMatriz = SubParteMatrizCumpliProg::find($IdSubParteMatriz);
        $IdPrograma =  $subParteMatriz->IdPrograma;
        $cmdRequisitos = '';
        //dd($cmdRequisitos);
        $counter = DB::table('AU_Reg_CMDRequisitos')->where('IdSubParteMatriz', '=', $IdSubParteMatriz)->count();
        if ($counter > 0){
            $cmdRequisitos = CMDRequisitos::getByIdIdSubParteMatriz($IdSubParteMatriz)[0];
        }

        return view ('certificacion.cmd.ver_cmd_control_configuracion')
                ->with('IdSubParteMatriz', $IdSubParteMatriz)
                ->with('IdPrograma', $IdPrograma)
                ->with('cmdRequisitos', $cmdRequisitos)
                ->with('counter', $counter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdSubParteMatriz)
    {
        $subParteMatriz = SubParteMatrizCumpliProg::find($IdSubParteMatriz);
        $IdPrograma =  $subParteMatriz->IdPrograma;

        $cmdMatrizNiveles = CMDRequisitos::getByIdIdSubParteMatriz($IdSubParteMatriz);

        return view ('certificacion.cmd.ver_cmd_control_configuracion_matriz')
                ->with('IdSubParteMatriz', $IdSubParteMatriz)
                ->with('IdPrograma', $IdPrograma)
                ->with('cmdMatrizNiveles',$cmdMatrizNiveles);
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
