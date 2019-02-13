<?php

     $deletar = new \Spw\Componentes\Mysql\DeletarRegistro();
     $deletar->Set_Conectar();
     $deletar->Set_Start('GET', 'id_post_type');
     $deletar->Set_NomeDaTabela('spw_post_type');
     $deletar->Set_Mensagem('Post Type deletado com sucesso!');
     $deletar->Set_ChavePrimaria('id_post_type', $_GET['id_post_type']);
     $deletar->Executar();
     
     $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
     $redirecionar->Set_RedirecionarParaPagina('studiopreview', 'post-type', 'home', null);
     $redirecionar->Executar();