
jQuery(document).ready(function() {
     
     let modal_id = "{modal_id}";
          
     jQuery(".spw-modal").hide();
     jQuery("#" + modal_id).css({'display':'flex'});

     jQuery("#botao_fechar_" + modal_id).click( function() {

          event.preventDefault();
          jQuery("#" + modal_id).hide();

     } );


     jQuery("#background_modal_" + modal_id).click( function() {

          event.preventDefault();
          jQuery("#" + modal_id).hide();

     } );
          
     
});