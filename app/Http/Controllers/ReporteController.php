<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concurso;
use App\Models\ConcursoPostulante;
use App\Models\ConcursoJurado;
use App\Models\Postulante;
use App\Models\Jurado;
use App\Models\Llamado;
use Barryvdh\DomPDF\Facade as PDF;


class ReporteController extends Controller{
public function __construct(){
    $this->middleware('auth');
}
public function index(){
  return view('reportes.reportes');
}
public function verAspirantesporConcurso(){
  $AspirantesporConcurso =
  ConcursoPostulante::join('concursos' , 'concursospostulantes.concurso_id' , '=' , 'concursos.id')
  ->join('personas' , 'concursospostulantes.postulante_id' , '=' , 'personas.id')
  ->where('personas.tipo','Postulante')
  ->select('concursospostulantes.id','concursos.referenciaGeneral as ref_gen' ,
           'concursos.asignatura_id',
           'personas.nombres as pos_nom' ,
           'personas.apellidos  as pos_ape' ,
           'concursospostulantes.fechaPresentacion as fec_pre' ,
           'concursospostulantes.tipo as tip_pos',
           'concursospostulantes.ordenMerito as ord_mer' )
  ->where('concursospostulantes.tipo' , 'Aspirante')->get();

  //dd($AspirantesporConcurso);
  return view('reportes.AspirantesporConcurso')->with(compact('AspirantesporConcurso'));
}
public function pdfAspirantesporConcurso(){
  $AspirantesporConcurso =
  ConcursoPostulante::join('concursos' , 'concursospostulantes.concurso_id' , '=' , 'concursos.id')
  ->join('personas' , 'concursospostulantes.postulante_id' , '=' , 'personas.id')
  ->where('personas.tipo','Postulante')
  ->select('concursospostulantes.id','concursos.referenciaGeneral as ref_gen' ,
           'personas.nombres as pos_nom' ,  'personas.apellidos  as pos_ape' ,
           'concursospostulantes.fechaPresentacion as fec_pre' ,
           'concursospostulantes.tipo as tip_pos',
           'concursospostulantes.ordenMerito as ord_mer' )
  ->get();

  // generación de la vista
  $pdf = PDF::loadView( 'reportes.AspirantesporConcurso' , compact('AspirantesporConcurso'));
  // lanzamos la descarga del fichero
  return $pdf->download('aspirantesporconcurso.pdf');


}
public function verJuradosporConcurso(){
  $JuradosporConcurso =
  ConcursoJurado::join('concursos' , 'concursosjurados.concurso_id' , '=' , 'concursos.id')
  ->join('personas' , 'concursosjurados.jurado_id' , '=' , 'personas.id')
  ->where('personas.tipo' , '=', 'Jurado')
  ->join('categorias' , 'concursosjurados.categoria_id' , '=' , 'categorias.id')
  ->select('concursosjurados.id',
           'concursos.referenciaGeneral as ref_gen' ,
           'personas.nombres as jur_nom' ,
           'personas.apellidos  as jur_ape' ,
           'categorias.nombre as jur_cat' ,
           'concursosjurados.nivel as con_niv' ,
             'concursosjurados.tipo as tip_jur')
 ->get();
 return view('reportes.JuradosporConcurso')->with(compact('JuradosporConcurso'));
}
public function pdfJuradosporConcurso(){
  $JuradosporConcurso =
  ConcursoJurado::join('concursos' , 'concursosjurados.concurso_id' , '=' , 'concursos.id')
  ->join('personas' , 'concursosjurados.jurado_id' , '=' , 'personas.id')
  ->where('personas.tipo' , '=', 'Jurado')
  ->join('categorias' , 'concursosjurados.categoria_id' , '=' , 'categorias.id')
  ->select('concursosjurados.id',
           'concursos.referenciaGeneral as ref_gen' ,
           'personas.nombres as jur_nom' ,
           'personas.apellidos  as jur_ape' ,
           'categorias.nombre as jur_cat' ,
           'concursosjurados.nivel as con_niv' ,
             'concursosjurados.tipo as tip_jur')
 ->get();
 // generación de la vista
 $pdf = PDF::loadView( 'reportes.JuradosporConcurso' , compact('JuradosporConcurso'));
 // lanzamos la descarga del fichero
 return $pdf->download('juradosporconcurso.pdf');
}
public function verConcursospendientesdesustanciaciónporllamado(){
  $ConcursoSinSustanciar =
  Concurso::where('estado','!=', 'Sustanciado')->select('*')->get();
  //dd($ConcursoSinSustanciar);
 return view('reportes.Concursospendientesdesustanciaciónporllamado')->with(compact('ConcursoSinSustanciar'));
}
public function pdfConcursospendientesdesustanciaciónporllamado(){
  $ConcursoSinSustanciar =
  Concurso::where('estado','!=', 'Sustanciado')->select('*')->get();
  // generación de la vista
  $pdf = PDF::loadView( 'reportes.Concursospendientesdesustanciaciónporllamado' , compact('ConcursoSinSustanciar'));
  // lanzamos la descarga del fichero
  return $pdf->download('Concursospendientesdesustanciaciónporllamado.pdf');
}
public function verConcursosCerradosporllamado(){
  $ConcursoCerrado =
  Concurso::where('estado','=', 'Cerrado')->select('*')->get();
  //dd($ConcursoSinSustanciar);
 return view('reportes.ConcursosCerradosporllamado')->with(compact('ConcursoCerrado'));
}
public function pdfConcursosCerradosporllamado(){
  $ConcursoCerrado =
  Concurso::where('estado','=', 'Cerrado')->select('*')->get();
  // generación de la vista
  $pdf = PDF::loadView( 'reportes.ConcursosCerradosporllamado' , compact('ConcursoCerrado'));
  // lanzamos la descarga del fichero
  return $pdf->download('ConcursosCerradosporllamado.pdf');
}
public function verConcursosDesiertosdesdeConvocatoriaporllamado(){
  $ConcursoDesiertoConvocatoria=
  Concurso::where('estado','=', 'DesiertoConvocatoria')->select('*')->get();
  //dd($ConcursoSinSustanciar);
 return view('reportes.ConcursosDesiertosdesdeConvocatoriaporllamado')->with(compact('ConcursoDesiertoConvocatoria'));
}
public function pdfConcursosDesiertosdesdeConvocatoriaporllamado(){
  $ConcursoDesiertoConvocatoria=
  Concurso::where('estado','=', 'DesiertoConvocatoria')->select('*')->get();
  // generación de la vista
  $pdf = PDF::loadView( 'reportes.ConcursosDesiertosdesdeConvocatoriaporllamado' , compact('ConcursoDesiertoConvocatoria'));
  // lanzamos la descarga del fichero
  return $pdf->download('ConcursosDesiertosdesdeConvocatoriaporllamado.pdf');
}
public function verConcursosDesiertosenSustanciaciónporllamado(){
  $ConcursoDesiertoSustanciacion=
  Concurso::where('estado','=', 'DesiertoSustanciacion')->select('*')->get();
  //dd($ConcursoSinSustanciar);
 return view('reportes.ConcursosDesiertosenSustanciaciónporllamado')->with(compact('ConcursoDesiertoSustanciacion'));
}
public function pdfConcursosDesiertosenSustanciaciónporllamado(){
  $ConcursoDesiertoSustanciacion=
  Concurso::where('estado','=', 'DesiertoSustanciacion')->select('*')->get();
  // generación de la vista
  $pdf = PDF::loadView( 'reportes.ConcursosDesiertosenSustanciaciónporllamado' , compact('ConcursoDesiertoSustanciacion'));
  // lanzamos la descarga del fichero
  return $pdf->download('ConcursosDesiertosenSustanciaciónporllamado.pdf');
}
public function verConcursosNulosporllamado(){
  $ConcursoNulo=
  Concurso::where('estado','=', 'Nulo')->select('*')->get();
  //dd($ConcursoSinSustanciar);
 return view('reportes.ConcursosNulosporllamado')->with(compact('ConcursoNulo'));
}
public function pdfConcursosNulosporllamado(){
  $ConcursoNulo=
  Concurso::where('estado','=', 'Nulo')->select('*')->get();
  // generación de la vista
  $pdf = PDF::loadView( 'reportes.ConcursosNulosporllamado' , compact('ConcursoNulo'));
  // lanzamos la descarga del fichero
  return $pdf->download('ConcursosNulosporllamado.pdf');
}






}
