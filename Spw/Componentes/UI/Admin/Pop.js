jQuery(document).ready( function() {
     
     let pop_id = '{pop_id}';
     let botao_abrir_id = '{botao_abrir_id}';
     
     jQuery("#bot-fechar-" + pop_id).click( function() {
          
          event.preventDefault();
          jQuery("#" + pop_id).hide();
          
     } );
     
     
     jQuery("#" + botao_abrir_id).click( function() {
          
          event.preventDefault();
          jQuery("#" + pop_id).show();
          
     } );
     
     
} );