<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Empresa;
use App\FuncionariosEmpresa;
use App\Auditoria;
use App\EstadosEmpresa;
use App\DominioIndustrial;
use App\Municipio;
use App\VWEmpresa;
use Spatie\Activitylog\Models\Activity;

class EmpresasController extends Controller
{

    public function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}   
    

    

    public function index()
    {   
        $empresas = Empresa::all();
        $vwempresa = VWEmpresa::all();
        return view ('fomento.empresas.ver_tablas_empresas')
                ->with('empresas', $empresas)
                ->with('vwempresa', $vwempresa);
    }

   
    public function create()
    {

        $municipio = Municipio::all();
        $municipio->prepend('None');

        $estadoEmpresa = EstadosEmpresa::all();
        $estadoEmpresa->prepend('None');

        $dominioIndustrial = DominioIndustrial::all();
        $dominioIndustrial->prepend('None');

        $ldate = date('Y-m-d');

        return view('fomento.empresas.crear_empresa')
                ->with('municipio', $municipio)
                ->with('estadoEmpresa', $estadoEmpresa)
                ->with('dominioIndustrial', $dominioIndustrial)
                ->with('ldate', $ldate);
    }

    public function store(Request $request)
    {
       
        $mun =  0;

        $empresa = new Empresa;
        $ip = $this->get_client_ip();
        $empresa->NombreEmpresa = $request->input('NombreEmpresa');
        $empresa->SiglasNombreClave = $request->input('SiglasNombreClave');
        $empresa->Nit = $request->input('Nit');
        $empresa->Email = $request->input('Email');
        $empresa->Ciudad = $request->has($mun);
        $empresa->Telefono = $request->input('Telefono');
        $empresa->PaginaWeb = $request->input('PaginaWeb');
        $empresa->TipoOrganizacion = $request->input('TipoOrganizacion');
        $empresa->Direccion = $request->input('Direccion');

        $empresa->DisenoDesarrollo = $request->has('DisenoDesarrollo');
        $empresa->Fabricante = $request->has('Fabricante');
        $empresa->PrestacionServicios = $request->has('PrestacionServicios');
        $empresa->MantenimientoAeronaves = $request->has('MantenimientoAeronaves');
        $empresa->AutorizacionCT = $request->has('autorizacion');

        $empresa->NombreCertificaInfo = $request->input('NombreCertificaInfo');
        $empresa->CargoCertificaInfo = $request->input('CargoCertificaInfo');

        // $ldate = date('Y-m-d');
        // $empresa->FechaCreacion = $ldate;
        $empresa->FechaCreacion = $request->input('FechaActualizacion');
        $empresa->FechaActualizacion = $request->input('FechaActualizacion');

        $empresa->IdEstadoEmpresa = $request->input('IdEstadoEmpresa');
        $empresa->IdDominioIndustrial = $request->input('IdDominioIndustrial');
        $empresa->Alcance = $request->input('Alcance');
        $empresa->Observaciones = $request->input('Observaciones');
        $empresa->Id_Municipio = $request->input('Id_Municipio');
            
        // dd($empresa);
        // STILL PENDING LOGO


        $notification = array(

            'message' => 'Empresa creada',
            'alert-type' => 'success'
        );

        $empresa->save();

        activity()
            ->performedOn($empresa)
            ->withProperties($ip)
            ->log('Empresa Creada');

        return redirect()->route('empresa.index')->with($notification);
    }

    public function show($IdEmpresa){
        $empresas= Empresa::orderBy('IdEmpresa', 'desc')->paginate(10);
        return view ('fomento.empresas.empresas')->with('empresas', $empresas);
    }

    

    public function edit($IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);

        $estadoEmpresa = EstadosEmpresa::all();
        // $estadoEmpresa->prepend('None');

        $dominioIndustrial = DominioIndustrial::all();
        // $dominioIndustrial->prepend('None');

        $municipio = Municipio::all();

        $ldate = date('Y-m-d');
        
        return view('fomento.empresas.editar_empresa')
                ->with('empresa', $empresa)
                ->with('municipio', $municipio)
                ->with('estadoEmpresa', $estadoEmpresa)
                ->with('dominioIndustrial', $dominioIndustrial)
                ->with('ldate', $ldate);
    }

    
    public function update(Request $request, $IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);
        $Ciudad =  Municipio::find($request->input('Id_Municipio'));

        $ip = $this->get_client_ip();

        $empresa->NombreEmpresa = $request->input('NombreEmpresa');
        $empresa->Nit = $request->input('Nit');
        $empresa->Email = $request->input('Email');
        $empresa->Ciudad = $request->input($Ciudad->NombreMunicipio);
        $empresa->Telefono = $request->input('Telefono');
        $empresa->PaginaWeb = $request->input('PaginaWeb');
        $empresa->TipoOrganizacion = $request->input('TipoOrganizacion');
        $empresa->Direccion = $request->input('Direccion');

        $empresa->DisenoDesarrollo = $request->has('option1');
        $empresa->Fabricante = $request->has('option2');
        $empresa->PrestacionServicios = $request->has('option3');
        $empresa->MantenimientoAeronaves = $request->has('option4');

        $empresa->AutorizacionCT = $request->has('autorizacion');

        $empresa->NombreCertificaInfo = $request->input('NombreCertificaInfo');
        $empresa->CargoCertificaInfo = $request->input('CargoCertificaInfo');

        // $ldate = date('Y-m-d');
        $empresa->FechaActualizacion = $request->input('FechaActualizacion');

        $empresa->IdEstadoEmpresa = $request->input('IdEstadoEmpresa');
        $empresa->IdDominioIndustrial = $request->input('IdDominioIndustrial');
        $empresa->Alcance = $request->input('Alcance');
        $empresa->Observaciones = $request->input('Observaciones');
        $empresa->Id_Municipio = $request->input('Id_Municipio');

        $empresa->save();

        activity()
            ->performedOn($empresa)
            ->withProperties($ip)
            ->log('Empresa editada');

        return redirect()->route('empresa.index');
    }

    
    public function destroy($IdEmpresa)
    {
        $empresa = Empresa::find($IdEmpresa);
        $ip = $this->get_client_ip();

        $empresa->capacidades()->delete();
        $empresa->funcionarios()->delete();
        $empresa->auditorias()->delete();

        $empresa->delete();

        activity()
            ->performedOn($empresa)
            ->withProperties($ip)
            ->log('Empresa Borrada');

        return redirect()->route('empresa.index');
    }
}
