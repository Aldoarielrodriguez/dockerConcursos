<!-- Concurso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'CONCURSO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('concurso_id', $concursos  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
</div>

<!-- Postulante Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('postulante_id', 'POSTULANTE') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('postulante_id', $postulantes , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Postulante']) !!}
</div>

<!-- Fechapresentacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaPresentacion', 'FECHA DE PRESENTACION') !!}
    {!! Form::date('fechaPresentacion',null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'TIPO DE POSTULANTE') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('tipo', $tipoPostulantes,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Tipo']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursoPostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>
