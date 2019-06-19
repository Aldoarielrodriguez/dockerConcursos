<div class="modal-body">
           <div class="content">
               @include('adminlte-templates::common.errors')

                                @include('concursos.cerrar_fields')

           </div>
        </div>

 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    @if ($concurso->estado == 'Cerrado')
    <button id="confirmarCierre" type="button" class="btn btn-success" data-slug="" disabled>Confirmar</button>
    @else
    <button id="confirmarCierre" type="button" class="btn btn-success" data-slug="">Confirmar</button>
    @endif
   
 </div>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script>
    $('#confirmarCierre').on('click', function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //validacion
        if($('#fechaSustanciacion').val() ==="" || $('#fechaSustanciacionTime').val()==="")
        {
            alert("Debe ingresar la fecha y hora de sustanciación.")
            return;
        }

        var fechaSus = $('#fechaSustanciacion').val() + ' ' + $('#fechaSustanciacionTime').val() + ":00";
        //envio datos al servidor
        $.ajax({
                    /* the route pointing to the post function */
                    url: '/cerrar/'+{!!$concurso->id!!},
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, fechaSustanciacion: fechaSus},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $('#myModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        window.location = "/concursos";
                    },
                    error: function (data) { 
                        alert("error");
                    }
                }); 
    });

    </script>

