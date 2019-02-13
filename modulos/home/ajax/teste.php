<?php

     function testando_ajax()
     {
          
          $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
          $painel->Set_Id('painel-teste');
          $painel->Set_Titulo('Teste');
          $painel->Set_AdicionarConteudo('Testando');
          $painel->Executar();
          
          echo $painel->render;
          
          die();

     }
     
     $func_ajax = new \Spw\Componentes\Wp\RegistrarFuncaoAjax();
     $func_ajax->Set_NomeDaFuncao( 'testando_ajax' );
     $func_ajax->Executar();