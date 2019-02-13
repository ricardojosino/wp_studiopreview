<?php

     namespace Spw\Componentes\UI\Admin;
     
     class BotaoDeConfirmacao
     {
          //01
          protected $texto;
          protected $botao_confirmar_id = 'bot-confirmar';
          protected $botao_confirmar_titulo = 'Confirmar';
          protected $botao_confirmar_link;
          protected $botao_confirmar_componente;
          protected $botao_cancelar_id = 'bot-cancelar';
          protected $botao_cancelar_titulo = 'Cancelar';
          protected $botao_cancelar_link;
          protected $botao_cancelar_componente;
          protected $view;
          protected $render;
          
          //02
          protected function Texto($value)
          {
               $this->texto = $value;
          }
          
          protected function BotaoConfirma()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Padrao($this->botao_confirmar_id, $this->botao_confirmar_titulo, $this->botao_confirmar_link, $this->botao_confirmar_componente);
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function BotaoCancelar()
          {
               $botao = new \Spw\Componentes\UI\Admin\Botao();
               $botao->Set_AdicionarBotao_Reset($this->botao_cancelar_id, $this->botao_cancelar_titulo, $this->botao_cancelar_link, $this->botao_cancelar_componente);
               $botao->Executar();
               
               return $botao->render;
          }
          
          
          protected function BlocoDeBotoes()
          {
               $bloco = new \Spw\Componentes\UI\Admin\Painel_Botoes();
               $bloco->Set_AdicionarBotao($this->BotaoConfirma());
               $bloco->Set_AdicionarBotao($this->BotaoCancelar());
               $bloco->Executar();
               
               return $bloco->render;
          }
          
          protected function Template()
          {
               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('p', null, $this->texto);
               $this->view[] = $this->BlocoDeBotoes();
          }
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //03
          public function Set_BotaoConfirmar( $id, $titulo, $link, $componente)
          {
               $this->botao_confirmar_id = $id;
               $this->botao_confirmar_titulo = $titulo;
               $this->botao_confirmar_link = $link;
               $this->botao_confirmar_componente = $componente;
          }
          
          
          public function Set_BotaoCancelar( $id, $titulo, $link, $componente)
          {
               $this->botao_cancelar_id = $id;
               $this->botao_cancelar_titulo = $titulo;
               $this->botao_cancelar_link = $link;
               $this->botao_cancelar_componente = $componente;
          }
          
          
          public function Set_Texto($value)
          {
               $this->texto = $value;
          }
          
          public function Get_Render()
          {
               return $this->render;
          }
          
          public function Executar()
          {
               $this->Template();
               $this->Render();
          }
          
     }