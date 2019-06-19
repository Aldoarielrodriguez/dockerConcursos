<div class="modal-body">
           <div class="content">
               @include('adminlte-templates::common.errors')

                                @include('concursos.sustanciar_fields')

           </div>
        </div>

 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    @if ($concurso->estado == 'Sustanciado')
    <button id="confirmarSustanciacion" type="button" class="btn btn-success" data-slug="" disabled>Confirmar</button>
    @else
    <button id="confirmarSustanciacion" type="button" class="btn btn-success" data-slug="">Confirmar</button>
    @endif
   
 </div>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script>
    var encodedFile="";

    $("#dictamenFile").on('change', function() {
        var reader = new FileReader();
        var encodedFile;
        reader.readAsDataURL(document.getElementById("dictamenFile").files[0]);
        reader.onload = function () {
            localStorage.setItem("base64file", reader.result);
        };
        reader.onerror = function (error) {
          console.log('Error: ', error);
        };
    });

    $('#confirmarSustanciacion').on('click', function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        //verifico si se cargo un dictamen
        if(localStorage.getItem("base64file")===null)
        {
            alert("No se ha subido el dictamen.");
            return;
        }

        //guardo las ordenes de merito/*
        var ordenes = [];
        $('select[name="selectOrdenMerito"]').each(function( index ) {
            ordenes.push({postulanteid:$(this).attr("postulanteid"), ordennumero: $(this).val()});
        });
        
        //envio datos al servidor
        $.ajax({
                    /* the route pointing to the post function */
                    url: "{{ url('/sustanciar') }}/"+{!!$concurso->id!!},
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, file: localStorage.getItem("base64file"), ordenesMerito: ordenes},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $('#myModal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        localStorage.removeItem("base64file");
                        window.location = "{{ url('/concursos') }}/";
                    },
                    error: function (data) { 
                        alert("error");
                        localStorage.removeItem("base64file");
                    }
                }); 
    });

    </script>

