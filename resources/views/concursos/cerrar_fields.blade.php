@if ($concurso->estado == 'Cerrado')
    <section class="content-header">
         <h1>
             Información del cierre
         </h1>
    </section>
     <div class="box box-primary">
         <div class="box-body">
            <div class="row">
                 {!! Form::label('usuarioCierre', 'Usuario que cerró el concurso:') !!}
                 <p>{!! $concurso->userCie->name!!}</p>
             </div>
             <div class="row">
                 {!! Form::label('fechaSustanciacion', 'Fecha de sustanciación:') !!}
                 <p>{!! $concurso->fechaSustanciacion!!}</p>
             </div>
         </div>
     </div>
@else
    <section class="content-header">
         <h1>
             Cierre de concurso
         </h1>
    </section>
     <div class="box box-primary">
         <div class="box-body">
             <div class="row"> 
                <!-- Fechafin Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('lblfechaSustanciacion', 'Fecha de sustanciación') !!}
                    {!! Form::date('fechaSustanciacion', null, ['id'=>'fechaSustanciacion', 'class' => 'form-control']) !!}
                    {!! Form::time('fechaSustanciacionTime',null, ['id'=>'fechaSustanciacionTime', 'class' => 'form-control']) !!}
                </div>
             </div>
         </div>
     </div>
@endif