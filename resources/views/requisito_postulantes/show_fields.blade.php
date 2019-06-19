
<div class="form-group">
    {!! Form::label('concurso_id', 'Datos del Concurso:') !!}
    <p>
       Refencia General : {!! $requisitoPostulante->concurso->referenciaGeneral !!} <br>
       Asignatura : {!! $requisitoPostulante->concurso->asignatura->nombre !!} <br>
       Area : {!! $requisitoPostulante->concurso->asignatura->area->nombre !!} <br>
       Estado del Concurso : {!! $requisitoPostulante->concurso->estado !!}
    </p>
    <a href="{{ action('ConcursoController@show', $requisitoPostulante->concurso_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>

<!-- Postulante Id Field -->
<div class="form-group">
    {!! Form::label('postulante_id', 'Datos del Postulante:') !!}
    <p>
      Identificador : {!! $requisitoPostulante->postulante_id !!} <br>
      Documento :  {!! $requisitoPostulante->postulante->documento!!} <br>
      Nombre : {!! $requisitoPostulante->postulante->apellidos!!} <br>
      Apellido :  {!! $requisitoPostulante->postulante->nombres!!} <br>
    </p>

      <a href="{{ action('PostulanteController@show', $requisitoPostulante->postulante_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>

<!-- Requisitos Id Field -->
<div class="form-group">
    {!! Form::label('Requisitoitem_id', 'Requisitos:') !!}
    <p>
      Identificador : {!! $requisitoPostulante->requisitoitem_id !!} <br>
      Descripcion :  {!! $requisitoPostulante->requisitoitem->descripcion !!} - Entrego Requisito: {!! $requisitoPostulante->entregoRequisito !!}<br>

      <a href="{{ action('RequisitoItemController@show', $requisitoPostulante->requisitoitem_id ) }}"><p> {!! Form::button('Ver Más!')!!}</a>

    </p>
</div>

<!-- Aca debemos mostrar los Requisitos con sus estados y poder modificarlos.-->


<div class="form-group">
    {!! Form::label('cumpleRequisito', 'cumpleRequisito:') !!}
    <p>{!! $requisitoPostulante->cumpleRequisito !!}</p>
</div>
