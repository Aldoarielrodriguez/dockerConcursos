<div class="modal-body">
    <div class="content">
            @include('adminlte-templates::common.errors')
            @include('requisitos.items_fields')

    </div>
</div>

 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
   <button id="confirmarItems" type="button" class="btn btn-success" data-slug="">Confirmar</button>
 </div>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script>
    $('#confirmarItems').on('click', function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var table = document.getElementById("itemsTableHTML");
        var items=[];
        for (var i = 0, row; row = table.rows[i]; i++) {
            items.push({id: row.cells[0].innerHTML, descripcion: row.cells[1].innerHTML});
        }
        //envio datos al servidor
        $.ajax({
                    /* the route pointing to the post function */
                    
                    url: "{{ url('/cargaritems') }}/"+{!!$requisito->id!!},
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, RequisitosItems: items},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $('#myModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        window.location = "{{ url('/requisitos') }}/";
                    },
                    error: function (data) { 
                        alert("error");
                    }
                }); 
    });

    </script>