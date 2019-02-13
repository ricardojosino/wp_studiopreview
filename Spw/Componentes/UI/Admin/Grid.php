<?php

     namespace Spw\Componentes\UI\Admin;
     
     
     class Grid
     {
          
          
          // 01
          protected $colunas;
          protected $largura;
          protected $centralizado;
          
          protected $view;
          public $render;
          
          
          
          // 02
          public function Set_AdicionarColuna($id, $class, $style_array, $conteudo, $componente)
          {
               if (!empty($conteudo)) :
                    $this->colunas[] = array('id' => $id, 'class' => $class, 'style' => $style_array, 'conteudo' => $conteudo, 'componente' => $componente);
               endif;
          }
          
          
          public function Set_Largura($value)
          {
               $this->largura = $value;
          }
          
          
          public function Set_Centralizado($value)
          {
               $this->centralizado = $value;
          }
          
          
          
          // 03
          
          protected function Colunas()
          {
               if (!empty($this->colunas)) :
                    
                    foreach($this->colunas AS $coluna) :
                    
                         $array[] = \Spw\Componentes\Html\Funcoes::Tag( 'div', array( 'id' => $coluna['id'], 'class' => 'spw-coluna ' . $coluna['class'], 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( $coluna['style'] ) ) , $coluna['conteudo'] . $coluna['componente'] );
                    
                    endforeach;
                    
                    if (!empty($array)) :
                         return join('', $array);
                    endif;
                    
               endif;
          }
          
          
          protected function MarginLeft()
          {
               if($this->centralizado) :
                    return 'auto';
               endif;
          }
          
          
          protected function MarginRight()
          {
               if (!empty($this->centralizado)) :
                    return 'auto';
               endif;
          }
          
          protected function Template()
          {
               
               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-grid', 'style' => \Spw\Componentes\Html\Funcoes::AtributosValor( array('max-width' => $this->largura, 'margin-left' => $this->MarginLeft(), 'margin-right' => $this->MarginRight() ) )), $this->Colunas());
               
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