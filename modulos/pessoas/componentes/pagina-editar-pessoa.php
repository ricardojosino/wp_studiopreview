<?php

     namespace Pessoas\Componentes;
     
     class PaginaEditarPessoa
     {
          //01
          protected $rows_pessoas;
          protected $id_pessoa;
          protected $view;
          protected $render;
          
          //02
          protected function Dados()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('value', 1);
               $dados->Set_AdicionarQuery("select *");
               $dados->Set_AdicionarQuery("from spw_pessoas p");
               $dados->Set_AdicionarQuery("where p.id_pessoa = '$this->id_pessoa'");
               $dados->Set_AdicionarQuery('limit 1');
               $dados->Executar();
               
               $this->rows_pessoas = $dados->rows;
          }
          
          protected function PainelBotoes()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $painel->Set_AdicionarBotao($this->BotaoExcluir());
               $painel->Set_AdicionarBotao($this->BotaoSalvar());
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function BotaoSalvar()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Salvar('bot-salvar', 'Salvar', '#', null);
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function BotaoExcluir()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Excluir('bot-excluir', 'Excluir', '#', \Spw\Componentes\Ajax\Link::Dialogo('bot-excluir', 'pagina_confirmar_deletar_pessoa', array('id_pessoa' => $this->id_pessoa) ) );
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function Campo_Tipo()
          {
               $campo_tipo = new \Spw\Componentes\Html\Form_Select();
               $campo_tipo->Set_Exibir(true);
               $campo_tipo->Set_Id('id_tipo');
               $campo_tipo->Set_Name('id_tipo');
               $campo_tipo->Set_Required(true);
               $campo_tipo->Set_Label('Tipo');
               $campo_tipo->Set_ValueDefault($this->rows_pessoas['id_tipo']);
               $campo_tipo->Set_AddOption(1, 'Pessoa Física');
               $campo_tipo->Set_AddOption(2, 'Pessoa Jurídica');
               $campo_tipo->Executar();
               
               return $campo_tipo->render;
     
          }
          
          
          protected function Campo_Nome()
          {
               $campo_nome = new \Spw\Componentes\Html\Form_InputText();
               $campo_nome->Set_Exibir(true);
               $campo_nome->Set_Id('nome_completo');
               $campo_nome->Set_Name('nome_completo');
               $campo_nome->Set_Label('Nome Completo');
               $campo_nome->Set_Value($this->rows_pessoas['nome_completo']);
               $campo_nome->Executar();
               
               return $campo_nome->render;
     
          }
          
          
          protected function Campo_TelefonePrincipal()
          {
               $campo_telefone_principal = new \Spw\Componentes\Html\Form_InputText();
               $campo_telefone_principal->Set_Exibir(true);
               $campo_telefone_principal->Set_Id('telefone_principal');
               $campo_telefone_principal->Set_Name('telefone_principal');
               $campo_telefone_principal->Set_Label('Telefone Principal');
               $campo_telefone_principal->Set_Value($this->rows_pessoas['telefone_principal']);
               $campo_telefone_principal->Executar();
               
               return $campo_telefone_principal->render;
     
          }
          
          
          protected function Campo_TelefoneAlternativo()
          {
               $campo_telefone_alternativo = new \Spw\Componentes\Html\Form_InputText();
               $campo_telefone_alternativo->Set_Exibir(true);
               $campo_telefone_alternativo->Set_Id('telefone_alternativo');
               $campo_telefone_alternativo->Set_Name('telefone_alternativo');
               $campo_telefone_alternativo->Set_Label('Telefone Alternativo');
               $campo_telefone_alternativo->Set_Value($this->rows_pessoas['telefone_alternativo']);
               $campo_telefone_alternativo->Executar();
               
               return $campo_telefone_alternativo->render;
     
          }
          
          
          protected function Campo_EmailPrincipal()
          {
               $campo_email_principal = new \Spw\Componentes\Html\Form_InputText();
               $campo_email_principal->Set_Exibir(true);
               $campo_email_principal->Set_Id('email_principal');
               $campo_email_principal->Set_Name('email_principal');
               $campo_email_principal->Set_Label('E-mail Principal');
               $campo_email_principal->Set_Value($this->rows_pessoas['email_principal']);
               $campo_email_principal->Executar();
               
               return $campo_email_principal->render;
     
          }
          
          
          protected function Campo_EmailAlternativo()
          {
               $campo_email_alternativo = new \Spw\Componentes\Html\Form_InputText();
               $campo_email_alternativo->Set_Exibir(true);
               $campo_email_alternativo->Set_Id('email_alternativo');
               $campo_email_alternativo->Set_Name('email_alternativo');
               $campo_email_alternativo->Set_Label('E-mail Alternativo');
               $campo_email_alternativo->Set_Value($this->rows_pessoas['email_alternativo']);
               $campo_email_alternativo->Executar();
               
               return $campo_email_alternativo->render;
     
          }
          
          
          protected function Campo_Logradouro()
          {
               $campo_logradouro = new \Spw\Componentes\Html\Form_InputText();
               $campo_logradouro->Set_Exibir(true);
               $campo_logradouro->Set_Id('endereco');
               $campo_logradouro->Set_Name('endereco');
               $campo_logradouro->Set_Label('Endereço');
               $campo_logradouro->Set_Value($this->rows_pessoas['endereco']);
               $campo_logradouro->Executar();
               
               return $campo_logradouro->render;
     
          }
          
          
          protected function Campo_Numero()
          {
               $campo_numero = new \Spw\Componentes\Html\Form_InputText();
               $campo_numero->Set_Exibir(true);
               $campo_numero->Set_Id('numero');
               $campo_numero->Set_Name('numero');
               $campo_numero->Set_Label('Número');
               $campo_numero->Set_Value($this->rows_pessoas['numero']);
               $campo_numero->Executar();
               
               return $campo_numero->render;
     
          }
          
          
          protected function Campo_Complemento()
          {
               $campo_complemento = new \Spw\Componentes\Html\Form_InputText();
               $campo_complemento->Set_Exibir(true);
               $campo_complemento->Set_Id('complemento');
               $campo_complemento->Set_Name('complemento');
               $campo_complemento->Set_Label('Complemento');
               $campo_complemento->Set_Value($this->rows_pessoas['complemento']);
               $campo_complemento->Executar();
               
               return $campo_complemento->render;
     
          }
          
          
          protected function Campo_Bairro()
          {
               $campo_bairro = new \Spw\Componentes\Html\Form_InputText();
               $campo_bairro->Set_Exibir(true);
               $campo_bairro->Set_Id('bairro');
               $campo_bairro->Set_Name('bairro');
               $campo_bairro->Set_Label('Bairro');
               $campo_bairro->Set_Value($this->rows_pessoas['bairro']);
               $campo_bairro->Executar();
     
               return $campo_bairro->render;
          }
          
          
          protected function Campo_Cidade()
          {
               $campo_cidade = new \Spw\Componentes\Html\Form_InputText();
               $campo_cidade->Set_Exibir(true);
               $campo_cidade->Set_Id('cidade');
               $campo_cidade->Set_Name('cidade');
               $campo_cidade->Set_Label('Cidade');
               $campo_cidade->Set_Value($this->rows_pessoas['cidade']);
               $campo_cidade->Executar();
     
               return $campo_cidade->render;
          }
          
          
          protected function Campo_Estado()
          {
               $campo_estado = new \Spw\Componentes\Html\Form_InputText();
               $campo_estado->Set_Exibir(true);
               $campo_estado->Set_Id('estado');
               $campo_estado->Set_Name('estado');
               $campo_estado->Set_Label('Estado');
               $campo_estado->Set_MaxLength(2);
               $campo_estado->Set_Value($this->rows_pessoas['estado']);
               $campo_estado->Executar();
     
               return $campo_estado->render;
          }
          
          
          protected function Campo_Pais()
          {
               $campo_pais = new \Spw\Componentes\Html\Form_InputText();
               $campo_pais->Set_Exibir(true);
               $campo_pais->Set_Id('pais');
               $campo_pais->Set_Name('pais');
               $campo_pais->Set_Label('País');
               $campo_pais->Set_Value($this->rows_pessoas['pais']);
               $campo_pais->Executar();

               return $campo_pais->render;
          }
          
          
          protected function Campo_Detalhes()
          {
               $campo_detalhes = new \Spw\Componentes\Html\Form_Textarea();
               $campo_detalhes->Set_Exibir(true);
               $campo_detalhes->Set_Id('detalhes');
               $campo_detalhes->Set_Name('detalhes');
               $campo_detalhes->Set_Rows(7);
               $campo_detalhes->Set_Value(null);
               $campo_detalhes->Executar();
               
               return $campo_detalhes->render;
     
          }
          
          
          protected function GridTelefone()
          {
               $grid = new \Spw\Componentes\UI\Admin\Grid();
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px'), $this->Campo_TelefonePrincipal(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%'), $this->Campo_TelefoneAlternativo(), null);;
               $grid->Executar();
               
               return $grid->render;
          }
          
          
          
          protected function GridEmail()
          {
               $grid = new \Spw\Componentes\UI\Admin\Grid();
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px'), $this->Campo_EmailPrincipal(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%'), $this->Campo_EmailAlternativo(), null);;
               $grid->Executar();
               
               return $grid->render;
          }
          
          
          protected function GridEndereco()
          {
               $grid = new \Spw\Componentes\UI\Admin\Grid();
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '70%', 'margin-right' => '10px'), $this->Campo_Logradouro(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '30%'), $this->Campo_Numero(), null);;
               $grid->Executar();
               
               return $grid->render;
          }
          
          
          protected function GridComplemento()
          {
               $grid = new \Spw\Componentes\UI\Admin\Grid();
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%', 'margin-right' => '10px'), $this->Campo_Complemento(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '50%'), $this->Campo_Bairro(), null);;
               $grid->Executar();
               
               return $grid->render;
          }
          
          
          protected function GridCidade()
          {
               $grid = new \Spw\Componentes\UI\Admin\Grid();
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '33%', 'margin-right' => '10px'), $this->Campo_Cidade(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '33%', 'margin-right' => '10px'), $this->Campo_Estado(), null);;
               $grid->Set_AdicionarColuna(null, null, array( 'width' => '33%'), $this->Campo_Pais(), null);;
               $grid->Executar();
               
               return $grid->render;
          }
          
          
          protected function PainelMensagem()
          {
               $painel = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $painel->Executar();
               
               return $painel->render;
          }
          
          
          protected function Conteudo()
          {
               $bloco = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $bloco->Set_Wrap(false);
               $bloco->Set_AdicionarConteudo('painel-mensagem', $this->PainelMensagem(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->Campo_Tipo(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->Campo_Nome(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->GridTelefone(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->GridEmail(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->GridEndereco(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->GridComplemento(), 0, 0);
               $bloco->Set_AdicionarConteudo(null, $this->GridCidade(), 0, 0);
               $bloco->Set_AdicionarScript( $this->AjaxAtualizar() );
               $bloco->Executar();
               
               return $bloco->render;
          }
          
          
          protected function AjaxAtualizar()
          {
               $ajax = new \Spw\Componentes\Ajax\AjaxPost();
               $ajax->Set_AdicionarInput('id_tipo');
               $ajax->Set_AdicionarInput('nome_completo');
               $ajax->Set_AdicionarInput('telefone_principal');
               $ajax->Set_AdicionarInput('telefone_alternativo');
               $ajax->Set_AdicionarInput('email_principal');
               $ajax->Set_AdicionarInput('email_alternativo');
               $ajax->Set_AdicionarInput('endereco');
               $ajax->Set_AdicionarInput('numero');
               $ajax->Set_AdicionarInput('complemento');
               $ajax->Set_AdicionarInput('bairro');
               $ajax->Set_AdicionarInput('cidade');
               $ajax->Set_AdicionarInput('estado');
               $ajax->Set_AdicionarInput('pais');
               $ajax->Set_AdicionarInput('detalhes');
               $ajax->Set_AdicionarParametro_Page('spw-pessoas');
               $ajax->Set_AdicionarParametro_Action('gatilho_atualizar_pessoa');
               $ajax->Set_AdicionarParametro('id_pessoa', $this->id_pessoa);
               $ajax->Set_Botao_Id('bot-salvar');
               $ajax->Set_Modal_Legenda_Exibir(true);
               $ajax->Set_Callback_Exibir(false);
               //$ajax->Set_Callback_Id('');
               //$ajax->Set_Callback_Modal_Fechar(false);
               //$ajax->Set_Callback_Modal_Id('modal-editar-pessoa');
               $ajax->Set_PainelMensagem_Exibir(true);
               $ajax->Set_PainelMensagem_Page('spw-pessoas');
               $ajax->Set_PainelMensagem_CallbackId('painel-mensagem');
               $ajax->Set_PainelMensagem_Action('bloco_exibir_mensagem');
               $ajax->Executar();
               
               return $ajax->Get_Render();
          }
          
          
          protected function Modal()
          {
               $modal = new \Spw\Componentes\UI\Admin\Modal();
               $modal->Set_Titulo('Editar Pessoa');
               $modal->Set_Id('modal-editar-pessoa');
               $modal->Set_AdicionarConteudo( $this->Conteudo() );
               $modal->Set_Callback_Exibir(true);
               $modal->Set_Callback_Id('pagina');
               $modal->Set_Callback_Page('spw-pessoas');
               $modal->Set_Callback_Action('pagina_listar_pessoas');
               $modal->Set_Rodape_Exibir(true);
               $modal->Set_Rodape_AdicionarBotoes($this->PainelBotoes());
               $modal->Executar();
               
               $this->view[] = $modal->render;
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          
          //03
          public function Set_IdPessoa($value)
          {
               $this->id_pessoa = $value;
          }
          
          
          public function Get_Render()
          {
               return $this->render;
          }
          
          public function Executar()
          {
               $this->Dados();
               $this->Modal();
               $this->Render();
          }
          
     }