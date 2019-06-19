<section class="content">
<!--INICIO Concursos -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Selecione Concurso</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <!-- Concursos Field -->
          <div class="form-group col-sm-12">
              {!! Form::label('concurso_id', 'CONCURSO') !!}
              <span class="text-danger"> (*)  </span>
              {!! Form::select ('concurso_id', $concursos, null, ['class' => 'form-control' , 'placeholder' => 'Seleccione Concurso']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--FIN Concursos -->


<!-- INICIO Postulante -->
<div class="box box-danger">
  <div class="box-header with-border">
    <h3 class="box-title">Seleccione Postulante</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <!-- Concursos Field -->
          <div class="form-group col-sm-12">
            {!! Form::label('postulante_id', 'POSTULANTE') !!}
            <span class="text-danger"> (*)  </span>
            {!! Form::select('postulante_id', $postulantes , null, ['class' => 'form-control', 'placeholder' => 'Seleccione Postulante']) !!}
          </div>
       </div>
     </div>
   </div>
 </div>
</div>


<!-- Requisito item Field -->
<div class="form-group col-sm-12">

  {!! Form::label('requisitoitem_id', 'REQUISITO') !!}
  <span class="text-danger"> (*)  </span>
  {!! Form::select('requisitoitem_id', $requisitosItems , null , ['class' => 'form-control', 'placeholder' => 'Seleccione Opción']) !!}
  <!--Form::checkbox('requisitoitem_id', $requisitosItems ) !!} -->
</div>

<div class="form-group col-sm-12">
  {!! Form::label('entregoRequisito', 'ENTREGO REQUISITOS') !!}
  <span class="text-danger"> (*)  </span>
  {!! Form::select('entregoRequisito', $entregoRequisito, null ,  ['class' => 'form-control', 'placeholder' => 'Seleccione Opción']) !!}
</div>
<!-- Etrego requisito Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cumpleRequisito', 'CUMPLE CON LOS REQUISITOS') !!}
    {!! Form::select('cumpleRequisito', $cumpleRequisito, null ,  ['class' => 'form-control', 'placeholder' => 'Seleccione Opción']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('requisitoPostulantes.index') !!}" class="btn btn-default">Cancel</a>
</div>



</div>
</section>
