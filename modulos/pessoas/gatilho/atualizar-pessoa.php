<?php

     $atualizar = new \Spw\Componentes\Mysql\AtualizarRegistro();
     $atualizar->Set_Conectar();
     $atualizar->Set_NomeDaTabela('spw_pessoas');
     $atualizar->Set_Start('POST', 'id_pessoa');
     $atualizar->Set_ChavePrimaria('id_pessoa', $_POST['id_pessoa']);
     $atualizar->Set_AdicionarCampo(true, 'lixeira', 'string', 'value', 'N');
     $atualizar->Set_AdicionarCampo(true, 'id_tipo', 'int', 'post', 'id_tipo');
     $atualizar->Set_AdicionarCampo(true, 'nome_completo', 'string', 'post', 'nome_completo');
     $atualizar->Set_AdicionarCampo(true, 'telefone_principal', 'string', 'post', 'telefone_principal');
     $atualizar->Set_AdicionarCampo(true, 'telefone_alternativo', 'string', 'post', 'telefone_alternativo');
     $atualizar->Set_AdicionarCampo(true, 'email_principal', 'string', 'post', 'email_principal');
     $atualizar->Set_AdicionarCampo(true, 'email_alternativo', 'string', 'post', 'email_alternativo');
     $atualizar->Set_AdicionarCampo(true, 'endereco', 'string', 'post', 'endereco');
     $atualizar->Set_AdicionarCampo(true, 'numero', 'string', 'post', 'numero');
     $atualizar->Set_AdicionarCampo(true, 'complemento', 'string', 'post', 'complemento');
     $atualizar->Set_AdicionarCampo(true, 'bairro', 'string', 'post', 'bairro');
     $atualizar->Set_AdicionarCampo(true, 'cidade', 'string', 'post', 'cidade');
     $atualizar->Set_AdicionarCampo(true, 'estado', 'string', 'post', 'estado');
     $atualizar->Set_AdicionarCampo(true, 'pais', 'string', 'post', 'pais');
     //$atualizar->Set_AdicionarCampo(true, 'detalhes', 'string', 'post', 'detalhes');
     $atualizar->Set_Mensagem('Contato salvo com sucesso!');
     $atualizar->Executar();