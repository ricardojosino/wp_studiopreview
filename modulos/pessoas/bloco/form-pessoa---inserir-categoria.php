<?php
     
     $campo_categoria = new \Spw\Componentes\Html\Form_InputText();
     $campo_categoria->Set_Exibir(true);
     $campo_categoria->Set_Id('categoria');
     $campo_categoria->Set_Name('categoria');
     $campo_categoria->Set_Require(true);
     $campo_categoria->Set_Label('Nome da categoria');
     $campo_categoria->Set_Value(null);
     $campo_categoria->Executar();
     
     $botao_salvar = new \Spw\Componentes\Html\Form_InputButton();
     $botao_salvar->Set_Exibir(true);
     $botao_salvar->Set_Id('bot_salvar_categoria');
     $botao_salvar->Set_Name('bot_salvar_categoria');
     $botao_salvar->Set_Value('Salvar');
     $botao_salvar->Executar();
     
     $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
     $container->Set_AdicionarConteudo(null, $campo_categoria->render, 0, 0);
     $container->Set_AdicionarConteudo(null, $botao_salvar->render, '20px', 0);
     $container->Executar();

     $painel_categorias = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_categorias->Set_Titulo('Categorias');
     $painel_categorias->Set_Id('painel_categoria');
     $painel_categorias->Set_AdicionarConteudo($container->render);
     $painel_categorias->Set_AddLinkNoMenu('bot-voltar', null, '#', 'Voltar', null);
     $painel_categorias->Executar();
     
     $load_voltar = new \Spw\Componentes\Ajax\Load();
     $load_voltar->Set_Botao_Id('bot-voltar');
     $load_voltar->Set_Action('bloco_lista_de_categoria');
     $load_voltar->Set_Callback_Id('painel_categorias');
     $load_voltar->Executar();
     
     echo $painel_categorias->render;
     echo $load_voltar->render;
     
    