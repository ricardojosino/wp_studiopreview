<?php

     
     $inserir = new \Spw\Componentes\Mysql\InserirRegistro();
     $inserir->Set_Start('GET', 'start');
     $inserir->Set_Conectar();
     $inserir->Set_NomeDaTabela('spw_post_type');
     $inserir->Set_AdicionarRegistro(true, 'id_post_type', 'id_numerico', 'value', null);
     $inserir->Set_AdicionarRegistro(true, 'lixeira', 'string', 'value', 'Y');
     $inserir->Set_RetornarParaPagina('studiopreview', 'post-type', 'editar-post-type', null);
     $inserir->Executar();
     