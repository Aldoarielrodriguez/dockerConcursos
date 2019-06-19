<!-- Concurso Id Field -->
<div class="form-group">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    <p>
    Identificador  : {!! $concursoPostulante->concurso_id !!} <br>
    Refencia General : {!! $concursoPostulante->concurso->referenciaGeneral !!} <br>
    Asignatura : {!! $concursoPostulante->concurso->asignatura->nombre !!} <br>
    Area : {!! $concursoPostulante->concurso->asignatura->area->nombre !!} <br>
    Estado del Concurso : {!! $concursoPostulante->concurso->estado !!}
    </p>
    <a href="{{ action('ConcursoController@show', $concursoPostulante->concurso_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>

<!-- Postulante Id Field -->
<div class="form-group">

    {!! Form::label('postulante_id', 'Postulante:') !!}


    Identificador : {!! $concursoPostulante->postulante_id !!} <br>
    Documento :  {!! $concursoPostulante->postulante->documento!!} <br>
    Nombre : {!! $concursoPostulante->postulante->apellidos!!} <br>
    Apellido :  {!! $concursoPostulante->postulante->nombres!!} <br>
    </p>

    <a href="{{ action('PostulanteController@show', $concursoPostulante->postulante_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>


<!-- Fechapresentacion Field -->
<div class="form-group">
    {!! Form::label('fechaPresentacion', 'Fechapresentacion:') !!}
    <p>{!! $concursoPostulante->fechaPresentacion !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $concursoPostulante->tipo !!}</p>
</div>