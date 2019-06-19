<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $referenciaGeneral;
    public $fechaSustanciacion;
    public $estado ;
    public $usuarioSustanciacion;
    public $postulante_nombre;
    public $postulante_ape;


    public function __construct($referenciaGeneral , $fechaSustanciacion , $estado , $usuarioSustanciacion , $postulante_nombre , $postulante_ape)
    {

        $this->referenciaGeneral = $referenciaGeneral;
        $this->fechaSustanciacion = $fechaSustanciacion;
        $this->estado = $estado ;
        $this->usuarioSustanciacion =$usuarioSustanciacion;
        $this->postulante_nombre;
        $this->postulante_ape;
        //$this->middleware('auth');



    }
    public function build()
    {
        return $this->from('concursosdocentesunaj@gmail.com')
                    ->view('mails.demo')
                    ->text('mails.demo_plain')
                    ->with(
                      [
                            'referenciaGeneral' => $this->referenciaGeneral,
                            'fechaSustanciacion' => $this->fechaSustanciacion,
                            'estado' => $this->estado ,
                            'usuarioSustanciacion' => $this->usuarioSustanciacion,
                            'postulante_nombre' => $this->postulante_nombre,
                            'postulante_ape' => $this->postulante_ape,

                      ]);

    }
}
