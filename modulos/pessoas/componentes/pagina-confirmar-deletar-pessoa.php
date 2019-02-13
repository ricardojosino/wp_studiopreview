<?php

     namespace Pessoas\Componentes;
     
     class PaginaConfirmarDeletarPessoa
     {
          //01
          protected $id_pessoa;
          protected $view;
          protected $render;
          
          //02
          protected function Dialogo()
          {
               $dialogo = new \Spw\Componentes\UI\Admin\Dialogo();
               $dialogo->Set_Titulo('Excluir');
               $dialogo->Set_Id('dialogo-excluir-pessoa');
               $dialogo->Set_AdicionarConteudo($this->BotaoDeConfirmacao());
               $dialogo->Set_Callback_Exibir(false);
               $dialogo->Executar();
               
               $this->view[] = $dialogo->render;
          }
          
          protected function BotaoDeConfirmacao()
          {
               $bot = new \Spw\Componentes\UI\Admin\BotaoDeConfirmacao();
               $bot->Set_Texto('Deseja mesmo deletar esta pessoa?');
               $bot->Set_BotaoConfirmar('bot-confirmar', 'Confirmar', '#', \Spw\Componentes\Ajax\Link::Pagina('bot-confirmar', 'gatilho_excluir_pessoa', array('id_pessoa' => $this->id_pessoa) ));
               $bot->Set_BotaoCancelar('bot-cancelar', 'Cancelar', '#', \Spw\Componentes\Ajax\Link::FecharDialogo('#bot-cancelar', '#dialogo-excluir-pessoa'));
               $bot->Executar();
               
               return $bot->Get_Render();
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
               $this->Dialogo();
               $this->Render();
          }
          
     }