<?php

     $desintalar_app = new \Spw\Componentes\Mysql\DeletarRegistro();
     $desintalar_app->Set_Start('POST', 'del');
     $desintalar_app->Set_Conectar();
     $desintalar_app->Set_NomeDaTabela('spw_aplicativos_instalados');
     $desintalar_app->Set_ChavePrimaria('id_instalacao', $_POST['id_instalacao']);
     $desintalar_app->Set_Mensagem('Desinstalado com sucesso! ' . \Spw\Componentes\Html\Funcoes::Tag('a', array('href' => 'admin.php?page=studiopreview&modulo=aplicativos&pagina=instalacao'), 'Atualizar Dashboard'));
     $desintalar_app->Executar();