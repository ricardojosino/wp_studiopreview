<?php

     
     $campo_tipo = new \Spw\Componentes\Html\Form_Select();
     $campo_tipo->Set_Exibir(true);
     $campo_tipo->Set_Id('tipo');
     $campo_tipo->Set_Name('tipo');
     $campo_tipo->Set_Required(true);
     $campo_tipo->Set_Label('Tipo');
     $campo_tipo->Set_ValueDefault(1);
     $campo_tipo->Set_AddOption(1, 'Pessoa Física');
     $campo_tipo->Set_AddOption(2, 'Pessoa Jurídica');
     $campo_tipo->Executar();
     
    
     $campo_nome = new \Spw\Componentes\Html\Form_InputText();
     $campo_nome->Set_Exibir(true);
     $campo_nome->Set_Id('nome_completo');
     $campo_nome->Set_Name('nome_completo');
     $campo_nome->Set_Label('Nome Completo');
     $campo_nome->Set_Value(null);
     $campo_nome->Executar();
     
     $campo_telefone_principal = new \Spw\Componentes\Html\Form_InputText();
     $campo_telefone_principal->Set_Exibir(true);
     $campo_telefone_principal->Set_Id('telefone_principal');
     $campo_telefone_principal->Set_Name('telefone_principal');
     $campo_telefone_principal->Set_Label('Telefone Principal');
     $campo_telefone_principal->Set_Value(null);
     $campo_telefone_principal->Executar();
     
     $campo_telefone_alternativo = new \Spw\Componentes\Html\Form_InputText();
     $campo_telefone_alternativo->Set_Exibir(true);
     $campo_telefone_alternativo->Set_Id('telefone_alternativo');
     $campo_telefone_alternativo->Set_Name('telefone_alternativo');
     $campo_telefone_alternativo->Set_Label('Telefone Alternativo');
     $campo_telefone_alternativo->Set_Value(null);
     $campo_telefone_alternativo->Executar();
     
     $campo_email_principal = new \Spw\Componentes\Html\Form_InputText();
     $campo_email_principal->Set_Exibir(true);
     $campo_email_principal->Set_Id('email_principal');
     $campo_email_principal->Set_Name('email_principal');
     $campo_email_principal->Set_Label('E-mail Principal');
     $campo_email_principal->Set_Value(null);
     $campo_email_principal->Executar();
     
     $campo_email_alternativo = new \Spw\Componentes\Html\Form_InputText();
     $campo_email_alternativo->Set_Exibir(true);
     $campo_email_alternativo->Set_Id('email_alternativo');
     $campo_email_alternativo->Set_Name('email_alternativo');
     $campo_email_alternativo->Set_Label('E-mail Alternativo');
     $campo_email_alternativo->Set_Value(null);
     $campo_email_alternativo->Executar();
     
     $campo_logradouro = new \Spw\Componentes\Html\Form_InputText();
     $campo_logradouro->Set_Exibir(true);
     $campo_logradouro->Set_Id('logradouro');
     $campo_logradouro->Set_Name('logradouro');
     $campo_logradouro->Set_Label('Endereço');
     $campo_logradouro->Set_Value(null);
     $campo_logradouro->Executar();
     
     $campo_numero = new \Spw\Componentes\Html\Form_InputText();
     $campo_numero->Set_Exibir(true);
     $campo_numero->Set_Id('numero');
     $campo_numero->Set_Name('numero');
     $campo_numero->Set_Label('Número');
     $campo_numero->Set_Value(null);
     $campo_numero->Executar();
     
     $campo_complemento = new \Spw\Componentes\Html\Form_InputText();
     $campo_complemento->Set_Exibir(true);
     $campo_complemento->Set_Id('complemento');
     $campo_complemento->Set_Name('complemento');
     $campo_complemento->Set_Label('Complemento');
     $campo_complemento->Set_Value(null);
     $campo_complemento->Executar();
     
     $campo_bairro = new \Spw\Componentes\Html\Form_InputText();
     $campo_bairro->Set_Exibir(true);
     $campo_bairro->Set_Id('bairro');
     $campo_bairro->Set_Name('bairro');
     $campo_bairro->Set_Label('Bairro');
     $campo_bairro->Set_Value(null);
     $campo_bairro->Executar();
     
     $campo_cidade = new \Spw\Componentes\Html\Form_InputText();
     $campo_cidade->Set_Exibir(true);
     $campo_cidade->Set_Id('cidade');
     $campo_cidade->Set_Name('cidade');
     $campo_cidade->Set_Label('Cidade');
     $campo_cidade->Set_Value(null);
     $campo_cidade->Executar();
     
     $campo_estado = new \Spw\Componentes\Html\Form_InputText();
     $campo_estado->Set_Exibir(true);
     $campo_estado->Set_Id('estado');
     $campo_estado->Set_Name('estado');
     $campo_estado->Set_Label('Estado');
     $campo_estado->Set_MaxLength(2);
     $campo_estado->Set_Value(null);
     $campo_estado->Executar();
     
     $campo_pais = new \Spw\Componentes\Html\Form_InputText();
     $campo_pais->Set_Exibir(true);
     $campo_pais->Set_Id('pais');
     $campo_pais->Set_Name('pais');
     $campo_pais->Set_Label('País');
     $campo_pais->Set_Value(null);
     $campo_pais->Executar();
     
     $campo_detalhes = new \Spw\Componentes\Html\Form_Textarea();
     $campo_detalhes->Set_Exibir(true);
     $campo_detalhes->Set_Id('detalhes');
     $campo_detalhes->Set_Name('detalhes');
     $campo_detalhes->Set_Rows(7);
     $campo_detalhes->Set_Value(null);
     $campo_detalhes->Executar();
     
     // GRIDS
     $grid_telefone = new \Spw\Componentes\UI\Admin\Grid();
     $grid_telefone->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px' ), $campo_telefone_principal->render, null);
     $grid_telefone->Set_AdicionarColuna(null, null, array( 'width' => '50%' ), $campo_telefone_alternativo->render, null);
     $grid_telefone->Executar();
     
     $grid_email = new \Spw\Componentes\UI\Admin\Grid();
     $grid_email->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px' ), $campo_email_principal->render, null);
     $grid_email->Set_AdicionarColuna(null, null, array( 'width' => '50%' ), $campo_email_alternativo->render, null);
     $grid_email->Executar();
     
     $grid_endereco = new \Spw\Componentes\UI\Admin\Grid();
     $grid_endereco->Set_AdicionarColuna(null, null, array( 'width' => '70%', 'margin-right' => '10px' ), $campo_logradouro->render, null);
     $grid_endereco->Set_AdicionarColuna(null, null, array( 'width' => '30%' ), $campo_numero->render, null);
     $grid_endereco->Executar();
     
     $grid_complemento_bairro = new \Spw\Componentes\UI\Admin\Grid();
     $grid_complemento_bairro->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px' ), $campo_complemento->render, null);
     $grid_complemento_bairro->Set_AdicionarColuna(null, null, array( 'width' => '50%' ), $campo_bairro->render, null);
     $grid_complemento_bairro->Executar();
     
     $grid_cidade = new \Spw\Componentes\UI\Admin\Grid();
     $grid_cidade->Set_AdicionarColuna(null, null, array( 'width' => '33%', 'margin-right' => '10px' ), $campo_cidade->render, null);
     $grid_cidade->Set_AdicionarColuna(null, null, array( 'width' => '33%', 'margin-right' => '10px' ), $campo_estado->render, null);
     $grid_cidade->Set_AdicionarColuna(null, null, array( 'width' => '33%' ), $campo_pais->render, null);
     $grid_cidade->Executar();
     
     $painel_mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
     $painel_mensagem->Executar();
     
     $ajax_post = new \Spw\Componentes\Ajax\AjaxPost();
     $ajax_post->Set_Modal_Legenda_TextoPreload('Só 1 min....');
     $ajax_post->Set_Modal_Legenda_TextoSucesso('Tudo certo!');
     $ajax_post->Set_Preload_Exibir(false);
     $ajax_post->Set_PainelMensagem_Exibir(true);
     $ajax_post->Set_PainelMensagem_Action('bloco_exibir_mensagem');
     $ajax_post->Set_PainelMensagem_Page('spw-pessoas');
     $ajax_post->Set_PainelMensagem_CallbackId('modal-painel-mensagem');
     $ajax_post->Set_AdicionarParametro_Action('gatilho_inserir_pessoa');
     $ajax_post->Set_AdicionarParametro_Page('spw-pessoas');
     $ajax_post->Set_AdicionarInput('nome_completo');
     $ajax_post->Set_AdicionarInput('telefone_principal');
     $ajax_post->Set_Callback_Exibir(true);
     $ajax_post->Set_Callback_Id('bloco-painel-conteudo');
     $ajax_post->Set_Callback_Parametros_Page('spw-pessoas');
     $ajax_post->Set_Callback_Parametros_Action('bloco_painel_lista_contatos');
     $ajax_post->Set_Callback_Parametros('teste', 'DEU CERTO!');
     $ajax_post->Set_Callback_Modal_Fechar(true);
     $ajax_post->Set_Callback_Modal_Id('modal');
     $ajax_post->Executar();
     
     $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
     $container->Set_Wrap(false);
     $container->Set_AdicionarConteudo('modal-painel-mensagem', $painel_mensagem->render);
     $container->Set_AdicionarConteudo(null, $campo_tipo->render);
     $container->Set_AdicionarConteudo(null, $campo_nome->render);
     $container->Set_AdicionarConteudo(null, $grid_telefone->render);
     $container->Set_AdicionarConteudo(null, $grid_email->render);
     $container->Set_AdicionarConteudo(null, $grid_endereco->render);
     $container->Set_AdicionarConteudo(null, $grid_complemento_bairro->render);
     $container->Set_AdicionarConteudo(null, $grid_cidade->render);
     $container->Set_AdicionarBloco('painel_categorias', 'pessoas', 'form-pessoa---listar-categorias', '25px', null);
     $container->Executar();
     
     echo $container->render;
     echo $ajax_post->render;
     
