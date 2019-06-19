  <div class="form-group">
    {!! Form::label('persona_id', 'Persona:') !!}
    <p>
    Identificador : {!! $cargoConcursado->persona->id !!} <br>
    Documento :  {!! $cargoConcursado->persona->documento !!} <br>
    Nombre : {!! $cargoConcursado->persona->nombres !!} <br>
    Apellido :  {!! $cargoConcursado->persona->apellidos !!} <br>
    </p>
    <a href="{{ action('PostulanteController@show', $cargoConcursado->persona_id) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>


<!-- Universidad Id Field -->
<div class="form-group">
    {!! Form::label('universidad_id', 'Universidad:') !!}
    <!-- Tiene que coincidir con el metodo en el modelo , el metodo tiene que coincidir con el modelo en singular -->
    <p>{!! $cargoConcursado->universidad->nombre !!}</p>

    <a href="{{ action('UniversidadController@show', $cargoConcursado->universidad_id) }}"><p> {!! Form::button('Ver Más!')!!}</a>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    <p>{!! $cargoConcursado->categoria->nombre !!}</p>
</div>

<!-- Dedicacion Field -->
<div class="form-group">
    {!! Form::label('dedicacion', 'Dedicacion:') !!}
    <p>{!! $cargoConcursado->dedicacion !!}</p>
</div>

<!-- Registrotipo Field -->
<div class="form-group">
    {!! Form::label('registroTipo', 'Tipo de Registro:') !!}
    <p>{!! $cargoConcursado->registroTipo !!}</p>
</div>
