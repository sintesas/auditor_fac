<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubAreasCooperacionIndustrial;
use Symfony\Component\HttpFoundation\Response;

class AreasCooperacionController extends Controller
{


	public function __Construct(){

		$this->middleware('auth');

	}


    
	public function index(){
	}

	public function searchSubArea()
	{
		$area       = trim(\request('area'));
		$results = SubAreasCooperacionIndustrial::where('idAreasCooperacionIndustrial', '=', '' . $area . '')->distinct()->get();

		return \Response::json($results);
	}

}
