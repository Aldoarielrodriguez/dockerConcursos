<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'CÓDIGO') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Año Field -->
<div class="form-group col-sm-6">
    {!! Form::label('año', 'AÑO') !!}
    {!! Form::text('año', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechainicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaInicio', 'FECHA DE INICIO') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::date('fechaInicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Fechafin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fechaFin', 'FECHA DE FIN') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::date('fechaFin', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('llamados.index') !!}" class="btn btn-default">Cancel</a>
</div>
