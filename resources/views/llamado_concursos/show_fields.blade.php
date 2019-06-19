<!-- Illamado Id Field -->
<div class="form-group">
    {!! Form::label('llamado_id', 'llamado Id:') !!}
    <p>
      Llamado : {!! $llamadoConcursos->llamado->codigo !!} <br>
      Año : {!! $llamadoConcursos->llamado->año !!}
    </p>
    <a href="{{ action('LlamadoController@show', $llamadoConcursos->llamado_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>

</div>

<!-- Concurso Id Field -->
<div class="form-group">
    {!! Form::label('concurso_id', 'Concurso Id:') !!}
  <p>
    Identificador  : {!! $llamadoConcursos->concurso_id !!} <br>
    Refencia General : {!! $llamadoConcursos->concurso->referenciaGeneral !!} <br>
    Asignatura : {!! $llamadoConcursos->concurso->asignatura->nombre !!} <br>
    Area : {!! $llamadoConcursos->concurso->asignatura->area->nombre !!} <br>
    Estado del Concurso : {!! $llamadoConcursos->concurso->estado !!}
  <p>
  <a href="{{ action('ConcursoController@show', $llamadoConcursos->concurso_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>
