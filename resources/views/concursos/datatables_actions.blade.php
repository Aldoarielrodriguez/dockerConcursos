{!! Form::open(['route' => ['concursos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('concursos.show', $id) }}" data-toggle="tooltip" title ="ver" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @if ( Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Administrativo' )

    <a href="{{ route('concursos.edit', $id) }}" data-toggle="tooltip" title ="editar" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>

      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'data-toggle'=>'tooltip',
        'title'=> 'eliminar',
          'type' => 'submit',
          'class' => 'btn btn-danger btn-xs',
          'onclick' => "return confirm('¿Está seguro que desea eliminar el registro?')"
      ]) !!}
    @endif

    <a href="{{ url('/mail/send', $id) }}" data-toggle="tooltip" title ="mail" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-send"></i>
    </a>


<!--------------------------------->
</div>
<div class='btn-group'>
    <!--cierra un concurso-->
    <button name="cerrarModal" data-toggle="tooltip" title ="Cerrar" type="button" class="btn btn-success btn-xs"
     data-toggle="modal" data-id="{{ $id  }}" data-post="data-php" data-action="cerrar">Cerrar</button>
 </div>

<div class='btn-group'>
    <!--sustancia un concurso-->
    <button name="sustanciarModal" data-toggle="tooltip" title ="Sustanciar" type="button" class="btn btn-success btn-xs"
     data-toggle="modal" data-id="{{ $id  }}" data-post="data-php" data-action="sustanciar">Sustanciar</button>
 </div>

<div class='btn-group'>
    <!--cambia de estado a un concurso-->
    <button type="button" class="btn btn-success btn-xs dropdown-toggle"
     data-toggle="dropdown">Cambiar Estado<span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="{{ url('/pendiente', $id ) }}">Pendiente</a></li>
      <li><a href="{{ url('/impugnado', $id ) }}">Impugnado</a></li>
      <li><a href="{{ url('/vacante', $id ) }}">Vacante</a></li>
      <li><a href="{{ url('/nulo', $id ) }}">Nulo</a></li>
      <li><a href="{{ url('/desiertoconvocatoria', $id ) }}">Desierto en convocatoria</a></li>
      <li><a href="{{ url('/desiertosustanciacion', $id ) }}">Desierto en sustanciación</a></li>
    </ul>
</div>
{!! Form::close() !!}

<script>
    $('button[name="sustanciarModal"]').on('click', function(){
        var this_id = $(this).attr('data-id');
            $.get( "{{ url('/showSustanciar') }}/" + this_id, function( data ) {
                $('#myModal').modal();
                $('#myModal').on('shown.bs.modal', function(){
                    $('#myModal .load_modal').html(data);
                });
                $('#myModal').on('hidden.bs.modal', function(){
                    $('#myModal .modal-body').data('');
                });
            });
    });
    $('button[name="cerrarModal"]').on('click', function(){
        var this_id = $(this).attr('data-id');
            $.get( "{{ url('/showCerrar') }}/" + this_id, function( data ) {
                $('#myModal').modal();
                $('#myModal').on('shown.bs.modal', function(){
                    $('#myModal .load_modal').html(data);
                });
                $('#myModal').on('hidden.bs.modal', function(){
                    $('#myModal .modal-body').data('');
                });
            });
    });
</script>
