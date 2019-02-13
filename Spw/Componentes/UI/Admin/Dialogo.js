
jQuery(document).ready(function() {
     
     let modal_id = "{modal_id}";
          
     jQuery(".spw-dialogo").hide();
     jQuery("#" + modal_id).css({'display':'flex'});

     jQuery("#botao_fechar_dialogo_" + modal_id).click( function() {

          event.preventDefault();
          jQuery("#" + modal_id).hide();

     } );


     jQuery("#background_dialogo_" + modal_id).click( function() {

          event.preventDefault();
          jQuery("#" + modal_id).hide();

     } );
          
     
});