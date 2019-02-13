<?php

     $atualizar = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $atualizar->Set_Conectar();
     $atualizar->Set_NomeDaTabela('spw_pessoas_categorias');
     $atualizar->Set_Start('VALUE', 1);
     $atualizar->Set_ChavePrimaria('id_categoria', $_POST['id_categoria']);
     $atualizar->Set_AdicionarCampo(true, 'lixeira', 'string', 'value', 'N');
     $atualizar->Set_AdicionarCampo(true, 'categoria', 'string', 'POST', 'categoria');
     $atualizar->Executar();