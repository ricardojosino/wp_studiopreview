/* global spw_id_botao, spw_callback_id, spw_data */

jQuery(document).ready( function(){
     
         let callback_id = spw_callback_id;
         let url = "admin-ajax.php";
         let data = spw_data;
         
         jQuery("#preloader").show(); 
         jQuery("#" + callback_id).load( url, data, function() {
              
              jQuery("#preloader").hide();
              
         });



});