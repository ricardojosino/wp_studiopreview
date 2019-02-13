<?php

     namespace Spw\Componentes\Ajax;
     
     class FecharBloco
     {
          //01
          protected $botao_seletor;
          protected $bloco_seletor;
          protected $view;
          protected $render;
          
          //02
          protected function Script()
          {
               $procura = array('{botao_seletor}', '{bloco_seletor}');
               $troca = array($this->botao_seletor, $this->bloco_seletor);
               
               $conteudo = file_get_contents( \Spw\Componentes\Path::PathJs( 'Ajax' , 'FecharBloco') );
               $conteudo = str_replace( $procura , $troca, $conteudo);
               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('script', array('id' => 'script_teste'), $conteudo);
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          //03
          public function Set_Botao_Seletor($value)
          {
               $this->botao_seletor = $value;
          }
          
          
          public function Set_Bloco_Seletor($value)
          {
               $this->bloco_seletor = $value;
          }
          
          
          public function Get_Render()
          {
               return $this->render;
          }
          
          public function Executar()
          {
               $this->Script();
               $this->Render();
          }
          
          
     }