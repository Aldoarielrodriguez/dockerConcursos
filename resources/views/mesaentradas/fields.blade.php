<div class="form-group col-sm-12">
    <section class="content-header">
            <h1>
                Mesa de entradas
            </h1>
    </section>
</div>
<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'NOMBRES') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'APELLIDOS') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documento', 'DOCUMENTO') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::text('documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'TELEFONO') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'CELULAR') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'EMAIL') !!}
       <span class="text-danger"> (*)  </span>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'DIRECCION') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

 @if ($isEdit)
 <button id="confirmarSustanciacion" type="button" class="btn btn-success" data-slug="" disabled>Confirmar</button>
 @else
 <!-- Seccion de asignacion a concurso-->
<div class="form-group col-sm-12">
    <section class="content-header">
            <h1>
                Asignación de concursos
            </h1>
    </section>
</div>

<!-- AsignacionConcurso - Concurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('concurso_id', 'Concurso:') !!}
    {!! Form::select('concurso_id', $concursos  , null, ['id'=>'concursosAjaxSelect', 'class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
</div>

<!-- Seccion de asignacion a requisitos-->
<div class="form-group col-sm-12">
    <section class="content-header">
            <h1>
            Documentación requerida
            </h1>
    </section>
</div>

<!-- AsignacionConcurso - Nombres Field -->
<div class="form-group col-sm-12">
    {!! Form::label('requisito_id', 'Requisito:') !!}
    {!! Form::select('requisito_id', $requisitos  , null, ['id'=>'requisitosAjaxSelect', 'class' => 'form-control' , 'placeholder' => 'Seleccione listado de requisitos']) !!}
</div>

<!-- Listado de requisitos -->
<div class="form-group col-sm-12">
    <ul id="requisitositemsList">
    @foreach ($requisitositems as $requisitoitem_id => $requisitoitem )
    <li>
        {!! Form::checkbox( 'requisitositems[]',
                          $requisitoitem_id,
                          false,
                          ['id' => $requisitoitem] 
                          ) !!}
        {!! Form::label($requisitoitem,  $requisitoitem) !!}
    </li>
    @endforeach
    </ul>
</div>

 @endif
 

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('mesaEntradas.index') !!}" class="btn btn-default">Cancel</a>
</div>
