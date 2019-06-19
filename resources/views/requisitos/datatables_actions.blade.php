{!! Form::open(['route' => ['requisitos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('requisitos.show', $id) }}" data-toggle="tooltip" title ="ver" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
  @if ( Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Administrativo' )
    <a href="{{ route('requisitos.edit', $id) }}" data-toggle="tooltip" title ="editar" class='btn btn-default btn-xs'>
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
</div>
<div class='btn-group'>
    <!--cargar items de un reuiqisto-->
    <button name="itemsModal" data-toggle="tooltip" title ="Items" type="button" class="btn btn-success btn-xs"
     data-toggle="modal" data-id="{{ $id  }}" data-post="data-php" data-action="cargaritems">Items</button>
 </div>
{!! Form::close() !!}

<script>
    $('button[name="itemsModal"]').on('click', function(){
        var this_id = $(this).attr('data-id');
            $.get( "{{ url('/showItems') }}/" + this_id, function( data ) {
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