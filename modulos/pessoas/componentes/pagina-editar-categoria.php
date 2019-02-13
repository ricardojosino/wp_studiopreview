<?php

     namespace Pessoas\Componentes;
     
     class BlocoEditarCategoria
     {
          
          //01
          protected $dados_categoria_rows;
          protected $id_categoria;
          protected $view;
          protected $render;
          
          
          //02
          protected function DadosCategorias()
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Conectar();
               $dados->Set_Start('VALUE', 1);
               $dados->Set_AdicionarQuery('SELECT * ');
               $dados->Set_AdicionarQuery('FROM spw_pessoas_categorias c');
               $dados->Set_AdicionarQuery("WHERE c.id_categoria = " . $this->id_categoria);
               $dados->Executar();
               
               $this->dados_categoria_rows = $dados->rows;
          }
          
          
          protected function PainelMensagens()
          {
               $mensagem = new \Spw\Componentes\UI\Admin\Painel_ExibirMensagens();
               $mensagem->Executar();
               
               return $mensagem->render;
          }
          
          
          protected function InputCategoria()
          {
               $input = new \Spw\Componentes\Html\Form_InputText();
               $input->Set_Exibir(true);
               $input->Set_Id('categoria');
               $input->Set_Name('categoria');
               $input->Set_Label('Categoria');
               $input->Set_Value( $this->dados_categoria_rows['categoria']);
               $input->Set_Require(true);
               $input->Executar();
               
               return $input->render;
          }
          
          
          protected function AjaxAtualizar()
          {
               $ajax = new \Spw\Componentes\Ajax\AjaxPost();
               $ajax->Set_Botao_Id('bot-salvar');
               $ajax->Set_AdicionarInput('categoria');
               $ajax->Set_AdicionarParametro_Page('spw-pessoas');
               $ajax->Set_AdicionarParametro_Action('gatilho_atualizar_categoria');
               $ajax->Set_AdicionarParametro('id_categoria', $this->id_categoria);
               $ajax->Set_Preload_Exibir(false);
               $ajax->Set_Modal_Legenda_Exibir(true);
               $ajax->Set_PainelMensagem_Exibir(false);
               $ajax->Set_PainelMensagem_Page('spw-pessoas');
               $ajax->Set_PainelMensagem_Action('bloco_exibir_mensagem');
               $ajax->Set_PainelMensagem_CallbackId('bloco-mensagem');
               $ajax->Set_Callback_Exibir(false);
               $ajax->Set_Callback_Id('bloco-formulario');
               $ajax->Set_Callback_Modal_Id('modal-cadastro-categoria');
               $ajax->Set_Callback_Modal_Fechar(false);
               $ajax->Set_Callback_Parametros_Page('spw-pessoas');
               $ajax->Set_Callback_Parametros_Action('pagina_lista_categorias');
               $ajax->Executar();
               
               return $ajax->Get_Render();
               
          }
          
          
          protected function Container()
          {
               $container = new \Spw\Componentes\UI\Admin\BlocoDeConteudo();
               $container->Set_Wrap(false);
               $container->Set_AdicionarConteudo('bloco-mensagem', $this->PainelMensagens(), 0, 0);
               $container->Set_AdicionarConteudo(null, $this->InputCategoria(), 0, 0);
               $container->Set_AdicionarScript($this->AjaxAtualizar());
               $container->Executar();
               
               return $container->render;
          }
          
          
          protected function BotaoSalvar($bot_id, $label, $componente)
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Salvar($bot_id, $label, '#', $componente);
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function BotaoExcluir($bot_id, $label, $componente)
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Excluir($bot_id, $label, '#', $componente);
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function Modal()
          {
               $modal = new \Spw\Componentes\UI\Admin\Modal();
               $modal->Set_Titulo('Cadastro de categoria');
               $modal->Set_Id('modal-cadastro-de-categoria');
               $modal->Set_AdicionarConteudo($this->Container());
               $modal->Set_Callback_Exibir(true);
               $modal->Set_Callback_Id('pagina');
               $modal->Set_Callback_Page('spw-pessoas');
               $modal->Set_Callback_Action('pagina_listar_categorias');
               $modal->Set_Callback_Parametros(null);
               $modal->Set_Rodape_Exibir(true);
               $modal->Set_Rodape_AdicionarBotoes($this->BotaoExcluir('bot-excluir', 'Excluir', \Spw\Componentes\Ajax\Link::Dialogo('bot-excluir', 'pagina_confirmar_deletar_categoria', array('id_categoria' => $this->id_categoria) ) ));
               $modal->Set_Rodape_AdicionarBotoes($this->BotaoSalvar('bot-salvar', 'Salvar', null));
               $modal->Executar();
               
               $this->view[] = $modal->render;
          }
          
          
          protected function Render()
          {
               
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //03
          public function Get_Render()
          {
               return $this->render;
          }
          
          
          public function Set_IdCategoria($value)
          {
               $this->id_categoria = $value;
          }
          
          public function Executar()
          {
               $this->DadosCategorias();
               $this->Modal();
               $this->Render();
          }
          
          
     }