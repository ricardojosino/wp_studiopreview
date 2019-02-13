<?php

     $inserir = new \Spw\Componentes\Mysql\InserirRegistro();
     $inserir->Set_Conectar();
     $inserir->Set_Start('POST', 'start');
     $inserir->Set_NomeDaTabela('spw_pessoas_categorias');
     $inserir->Set_AdicionarRegistro(true, 'id_categoria', 'ID_NUMERICO', 'VALUE', null);
     $inserir->Set_AdicionarRegistro(true, 'lixeira', 'string', 'value', 'Y');
     $inserir->Executar();
     
     $formulario = new Pessoas\Componentes\BlocoEditarCategoria();
     $formulario->Set_IdCategoria($inserir->id_gerado);
     $formulario->Executar();
     
     echo $formulario->Get_Render();
    