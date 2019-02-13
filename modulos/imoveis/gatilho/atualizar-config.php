<?php

     $atualizar = new \Spw\Componentes\Dados\Salvar();
     $atualizar->Set_Metodo('POST');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_nome');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_email');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_site');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_logo');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_telefone');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_pais');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_estado');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_cidade');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_bairro');
     $atualizar->Set_AdicionarCampo('spw_imoveis_config_endereco');
     $atualizar->Executar();
     
     $salvar_mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
     $salvar_mensagem->Set_Mensagem('Salvo com sucesso!');
     $salvar_mensagem->Executar();
     
     $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
     $redirecionar->Set_RedirecionarParaPagina('imoveis-config', 'imoveis', 'config', null);
     $redirecionar->Executar();