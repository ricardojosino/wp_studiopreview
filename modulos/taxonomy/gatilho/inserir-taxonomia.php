<?php

     $inserir = new \Spw\Componentes\Mysql\InserirRegistro();
     $inserir->Set_Conectar();
     $inserir->Set_NomeDaTabela('spw_taxonomy');
     $inserir->Set_Start('GET', 'start');
     $inserir->Set_AdicionarRegistro(true, 'id_taxonomy', 'ID_NUMERICO', 'value', null);
     $inserir->Set_RetornarParaPagina(SPW_WP_PAGE, 'taxonomy', 'editar-taxonomy', null);
     $inserir->Executar();