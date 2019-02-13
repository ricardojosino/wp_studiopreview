/* global spw_id_botao, spw_callback_id, spw_data */

jQuery(document).ready( function(){
     
    
     let id = spw_id_botao; 
     
     jQuery("#" + id).click( function(event) {
          
         event.preventDefault();
          
         let callback_id = spw_callback_id;
         let url = "admin-ajax.php";
         let data = spw_data;
         
         jQuery("#preloader").show(); 
         jQuery("#" + callback_id).load( url, data, function() {
              
              jQuery("#preloader").hide();
              jQuery("#spw-mensagem").load(url, {action:"spw_modulos_aplicativos_botao_instalacao_callback", page:"studiopreview"});
              
              
         });


     });

});