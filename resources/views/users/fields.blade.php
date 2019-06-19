<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'NOMBRE') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'EMAIL') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'CONTRASEÑA') !!}
    {!! Form::password('password', ['class' => 'form-control' , 'disabled']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'TOKEN') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control' , 'disabled']) !!}
</div>

<!-- Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol', 'ROL') !!}
    {!! Form::select('rol', $roles , null , ['class' => 'form-control' , 'placeholder'=>'Seleccione Rol']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image', 'IMAGEN') !!}
    {!! Form::text('image', null , ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'ESTADO') !!}
    {!! Form::select('estado', $estado , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
