<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Concurso;
use App\Models\User;
use App\Models\Postulante;
use App\Models\Jurado;
use App\Models\ConcursoPostulante;
use App\Models\ConcursoJurado;
use Flash;




class MailController extends Controller
{
    public function send($id)
    {


        $referenciaGeneral = Concurso::pluck('referenciaGeneral', 'id')->get($id);
        $fechaSustanciacion = Concurso::pluck('fechaSustanciacion', 'id')->get($id);
        $estado = Concurso::pluck('estado', 'id')->get($id);
        $usuarioid= Concurso::pluck('usuarioSustanciacion', 'id')->get($id);
        $usuarioSustanciacion = User::pluck('name', 'id')->get($usuarioid);
        $concurso_postulante_id = ConcursoPostulante::where('concurso_id' , '=' , $id)->pluck('postulante_id', 'id');
        $concurso_jurado_id = ConcursoJurado::where('concurso_id' , '=' , $id)->pluck('jurado_id', 'id');
        foreach ($concurso_postulante_id  as $conc_post_id ) {
          $postulante_email = Postulante::pluck('email', 'id')->get($conc_post_id);
          $postulante_nombre = Postulante::pluck('nombres', 'id')->get($conc_post_id);
          $postulante_ape = Postulante::pluck('apellidos', 'id')->get($conc_post_id);
        Mail::to($postulante_email)->send(new DemoEmail($referenciaGeneral ,
                                                        $fechaSustanciacion ,
                                                        $estado ,
                                                        $usuarioSustanciacion ,
                                                        $postulante_nombre ,
                                                        $postulante_ape ));


        }
        foreach ($concurso_jurado_id  as $conc_jur_id ) {
          $jurados_email = Jurado::pluck('email', 'id')->get($conc_jur_id);
          $jurados_nombre = Jurado::pluck('nombres', 'id')->get($conc_jur_id);
          $jurados_ape = Jurado::pluck('apellidos', 'id')->get($conc_jur_id);
        Mail::to($jurados_email)->send(new DemoEmail($referenciaGeneral ,
                                                        $fechaSustanciacion ,
                                                        $estado ,
                                                        $usuarioSustanciacion ,
                                                        $jurados_nombre ,
                                                        $jurados_ape ));


        }

        Flash::success('Mail Enviado a Jurados y Postulantes');

        return redirect(route('concursos.index'));

        //dd($postulante_email);


      //  Mail::to("jorgeoscargamez@gmail.com")->send(new DemoEmail($referenciaGeneral , $fechaSustanciacion , $estado , $usuarioSustanciacion));
    }
}
