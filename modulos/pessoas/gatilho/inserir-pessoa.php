<?php

     $inserir = new \Spw\Componentes\Mysql\InserirRegistro();
     $inserir->Set_Conectar();
     $inserir->Set_Start('POST', 'start');
     $inserir->Set_NomeDaTabela('spw_pessoas');
     $inserir->Set_AdicionarRegistro(true, 'id_pessoa', 'ID_NUMERICO', null, null);
     $inserir->Set_AdicionarRegistro(true, 'lixeira', 'string', 'value', 'Y');
     $inserir->Executar();
     
     
     $pagina = new \Pessoas\Componentes\PaginaEditarPessoa();
     $pagina->Set_IdPessoa($inserir->id_gerado);
     $pagina->Executar();
     
     echo $pagina->Get_Render();
     