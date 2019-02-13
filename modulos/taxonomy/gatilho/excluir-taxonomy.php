<?php

    $excluir = new \Spw\Componentes\Mysql\DeletarRegistro();
    $excluir->Set_Conectar();
    $excluir->Set_Start('GET', 'id_taxonomy');
    $excluir->Set_NomeDaTabela('spw_taxonomy');
    $excluir->Set_ChavePrimaria('id_taxonomy', $_GET['id_taxonomy']);
    $excluir->Set_Mensagem('Taxonomia deletada com sucesso!');
    $excluir->Executar();
    
    $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
    $redirecionar->Set_RedirecionarParaPagina('studiopreview', 'taxonomy', 'home', null);
    $redirecionar->Executar();