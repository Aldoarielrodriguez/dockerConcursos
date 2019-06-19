<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'CATEGORIA') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('categoria_id', $categorias  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione categoria']) !!}
</div>
<!-- Jurado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'CONCURSO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('concurso_id', $concursos  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
</div>

<!-- Jurado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jurado_id', 'JURADO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('jurado_id', $jurados  , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Jurado']) !!}
</div>

<!-- Nivel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel', 'NIVEL') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('nivel', $niveles , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Nivel']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'TIPO DE JURADO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('tipo', $tipoJurados , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione TIpo de Jurado']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursoJurados.index') !!}" class="btn btn-default">Cancel</a>
</div>
