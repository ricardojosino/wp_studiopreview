
let botao_id = '{botao_id}';

jQuery("#" + botao_id).click(function()

{
     
     let modal_legenda_exibir = '{modal_legenda_exibir}';
     let modal_legenda_texto_preload = '{modal_legenda_texto_preload}';
     let modal_legenda_texto_sucesso = '{modal_legenda_texto_sucesso}';
     let preload_exibir = '{preload_exibir}';
     let painel_mensagem_exibir = '{painel_mensagem_exibir}';
     let painel_mensagem_id = '{painel_mensagem_id}';
     let painel_mensagem_data = {painel_mensagem_data};
     let data = {data};
     let callback_exibir = '{callback_exibir}';
     let callback_id = '{callback_id}';
     let callback_data = {callback_data};
     let callback_modal_fechar = '{callback_modal_fechar}';
     let callback_modal_id = '{callback_modal_id}';
     
     if (modal_legenda_exibir === 'Y')
     {
          jQuery("#modal-legenda").html(modal_legenda_texto_preload);
     }
     
     if (preload_exibir === 'Y')
     {
          jQuery("#preloader").show();
     }
          
     jQuery.post("admin-ajax.php", data,
     
     function(data, status) 
     {
          
          if (preload_exibir === 'Y')
          {
               jQuery("#preloader").hide(); 
          }
          
          if (painel_mensagem_exibir === 'Y')
          {
               jQuery("#" + painel_mensagem_id).load("admin-ajax.php", painel_mensagem_data);
          }
          
          if (modal_legenda_exibir === 'Y')
          {
               jQuery("#modal-legenda").html("");
               jQuery("#modal-legenda").html(modal_legenda_texto_sucesso);

               setTimeout(function() {
                    jQuery("#modal-legenda").html("");

               }, 5000);
          }
          
          if (callback_exibir === 'Y')
          {
               jQuery("#" + callback_id).load("admin-ajax.php", callback_data);
          }
          
          
          if (callback_modal_fechar === 'Y')
          {
               setTimeout( function() {
                    
                    jQuery("#" + callback_modal_id).hide();
                    
               }, 2000 );
          }
    
     });
    
});