@extends('layouts.app')

@section('content')


@php
/*dd($AspirantesporConcurso);*/
//dd($JuradosporConcurso);
@endphp
<div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">REPORTES DEL SISTEMA</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">

                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Aspirantes por Concurso por Llamado</td>
                      <td><a href="{{ url('/verAspirantesporConcurso') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfAspirantesporConcurso') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Jurados por Concurso por Llamado</td>
                      <td><a href="{{ url('/verJuradosporConcurso') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfJuradosporConcurso') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Concursos Pendientes de Sustanciación por Llamado</td>
                      <td><a href="{{ url('/verConcursospendientesdesustanciaciónporllamado') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfConcursospendientesdesustanciaciónporllamado') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Concursos Cerrados por Llamado</td>
                      <td><a href="{{ url('/verConcursosCerradosporllamado') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfConcursosCerradosporllamado') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Concursos Desiertos desde Convocatoria por llamado</td>
                      <td><a href="{{ url('/verConcursosDesiertosdesdeConvocatoriaporllamado') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfConcursosDesiertosdesdeConvocatoriaporllamado') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Concursos Desiertos en Sustanciación por llamado</td>
                      <td><a href="{{ url('/verConcursosDesiertosenSustanciaciónporllamado') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfConcursosDesiertosenSustanciaciónporllamado') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Concursos Nulos por llamado</td>
                      <td><a href="{{ url('/verConcursosNulosporllamado') }}" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="{{ url('/pdfConcursosNulosporllamado') }}" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>

                    </tr>


                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
 </div>



@endsection
