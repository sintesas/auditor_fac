<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Auditoria;
use App\SchedulerEvent;
use Dhtmlx\Connector\SchedulerConnector;

class DashboardController extends Controller
{


	public function __Construct(){

		$this->middleware('auth');

	}


    
	public function index(){
		// Vista
		$idPersonal = auth()->user()->IdPersonal;

		$programas = Programa::getByJefeAndSuplente($idPersonal);
		$auditorias = Auditoria::getByInspectorAndAuditor($idPersonal);
		return view('partials.dashboard')
				->with('programas', $programas)
				->with('auditorias', $auditorias);
	}

	public function data() {
        $connector = new SchedulerConnector(null, "PHPLaravel");
        $connector->configure(new SchedulerEvent(), "event_id", "start_date, end_date, event_name");
        $connector->render();
    }

}
