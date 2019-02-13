<?php

     $botao_inserir = new \Spw\Componentes\UI\Admin\Botao();
     $botao_inserir->Set_AdicionarBotao_Inserir('bot-inserir', 'Inserir', \Spw\Componentes\Modulo\Link::ExecutarGatilho('taxonomy', 'inserir-taxonomia', 'start=Y'), null);
     $botao_inserir->Executar();
     
     $painel_botoes = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botoes->Set_AdicionarBotao($botao_inserir->render);
     $painel_botoes->Executar();
     
     $bloco = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
     $bloco->Set_AdicionarConteudo('painel-botoes', $painel_botoes->render, 0, 0);
     $bloco->Set_AdicionarBloco('listar-taxonomias', 'taxonomy', 'listar-taxonomias', null, null);
     $bloco->Executar();
     
     $pagina = new \Spw\Componentes\UI\Admin\Pagina();
     $pagina->Set_AdicionarConteudo($bloco->render, null);
     $pagina->Set_Titulo(SPW_TITULO);
     $pagina->Set_Subtitulo('Taxonomy');
     $pagina->Set_Navegacao_Ativar(true);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Home', \Spw\Componentes\Modulo\Link::AbrirPagina('home', 'pagina-inicial', null), false);
     $pagina->Set_Navegacao_AdicionarLink(null, 'Lista de taxonomias', null, true);
     $pagina->Executar();
     
     \Spw\Componentes\Funcoes::Show($pagina->render);