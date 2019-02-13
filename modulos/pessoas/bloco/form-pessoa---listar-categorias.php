<?php

     $painel_categorias = new \Spw\Componentes\UI\Admin\Painel_Conteudo();
     $painel_categorias->Set_Titulo('Categorias');
     $painel_categorias->Set_AdicionarBloco('pessoas', 'pessoas-categorias');
     $painel_categorias->Set_AddLinkNoMenu('categorias_inserir', null, '#', 'Inserir nova categoria', null);
     $painel_categorias->Executar();
     
     $load_categoria = new \Spw\Componentes\Ajax\Load();
     $load_categoria->Set_Botao_Id('categorias_inserir');
     $load_categoria->Set_Action('bloco_nova_categoria');
     $load_categoria->Set_Callback_Id('painel_categorias');
     $load_categoria->Executar();
     
     echo $painel_categorias->render;
     echo $load_categoria->render;