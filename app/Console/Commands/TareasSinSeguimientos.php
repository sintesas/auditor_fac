<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class TareasSinSeguimientos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:CausasRaizTareas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar correos a las personas del hallazgo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $totalTareasPendientes = DB::table('AU_Reg_CausasRaizTareas as tareas')
                                ->select('IdAnotacion')
                                ->join('AU_Reg_CausasRaiz as causa', 'causa.IdCausaRaiz', '=', 
                                DB::raw('tareas.IdCausaRaiz where IdAnotacion not in (select IdAnotacion from AU_Reg_Seguimiento)'))
        ->get();
    }
}
