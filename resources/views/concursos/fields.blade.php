<!-- Asignatura Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('llamado_id', 'LLAMADO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select ('llamado_id', $llamados, null, ['class' => 'form-control' , 'placeholder' => 'Seleccione un llamado']) !!}
</div>

<!-- Referenciainstituto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referenciaInstituto', 'REFERENCIA INSTITUTO') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::text('referenciaInstituto', null, ['class' => 'form-control']) !!}
</div>

<!-- Asignatura Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignatura_id', 'ASIGNATURA') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select ('asignatura_id', $asignaturas, null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Asignatura']) !!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'CATEGORIA') !!}
     <span class="text-danger"> (*)  </span>
    {!! Form::select('categoria_id', $categorias , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Categoria']) !!}
</div>

<!-- Dedicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dedicacion', 'DEDICACIÓN') !!}
     <span class="text-danger"> (*)  </span>
    {!! Form::select('dedicacion', $dedicaciones , null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Dedicacion']) !!}
</div>

<!-- Perfil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perfil_id', 'PERFIL') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::select('perfil_id', $perfiles , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Perfil']) !!}
</div>

<!-- Referenciageneral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referenciaGeneral', 'REFERENCIA GENERAL') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::text('referenciaGeneral', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargos', 'CARGOS') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::text('cargos', null, ['class' => 'form-control']) !!}
    </label>
</div>

<!-- Lineadesarrollo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lineaDesarrollo', 'LINEA DE DESARROLLO') !!}
    {!! Form::text('lineaDesarrollo', null, ['class' => 'form-control']) !!}
</div>

<!-- Requisitos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requisitos', 'REQUISITOS') !!}
    {!! Form::text('requisitos', null, ['class' => 'form-control']) !!}
</div>

<!-- Expediente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expediente', 'EXPEDIENTE') !!}
    {!! Form::text('expediente', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', 'OBSERVACIONES') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechafin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaSustanciacion', 'FECHA DE SUSTANCIACION') !!}
       <span class="text-danger"></span>
    {!! Form::date('fechaSustanciacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
