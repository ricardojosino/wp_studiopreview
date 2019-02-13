jQuery(document).ready(function(){
     
     let botao_seletor = "{botao_seletor}";
     let bloco_seletor = "{bloco_seletor}";
     
     jQuery(botao_seletor).click(function(event) {
          
          event.preventDefault();
          jQuery(bloco_seletor).hide();
          
     });
     
});
     
