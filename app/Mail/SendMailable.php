<?php

namespace App\Mail;

use App\SeguimientoCausaRaiz;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return redirect()->route('seguimientoCausaRaiz');
        //return $this->view('seguimientoCausaRaiz.index');

        $idPersonal = Auth::user()->IdPersonal;
        $name = Auth::user()->name;

        if (Auth::user()->hasRole('administrador')) {
            $seguimientos = SeguimientoCausaRaiz::getAll(); 
        }else{
            $seguimientos = SeguimientoCausaRaiz::getByUser($idPersonal, $name); 
        }

        return $this->view('auditoria.ver_seguimiento_causa_raiz')
            ->with('seguimientos', $seguimientos);
    }
}
