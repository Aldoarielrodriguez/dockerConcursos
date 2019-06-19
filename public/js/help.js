$(document).ready(function(){
    introJs().refresh()

   if (localStorage.getItem("primeringreso") ==  null) {
         introJs().setOptions({
              'skipLabel': 'Cerrar',
            'nextLabel': 'Siguiente',
            'prevLabel': 'Anterior',
            'exitOnEsc': 'false',
            'doneLabel': 'Cerrar',
            'showButtons': 'false',
            'exitOnOverlayClick': 'false',
            'tooltipPosition': 'right',
            'showStepNumbers' : 'false'
        }).start();
          localStorage.setItem("primeringreso", "true");
   }
   else{}

   $('#boton-consejos').click(function(){
          introJs().showHints();
 });

   $('#boton-ayuda').click(function(){

        introJs().setOptions({
              'skipLabel': 'Cerrar',
            'nextLabel': 'Siguiente',
            'prevLabel': 'Anterior',
            'exitOnEsc': 'false',
            'doneLabel': 'Cerrar',
            'showButtons': 'false',
            'exitOnOverlayClick': 'false',
            'tooltipPosition': 'right',
            'showStepNumbers' : 'false'
        }).start();
   });

  });