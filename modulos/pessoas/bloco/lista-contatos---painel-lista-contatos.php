<?php

     $painel = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel->Set_Titulo('Contatos');
     $painel->Set_AdicionarConteudo('Listar 5 ' . @$_REQUEST['teste']);
     $painel->Executar();
     
     echo $painel->render;