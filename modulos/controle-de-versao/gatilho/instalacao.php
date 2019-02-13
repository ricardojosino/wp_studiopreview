<?php

     include 'modulos/aplicativos.php';
     include 'modulos/notificacao.php';
     include 'modulos/post-type.php';
     include 'modulos/taxonomy.php';
     include 'modulos/pessoas.php';
     
     
     $atualiza_versao_banco_dados = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $atualiza_versao_banco_dados->Set_Conectar();
     $atualiza_versao_banco_dados->Set_Start('VALUE', 1);
     $atualiza_versao_banco_dados->Set_NomeDaTabela('spw_controle_versao');
     $atualiza_versao_banco_dados->Set_ChavePrimaria('id_versao', 1);
     $atualiza_versao_banco_dados->Set_AdicionarCampo(true, 'versao', 'int', 'value', SPW_VERSAO);
     $atualiza_versao_banco_dados->Executar();
     
     // GRAVA MENSAGEM
     $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
     $mensagem->Set_Mensagem('Atualização realizada com sucesso!');
     $mensagem->Executar();
     
     // REDIRECIONA
     $redireciona = new \Spw\Componentes\Modulo\Redirecionar();
     $redireciona->Set_RedirecionarParaPagina('studiopreview', 'home', 'pagina-inicial', null);
     $redireciona->Executar();