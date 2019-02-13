<?php

     function spw_modulos_aplicativos_botao_instalacao()
     {
          
          \Spw\Componentes\Modulo\Executar::Gatilho('aplicativos', 'instalar-app');
          \Spw\Componentes\Modulo\Executar::Gatilho('aplicativos', 'desintalar-app');
          
          $icone = new \Aplicativos\Componentes\IconeInstalacao();
          $icone->Set_IdAplicativo($_POST['id_aplicativo']);
          $icone->Executar();
          
          echo $icone->render;
         
          die();
     }
     
     
     function spw_modulos_aplicativos_botao_instalacao_callback()
     {
          $mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
          $mensagem->Executar();
          
          echo $mensagem->render;
          
          die();
     }
     
     
     $registrar_spw_modulos_aplicativos_botao_instalacao = new \Spw\Componentes\Wp\RegistrarFuncaoAjax();
     $registrar_spw_modulos_aplicativos_botao_instalacao->Set_NomeDaFuncao('spw_modulos_aplicativos_botao_instalacao');
     $registrar_spw_modulos_aplicativos_botao_instalacao->Set_NomeDaFuncao('spw_modulos_aplicativos_botao_instalacao_callback');
     $registrar_spw_modulos_aplicativos_botao_instalacao->Executar();