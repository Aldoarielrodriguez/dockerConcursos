<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'NOMBRE') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Instituto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instituto_id', 'INSTITUTO') !!}
    <span class="text-danger"> (*)  </span>
    {!! Form::select('instituto_id', $institutos ,  null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Instituto']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('carreras.index') !!}" class="btn btn-default">Cancel</a>
</div>
