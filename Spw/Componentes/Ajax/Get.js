jQuery("#salvar").click(function(){
     
     jQuery("#modal-legenda").html("Salvando....");
     jQuery("#preloader").show();
     let nome = jQuery("#nome_completo").val();
     
     jQuery.get("admin-ajax.php?action=pessoas_inserir_pessoa&page=studiopreview&nome=" + nome, function() {
         
         jQuery("#preloader").hide();
         jQuery("#modal-painel-mensagem").load("admin-ajax.php", {action:"pessoas_exibir_mensagem", page:"studiopreview"});
         jQuery("#modal-legenda").html("Salvo com sucesso!");
         
          setTimeout(function() {
              
              jQuery("#modal-legenda").html("");
         }, 5000);
    
     });
    
});