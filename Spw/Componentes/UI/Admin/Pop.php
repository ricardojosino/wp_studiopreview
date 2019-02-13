<?php

     namespace Spw\Componentes\UI\Admin;
     
     class Pop
     {
          
          
          // 01
          
          protected $titulo;
          protected $conteudo;
          protected $pop_id;
          protected $botao_abrir_id;
          
          protected $view;
          public $render;
          
          
          // 02
          
          public function Set_Titulo($value)
          {
               $this->titulo = $value;
          }
          
          
          public function Set_AdicionarConteudo($value)
          {
               $this->conteudo[] = $value;
          }
          
          
          public function Set_Pop_Id($value)
          {
               $this->pop_id = $value;
          }
          
          
          public function Set_BotaoAbrir_Id($value)
          {
               $this->botao_abrir_id = $value;
          }
          
          
          
          // 03
          
          protected function Template()
          {
               $this->view[] = '<div class="spw-pop" ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => $this->pop_id) ) . ' >';
               $this->view[] = $this->Header();
               $this->view[] = '<div class="spw-pop-wrap">';
               $this->view[] = $this->Conteudo();
               $this->view[] = '</div>';
               $this->view[] = '</div>';
               $this->view[] = $this->Script();
          }
          
          
          protected function Header()
          {
               $array[] = '<div class="spw-pop-header">';
               $array[] = '<div class="spw-pop-header-left">' . $this->Titulo() . '</div>';
               $array[] = '<div class="spw-pop-header-right">' . $this->BotaoFechar() . '</div>';
               $array[] = '</div>';
               
               return join('', $array);
          }
          
          
          protected function Titulo()
          {
               if (!empty($this->titulo)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('h3', array( 'class' => 'spw-pop-titulo' ), $this->titulo);
               endif;
          }
          
          
          protected function Conteudo()
          {
               if (!empty($this->conteudo)) :
                    return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'class' => 'spw-pop-conteudo' ), join('', $this->conteudo));
               endif;
               
          }
          
          
          protected function Script()
          {
               
               $procura = array(
                    
                    '{pop_id}',
                    '{botao_abrir_id}'
                    
               );
               $troca = array(
                    
                    $this->pop_id,
                    $this->botao_abrir_id
                    
               );
               
               $script = file_get_contents( \Spw\Componentes\Path::PathJs('UI/Admin', 'Pop') );
               $script = str_replace($procura, $troca, $script);
               return \Spw\Componentes\Html\Funcoes::Tag('script', null, $script);
               
          }
          
          
          protected function BotaoFechar()
          {
               return '<i id="bot-fechar-' . $this->pop_id . '" class="fas fa-times spw-pop-botao-fechar"></i>';
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          // 04
          public function Executar()
          {
               $this->Template();
               $this->Render();
          }
          
          
          
          
     }