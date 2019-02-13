<?php

     $excluir = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $excluir->Set_Conectar();
     $excluir->Set_Start('POST', 'id_categoria');
     $excluir->Set_NomeDaTabela('spw_pessoas_categorias');
     $excluir->Set_ChavePrimaria('id_categoria', $_POST['id_categoria']);
     $excluir->Set_AdicionarCampo(true, 'lixeira', 'string', 'value', 'Y');
     $excluir->Set_Mensagem('Categoria excluída com sucesso!');
     $excluir->Executar();
     
     
     $pagina = new \Pessoas\Componentes\PaginaListarCategorias();
     $pagina->Executar();

     echo $pagina->Get_Render();
     