<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programa;
use App\BaseCertificacion;
use App\SubPartesBaseCertificacion;
use App\SubParteMatrizCumpliProg;
use App\Moc;
use DB;

class matrizCumplimientoController extends Controller
{
    
    public function index()
    {
        $programas = Programa::getProgramasTipo();

        return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento_progamas')
                ->with('programas', $programas);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $req)
    {
        
        //understand where to begin the loop



        // $currentIdSuparte = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $req->IdPrograma)->first();


        // $last_record = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', $req->IdPrograma)->orderBy('IdSubparteMatriz', 'desc')->get();


        // $shit = $req->IdSubParteMatriz;

        // foreach ($req->IdPrograma as $key => $v) {
            
        //     SubParteMatrizCumpliProg::firstOrNew(

        //         ['IdSubParteMatriz', $req->IdSubParteMatriz [$key], ],

        //         ['IdSubParteMatriz' => $req->IdSubParteMatriz [$key],
        //         'CodigoRquisito' => $req->CodigoRquisito [$key],
        //         'NombreRequisito' => $req->NombreRequisito [$key],
        //         'DescripcioRequisito' => $req->DescripcioRequisito [$key],
        //         'GuiaAplicable' =>$req->GuiaAplicable [$key],
        //         ]);

        // }

        // key = arrayindex -> and value is equal to the value that comes along with the index to the right


            foreach ($req->IdSubParteMatriz as $key => $v) {

                SubParteMatrizCumpliProg::whereIn('IdSubParteMatriz', [$v])
                ->update([
                'CodigoRquisito' => $req->CodigoRquisito [$key],
                'NombreRequisito' => $req->NombreRequisito [$key],
                'DescripcioRequisito' => $req->DescripcioRequisito [$key],
                'GuiaAplicable' => $req->GuiaAplicable [$key]
                ]);

                

            }


        // foreach ($req->IdSubParteMatriz as $key => $v) {
        //     DB::table('AU_Reg_SubParteMatrizCumpliProg')
        //     ->where('IdSubParteMatriz', $req->IdSubparteMatriz[$key])
        //     ->update(['CodigoRquisito' => $req->CodigoRquisito[$key],
        //               'NombreRequisito' => $req->NombreRequisito[$key],



        // ]);    
        // }


         $notification = array(

                'message' => 'Informacion Añadida',
                'alert-type' => 'success'
            );

        

            return back()->with($notification);

        
        // foreach ($req->input('IdPrograma') as $key => $v) {
        //     $data = array(
        //         'IdSubParteMatriz' => $req->IdSubParteMatriz,
        //         'CodigoRquisito' => $req->CodigoRquisito [$key],
        //         'NombreRequisito' => $req->NombreRequisito [$key],
        //         'DescripcioRequisito' => $req->DescripcioRequisito [$key],
        //         'GuiaAplicable' => $req->GuiaAplicable [$key],
        //     );

        //     SubParteMatrizCumpliProg::insert($data);
        // }

      
    

    }

    public function show($IdPrograma)
    {
       $programa = Programa::find($IdPrograma);
       
       //$baseCerti = BaseCertificacion::find($programa->IdBaseCertificacion);
       
       //$subPartes = SubPartesBaseCertificacion::getByBaseCertificacion($programa->IdBaseCertificacion);
       
       $subPartes = SubParteMatrizCumpliProg::getByPrograma($IdPrograma);
       
       $mocs = Moc::all();

       $counter = DB::table('AU_Reg_SubParteMatrizCumpliProg')->where('IdPrograma', '=', $IdPrograma)->count();

       return view ('certificacion.programasSECAD.matrizCumplimiento.ver_matriz_cumplimiento')
                ->with('programa', $programa)                
                ->with('subPartes', $subPartes)
                ->with('mocs', $mocs)
                ->with('counter', $counter);

    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $IdSubParteMatriz)
    {
        //
    }

    
    public function destroy($IdSubParteMatriz)
    {
        $subPartMatriz = SubParteMatrizCumpliProg::find($IdSubParteMatriz);


        $exists = DB::table('AU_Reg_MocsSubParteMatriz')->where('IdSubParteMatriz', $IdSubParteMatriz)->first();

        if(!$exists){
            
            $subPartMatriz->delete();
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

        return redirect()->route('matrizCumplimiento.show', $subPartMatriz->IdPrograma)->with($notification);

    }
}
