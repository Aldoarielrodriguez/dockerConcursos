<?php

namespace App\Http\Controllers;
use App\Models\Concurso;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('Administrador');
        $this->middleware('Administrativo');
        $this->middleware('Miembro');*/

    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Concurso::select('concursos.referenciaGeneral' ,'concursos.cargos' )->get();
        return view('home', ['data'=>$data]);

    }


}
