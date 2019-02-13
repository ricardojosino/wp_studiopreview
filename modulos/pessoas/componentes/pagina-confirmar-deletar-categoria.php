<?php

     namespace Pessoas\Componentes;
     
     class PaginaConfirmarDeletarCategoria
     {
          //01
          protected $id_categoria;
          protected $view;
          protected $render;
          
          //02
          protected function Confirmacao()
          {
               $bot = new \Spw\Componentes\UI\Admin\BotaoDeConfirmacao();
               $bot->Set_Texto('Deseja mesmo excluir esta categoria?');
               $bot->Set_BotaoConfirmar('bot-confirmar', 'Confirmar', null, \Spw\Componentes\Ajax\Link::Pagina('bot-confirmar', 'gatilho_excluir_categoria', array('id_categoria' => $this->id_categoria)));
               $bot->Set_BotaoCancelar('bot-cancelar', 'Cancelar', null, \Spw\Componentes\Ajax\Link::FecharDialogo('#bot-cancelar', '#dialogo-excluir-categoria'));
               $bot->Executar();
               
               return $bot->Get_Render();
          }
          
          
          
          protected function Pagina()
          {
               $dialogo = new \Spw\Componentes\UI\Admin\Dialogo();
               $dialogo->Set_Titulo('Excluir');
               $dialogo->Set_Id('dialogo-excluir-categoria');
               $dialogo->Set_AdicionarConteudo($this->Confirmacao());
               $dialogo->Set_Callback_Exibir(false);
               $dialogo->Set_Callback_Id('modal');
               $dialogo->Set_Callback_Page('spw-pessoas');
               $dialogo->Set_Callback_Action('pagina_editar_categoria');
               $dialogo->Set_Callback_Parametros(array('id_categoria' => $this->id_categoria));
               $dialogo->Executar();
               
               $this->view[] = $dialogo->render;
             
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          //03
          public function Set_IdCategoria($value)
          {
               $this->id_categoria = $value;
          }
          
          public function Get_Render()
          {
               return $this->render;
          }
          
          
          public function Executar()
          {
               $this->Pagina();
               $this->Render();
               
          }
          
          
     }