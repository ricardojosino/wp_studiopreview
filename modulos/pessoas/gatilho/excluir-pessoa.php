<?php

     $excluir = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $excluir->Set_Conectar();
     $excluir->Set_Start('POST', 'id_pessoa');
     $excluir->Set_ChavePrimaria('id_pessoa', $_POST['id_pessoa']);
     $excluir->Set_NomeDaTabela('spw_pessoas');
     $excluir->Set_AdicionarCampo(true, 'lixeira', 'string', 'value', 'Y');
     $excluir->Set_Mensagem('Pessoa deletada com sucesso!');
     $excluir->Executar();
     
     \Spw\Componentes\Modulo\IncluirArquivo::Pagina('pessoas', 'listar-pessoas');