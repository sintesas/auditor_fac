<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemandaPotencial;
use App\Ata;
use App\Aeronave;
use App\Unidad;
use App\tools;
use File;
use DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DemandaPotencial::demandaPotencialAll();
        return view ('certificacion.productosAeronauticos.ver_productos')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //dropdown Equipo
        $aeronaves = Aeronave::getAeronaves();
        $aeronaves->prepend('None');

        //dropdown Unidades
        $unidades = Unidad::all();
        $unidades->prepend('None');

        //dropdown ATA
        $atas = Ata::getAta();
        $atas->prepend('None');

        return view ('certificacion.productosAeronauticos.crear_productos')
            ->with('atas', $atas)
            ->with('aeronaves', $aeronaves)
            ->with('unidades', $unidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new DemandaPotencial;

        $producto->Nombre = $request->input('Nombre');
        $producto->ParteNumero = $request->input('ParteNumero');
        $producto->IdAeronave = $request->input('IdAeronave');
        $producto->IdUnidad = $request->input('IdUnidad');
        $producto->NSN = $request->input('NSN');
        $producto->CodigoSAP = $request->input('CodigoSAP');
        $producto->PublicacionTecnica = $request->input('PublicacionTecnica');
        $producto->IdATA = $request->input('IdATA');
        $producto->Identificacion = $request->input('Identificacion');
        $producto->Funcionamiento = $request->input('Funcionamiento');
        $producto->Observaciones = $request->input('Observaciones');
        $producto->Fabricante = $request->input('Fabricante');
        $producto->PrecioCompra = $request->input('PrecioCompra');
        $producto->Anio = $request->input('Anio');
        $producto->TiempoEntrega = $request->input('TiempoEntrega');
        $producto->PeriodoTiempoEntrega = $request->input('PeriodoTiempoEntrega');
        $producto->Clase = $request->input('Clase');

        $producto->ParteNumero = str_replace("/", "-", $producto->ParteNumero);

        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->foto;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $producto->Imgen = $photo;
            
        }
        else
        {
            $producto->Imgen = 'engranaje.png';
            
        }

        $doct = "";
        if ($request->hasFile('doc'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->doc;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $doct = $fileName;
            $producto->DocTecnica = $doct;
            
        }
        else
        {
            $producto->DocTecnica = '';
            
        }
        

        $producto->Activo = 1; 
        $producto->save();
        //dd($producto);
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // USING MODELS
        $producto = DemandaPotencial::find($id);
        $producto->activo = 1;
        $producto->save();
            
        $notification = array(
          'message' => 'El producto se ha activado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($IdDemandaPotencial)
    {
        //dropdown Equipo
        $aeronaves = Aeronave::getAeronaves();
        $aeronaves->prepend('None');

        //dropdown Unidades
        $unidades = Unidad::all();
        $unidades->prepend('None');

        //dropdown ATA
        $atas = Ata::getAta();
        $atas->prepend('None');


        //Get Model
        $producto = DemandaPotencial::find($IdDemandaPotencial);

        return view ('certificacion.productosAeronauticos.editar_productos')
            ->with('atas', $atas)
            ->with('aeronaves', $aeronaves)
            ->with('unidades', $unidades)
            ->withProducto($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdDemandaPotencial)
    {
        $producto = DemandaPotencial::find($IdDemandaPotencial);

        $producto->Nombre = $request->input('Nombre');
        $producto->ParteNumero = $request->input('ParteNumero');
        $producto->IdAeronave = $request->input('IdAeronave');
        $producto->IdUnidad = $request->input('IdUnidad');
        $producto->NSN = $request->input('NSN');
        $producto->CodigoSAP = $request->input('CodigoSAP');
        $producto->PublicacionTecnica = $request->input('PublicacionTecnica');
        $producto->IdATA = $request->input('IdATA');
        $producto->Identificacion = $request->input('Identificacion');
        $producto->Funcionamiento = $request->input('Funcionamiento');
        $producto->Observaciones = $request->input('Observaciones');
        $producto->Fabricante = $request->input('Fabricante');
        $producto->PrecioCompra = $request->input('PrecioCompra');
        $producto->Anio = $request->input('Anio');
        $producto->TiempoEntrega = $request->input('TiempoEntrega');
        $producto->PeriodoTiempoEntrega = $request->input('PeriodoTiempoEntrega');
        $producto->Clase = $request->input('Clase');

        $photo = "";

        if ($request->hasFile('foto'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->foto;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $photo = $fileName;
            $producto->Imgen = $photo;
            
        }
        else
        {
            $producto->Imgen = $producto->Imgen;
            
        }

        // dd($producto);
        $doct = "";
        if ($request->hasFile('doc'))
        {
            $personalPath = public_path('secad\\Productos\\' . $producto->Nombre.'-'.$producto->ParteNumero);
            if(!File::exists($personalPath)) {
                File::makeDirectory( $personalPath, 0755, true);
            }
            
            $file = $request->doc;
            $fileName = tools::normalizeChars($file->getClientOriginalName());
            $file->move($personalPath, $fileName);
            $doct = $fileName;
            $producto->DocTecnica = $doct;
            
        }
        else
        {
            $producto->DocTecnica = $producto->DocTecnica;
            
        }

        $producto->save();
        //dd($producto);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($IdDemandaPotencial)
    {
        // USING MODELS
        $producto = DemandaPotencial::find($IdDemandaPotencial);
        $producto->activo = 0;
        $producto->save();
            
        $notification = array(
          'message' => 'El producto se ha inactivado correctamente',
          'alert-type' => 'success'
        );

        return redirect()->route('productos.index')->with($notification);

        $exists1 = DB::table('AU_Reg_DemandaPotencialValoracionEconomica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists2 = DB::table('AU_Reg_DemandaPotencialOfertaAeronautica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists3 = DB::table('AU_Reg_DemandaPotencialConsumoRotacion')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists4 = DB::table('AU_Reg_DemandaPotencialFactibilidadTecnica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists5 = DB::table('AU_Reg_DemandaPotencialPrioridadUMA')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists6 = DB::table('AU_Reg_ProductosOfrecidos')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists7 = DB::table('AU_Reg_ConsumosDemPotencial')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists8 = DB::table('AU_Reg_DemandaPotencialValoracionTecnica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();
        $exists9 = DB::table('AU_Reg_OfertasFabrica')->where('IdDemandaPotencial', $IdDemandaPotencial)->count();

        $exists = $exists1 + $exists2 + $exists3 + $exists4 + $exists5 + $exists6 + $exists7 + $exists8 +$exists9;

        // dd($exists);
        if($exists == 0){
            // USING MODELS
            $producto = DemandaPotencial::find($IdDemandaPotencial);
            $producto->delete();
            
            $notification = array(
              'message' => 'Datos eliminados correctamente',
              'alert-type' => 'success'
          );
        }
        else
        {
            $notification = array(
            'message' => 'No se puede eliminar el Producto ya que contiene datos en la Matriz de Impacto o como Producto Ofrecido.', 
            'alert-type' => 'warning'
          );
        }
        
        
        return redirect()->route('productos.index')->with($notification);

        /*FALTA que valide y borre las tablas anidadas FK_AU_Reg_ProductosOfrecidos_AU_Reg_DemandaPotencial*/
    }
}
