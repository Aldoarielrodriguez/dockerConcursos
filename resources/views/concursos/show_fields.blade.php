<!--pre-->
@php
  //var_dump($concurso->users);
@endphp

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $concurso->id !!}</p>
</div>

<!-- Asignatura Id Field -->
<div class="form-group">
    {!! Form::label('asignatura_id', 'Asignatura Id:') !!}
    <p>{!! $concurso->asignatura->nombre !!}</p>
</div>

<!-- Perfil Id Field -->
<div class="form-group">
    {!! Form::label('perfil_id', 'Perfil Id:') !!}
    <p>{!! $concurso->perfile->nombre !!}</p>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    <p>{!! $concurso->categoria->nombre !!}</p>
</div>

<!-- Dedicacion Field -->
<div class="form-group">
    {!! Form::label('dedicacion', 'Dedicacion:') !!}
    <p>{!! $concurso->dedicacion !!}</p>
</div>

<!-- Referenciageneral Field -->
<div class="form-group">
    {!! Form::label('referenciaGeneral', 'Referenciageneral:') !!}
    <p>{!! $concurso->referenciaGeneral !!}</p>
</div>

<!-- Referenciainstituto Field -->
<div class="form-group">
    {!! Form::label('referenciaInstituto', 'Referenciainstituto:') !!}
    <p>{!! $concurso->referenciaInstituto !!}</p>
</div>

<!-- Cargos Field -->
<div class="form-group">
    {!! Form::label('cargos', 'Cargos:') !!}
    <p>{!! $concurso->cargos !!}</p>
</div>

<!-- Lineadesarrollo Field -->
<div class="form-group">
    {!! Form::label('lineaDesarrollo', 'Lineadesarrollo:') !!}
    <p>{!! $concurso->lineaDesarrollo !!}</p>
</div>

<!-- Requisitos Field -->
<div class="form-group">
    {!! Form::label('requisitos', 'Requisitos:') !!}
    <p>{!! $concurso->requisitos !!}</p>
</div>

<!-- Expediente Field -->
<div class="form-group">
    {!! Form::label('expediente', 'Expediente:') !!}
    <p>{!! $concurso->expediente !!}</p>
</div>

<!-- Observaciones Field -->
<div class="form-group">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    <p>{!! $concurso->observaciones !!}</p>
</div>

<!-- Fechainicio Field -->
<div class="form-group">
    {!! Form::label('fechaInicio', 'Fechainicio:') !!}
    <p>{!! $concurso->fechaInicio !!}</p>
</div>

<!-- Fechafin Field -->
<div class="form-group">
    {!! Form::label('fechaFin', 'Fechafin:') !!}
    <p>{!! $concurso->fechaFin !!}</p>
</div>

<!-- FechaCierre Field -->
<div class="form-group">
    {!! Form::label('fechaCierre', 'Fecha de cierre:') !!}
    <p>{!! $concurso->fechaCierre!!}</p>
</div>

<!-- UsuarioCierre Field -->
<div class="form-group">
    {!! Form::label('usuarioCierre', 'Usuario de cierre:') !!}
    <p>{!! $concurso->usuarioCierre!!}</p>
</div>