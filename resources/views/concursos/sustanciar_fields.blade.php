

@if ($concurso->estado == 'Sustanciado')
    <section class="content-header">
         <h1>
             Info de dictamen
         </h1>
    </section>
     <div class="box box-primary">
         <div class="box-body">
            <div class="row">
                <a download="Dictamen {{$concurso->referenciaGeneral}}" href="{{$concurso->dictamen}}" class="btn btn-primary">Descargar dictamen</a>
            </div>
             <div class="row">
                 {!! Form::label('usuarioSustanciacion', 'Usuario que cargó el dictamen:') !!}
                 <p>{!! $concurso->userSus->name!!}</p>
             </div>
         </div>
     </div>

     <section class="content-header">
     <h1>
         Ordenes de merito
     </h1>
    </section>
    <div class="box box-primary">
        <div class="box-body">
            <table border="1" style="width:100%">
            @foreach($ordenes as $orden) 
            <tr>
                <td>
                    <p> {{ $orden->postulante->nombres ." ". $orden->postulante->apellidos }} </p>
                </td>
                <td>Orden: {{ $orden->ordenMerito}}</td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>

@else
    <section class="content-header">
         <h1>
             Carga de dictamen
         </h1>
    </section>
     <div class="box box-primary">
         <div class="box-body">
             <div class="row">
                 {!! Form::label('uploadDictamen', 'Cargar dictamen:') !!}
                 {{Form::file('dictamenFile', array('id'=>'dictamenFile','class' => 'file'))}}   
             </div>
         </div>
     </div>

    <section class="content-header">
         <h1>
             Ordenes de merito
         </h1>
    </section>
    <div class="box box-primary">
        <div class="box-body">
            @foreach($concurso->postulantes as $postulante) 
            <div class="row">
            <p> {{ $postulante->nombres ." ". $postulante->apellidos }} {!! Form::select ('selectOrdenMerito', range(1,count($concurso->postulantes)), null, ['postulanteid'=>$postulante->id,'class' => 'form-control' , 'placeholder' => 'Seleccione orden']) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
@endif