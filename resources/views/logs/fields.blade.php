<!-- Operacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operacion', 'OPERACIÓN') !!}
    {!! Form::text('operacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'FECHA') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Tabla Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tabla', 'TABLA') !!}
    {!! Form::text('tabla', null, ['class' => 'form-control']) !!}
</div>

<!-- Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'ITEM') !!}
    {!! Form::number('item_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('logs.index') !!}" class="btn btn-default">Cancel</a>
</div>
