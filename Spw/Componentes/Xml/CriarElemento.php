<?php

     namespace Spw\Componentes\Xml;
     
     class CriarElemento
     {
          
          
          // 01
          protected $xml_version = '1.0';
          protected $xml_encoding = 'UTF-8';
          protected $elemento;
          protected $view;
          public $render;
          
          
          // 02
          public function Set_Cabecalho_Version($value)
          {
               $this->xml_version = $value;
          }
          
          
          public function Set_Cabecalho_Encoding($value)
          {
               $this->xml_encoding = $value;
          }
          
          
          public function Set_Elementos($componente)
          {
               if ( !empty($componente)) :
                    
                    if ( is_array($componente) ) :
                         
                         $this->elemento[] = join('', $componente);
                    
                              else :
                                   $this->elemento[] = $componente;
                    endif;
                    
               endif;
          }
          
          
          
          // 03
          
                
          protected function Elemento()
          {
               if (!empty($this->elemento)) :
                    
                         $this->view[] = '<?xml version="' . $this->xml_version . '" encoding="' . $this->xml_encoding . '"?>';
               
                    foreach($this->elemento AS $item) :
                         $this->view[] = $item;
                    endforeach;
                    
               endif;
          }
          
          protected function Header()
          {
               header ("Content-Type:text/xml");
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          // 04
          public function Executar()
          {
               $this->Header();
               $this->Elemento();
               $this->Render();
          }
          
          
          
     }