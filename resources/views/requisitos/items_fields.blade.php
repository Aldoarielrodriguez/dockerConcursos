     <section class="content-header">
     <h1>
         Items
     </h1>
    </section>
    <div class="box box-primary">
        <div class="form-group col-sm-12">
        {!! Form::label('Agregar', 'Agregar') !!}
         <span class="text-danger"> (*)  </span>
         {!! Form::text('RequisitoItem', null, ['id'=>'inputRequisitoItem','class' => 'form-control']) !!}
         <a id="addItem" data-toggle="tooltip" title ="Agregar" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-plus"></i>
        </a>
        </div>
        <div class="form-group col-sm-12">
            <div class="box-body">
            <table border="1" style="width:100%" id="itemsTableHTML">
            @foreach($items as $item) 
            <tr>
                <td style="display:none;">
                    {{ $item->id}}
                </td>
                <td>
                    {{ $item->descripcion}}
                </td>
                <td>
                    <a name="removeItem" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </table>
            </div>
        </div>
    </div>
<script>
    $('#addItem').on('click', function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var newItem = $('#inputRequisitoItem').val();
        $('#inputRequisitoItem').val("");
        
        $('#itemsTableHTML').append('<tr><td style="display:none;"></td><td>'+newItem+'</td><td><a name="removeItem" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-remove"></i></a></td></tr>');
        var items=[];
    });

    $('[name="removeItem"]').on('click', function(){
        $(this).closest('tr').remove();
    });

    </script>