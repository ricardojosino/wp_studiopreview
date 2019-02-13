<?php
     
     $botao_sim = new \Spw\Componentes\UI\Admin\Botao();
     $botao_sim->Set_AdicionarBotao_Excluir(null, 'Sim', '#', null);
     $botao_sim->Executar();
     
     $painel_botoes = new \Spw\Componentes\UI\Admin\Painel_Botoes();
     $painel_botoes->Set_AdicionarBotao($botao_sim->render);
     $painel_botoes->Executar();
     
     $bloco = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
     $bloco->Set_AdicionarConteudo(null, \Spw\Componentes\UI\Admin\Tipografia::Texto('Deseja mesmo excluir este item?'), null, null);
     $bloco->Set_AdicionarConteudo(null, $painel_botoes->render, null, null);
     $bloco->Set_Wrap(false);
     $bloco->Executar();

     $pop = new \Spw\Componentes\UI\Admin\Pop();
     $pop->Set_Titulo('Aviso');
     $pop->Set_Pop_Id('pop-confirma');
     $pop->Set_BotaoAbrir_Id('excluir');
     $pop->Set_AdicionarConteudo($bloco->render);
     $pop->Executar();
     
     $botao = new \Spw\Componentes\Html\Form_InputButton();
     $botao->Set_Exibir(true);
     $botao->Set_ClassCss('spw-botao excluir');
     $botao->Set_Id('excluir');
     $botao->Set_Name('excluir');
     $botao->Set_Value('Excluir');
     $botao->Set_AdicionarComponente($pop->render);
     $botao->Executar();
     
     $pagina = new \Spw\Componentes\UI\Admin\Pagina();
     $pagina->Set_Titulo('Ambiente de teste');
     $pagina->Set_AdicionarConteudo($botao->render);
     $pagina->Executar();
     
     echo $pagina->render;