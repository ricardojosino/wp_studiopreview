<?php

     
     $botao = new \Spw\Componentes\UI\Admin\Botao();
     $botao->Set_AdicionarBotao_Info(null, 'Instalar Atualização', \Spw\Componentes\Modulo\Link::ExecutarGatilho('controle-de-versao', 'instalacao', null), null);
     $botao->Executar();
     
     $painel_botao = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botao->Set_AdicionarBotao($botao->render);
     $painel_botao->Executar();
     
     $mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
     $mensagem->Set_AdicionarMensagem('Atualização necessária!');
     $mensagem->Executar();
     
     $page = new \Spw\Componentes\UI\Admin\Pagina();
     $page->Set_Titulo('Atualização do plugin');
     $page->Set_AdicionarConteudo($mensagem->render);
     $page->Set_AdicionarConteudo($painel_botao->render);
     $page->Executar();
     
     \Spw\Componentes\Funcoes::Show($page->render);