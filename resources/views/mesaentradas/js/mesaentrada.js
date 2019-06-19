
  $('#concursosAjaxSelect').on('change',function(e){
    $('#requisitositemsList').empty();
      var concursoid = e.target.value;
      $("#ajax_loader").show();
      $.get('/ajax-concursos?concursoid='+concursoid, function(data){

        //cargo el select de templates de requisitos
        $('#requisitosAjaxSelect').empty();
        $.each(data, function(index, reqObject){
          $('#requisitosAjaxSelect').append('<option value="'+ reqObject.id+'">'+reqObject.descripcion + "</option>")
        });

        //cargo la grilla con requisitos items
        loadRequisitosItems();

        $("#ajax_loader").hide();

      })
  });

  $('#requisitosAjaxSelect').on('change',function(e){
    if (!($("#ajax_loader").is(':visible'))) $("#ajax_loader").show();

    //loadRequisitosItems();
  });

function loadRequisitosItems()
{
  //cada vez que cambio el template de requisitos, traigo los nuevos items
      $.get('/ajax-requisitos?requisitoid='+$('#requisitosAjaxSelect').val(), function(data){
          $('#requisitositemsList').empty();
          $.each(data, function(index, reqItemsObject){
            $('#requisitositemsList').append('<li><input id="'+reqItemsObject.descripcion+'" name="requisitositems[]" value="'+reqItemsObject.id+'" type="checkbox"></input><label for="' +reqItemsObject.descripcion+'"><span>'+reqItemsObject.descripcion+'</span></label></li>');
          });

          if (($("#ajax_loader").is(':visible'))) $("#ajax_loader").hide();
      })
}