<?php
     
     namespace Spw\Componentes\Html;

     class Form
     
     {
          
     // ATRIBUTOS
          
          
          private $accept_charset;
          private $action;
          private $autocomplete;
          private $enctype;
          private $method;
          private $name;
          private $id;
          private $novalidate;
          private $target;
          private $classe;
          private $insert_html;
          private $tag_form;
          private $add_row;
          private $add_botoes;
          private $add_hidden;
          
          // SAIDA
          private $view;
          public $render;
          
          
     // METODOS DE CONFIGURACAO
          
          
          
          public function Set_AcceptCharset($value)
          
          {
               if (!empty($value)) :
                    $this->accept_charset = $value;
               endif;
          }
          
          
          
          public function Set_Action($value)
          
          {
               if (!empty($value)) :
                    $this->action = $value;
               endif;
          }
          
          
          
          public function Set_AutoComplete($value)
          
          {
               if (!empty($value)) :
                    $this->autocomplete = $value;
               endif;
          }
          
          
          
          public function Set_Enctype($value)
          
          {
               if (!empty($value)) :
                    $this->enctype = $value;
               endif;
          }
          
          
          
          public function Set_Method($value)
          
          {
               if (!empty($value)) :
                    $this->method = $value;
               endif;
          }
          
          
          
          public function Set_Name($value)
          
          {
               if (!empty($value)) :
                    $this->name = $value;
               endif;
          }
          
          
          
          public function Set_Id($value)
          
          {
               if (!empty($value)) :
                    $this->id = $value;
               endif;
          }
          
          
          
          public function Set_NoValidade()
          
          {
               $this->novalidate = true;
          }
          
          
          
          public function Set_Target($value)
          
          {
               if (!empty($value)) :
                    $this->target = $value;
               endif;
          }
          
          
          
          public function Set_ClasseCss($value)
          
          {
               if (!empty($value)) :
                    $this->classe = $value;
               endif;
          }
          
          
          
          public function Set_Row($value)
          
          {
               if (!empty($value)) :
                    $this->add_row[] = ' <li>' . $value . '</li>';
               endif;
          }
          
          
          
          public function Set_Botao($value)
          
          {
               if (!empty($value)) :
                    $this->add_botoes[] = '<li>' . $value . '</li>';
               endif;
          }
          
          
          
          public function Set_Hidden($value)
          
          {
               if (!empty($value)) :
                    $this->add_hidden[] = $value;
               endif;
          }
          
          
          
          public function Set_Html($value)
          
          {
               if (!empty($value)) :
                    $this->insert_html = $value;
               endif;
          }
          
          
          
          public function Set_ExibirTagForm($value)
          
          {
               (!empty($value)) ? $this->tag_form = $value : '';
          }
          
          
     
     // METODOS DE SUPORTE
          
          
          
          private function AcceptCharset()
          
          {
               if ( empty($this->accept_charset) ) :
                    
                    return NULL;
               
                         else :
                              
                              return ' accept-charset="' . $this->accept_charset . '" ';
                    
               endif;
          }
          
          
          
          private function Action()
          
          {
               if ( empty($this->action) ) :
                    
                    return ' action="" ';
               
                         else :
                              
                              return ' action="' . $this->action . '" ';
                    
               endif;
          }
          
          
          
          private function AutoComplete()
          
          {
               if ( empty($this->autocomplete) ) :
                    
                    return NULL;
               
                         else :
                              
                              return ' autocomplete="' . $this->autocomplete . '" ';
               endif;
          }
          
          
          
          private function Enctype()
          
          {
               if ( !empty($this->enctype) ) :
                    
                    return ' enctype="' . $this->enctype . '" ';
                    
               endif;
          }
          
          
          
          private function Method()
          
          {
               if ( empty($this->method) ) :
                    
                    return ' method="POST" ';
               
                         else :
                              
                              return ' method="' . $this->method . '" ';
                    
               endif;
          }
          
          
          
          private function Name()
          
          {
               if ( empty($this->name) ) :
                    
                    return ' name="form" ';
               
                         else :
                              
                              return ' name="' . $this->name . '"';
                    
               endif;
          }
          
          
          
          private function Id()
          
          {
               if ( empty($this->id) ) :
                    
                    return ' id="form" ';
               
                         else :
                              
                              return ' id="' . $this->id . '"';
                    
               endif;
          }
          
          
          
          private function NoValidate()
          
          {
               if ( $this->novalidate == true ) :
                    
                    return ' novalidate ';
               
                         else :
                              
                              return NULL ;
               endif;
          }
          
          
          
          private function Target()
          
          {
               if ( empty($this->target) ) :
                    
                    return ' target="_self" ';
               
                         else :
                              
                              return ' target="' . $this->target . '"';
                    
               endif;
          }
          
          
          
          private function Classe()
          
          {
               if ( empty($this->classe) ) :
                    
                    return 'formulario';
               
                         else :
                              
                              return $this->classe;
                    
               endif;
          }
          
          
          
          private function Rows()
          
          {
               if ( !empty($this->add_row) ) :
                    
                    return '<ul>' . implode('', $this->add_row) . '</ul>';
                    
               endif;
          }
          
          
          private function BlocoFlutuante()
          
          {
               if (!empty($this->add_botoes)) :
                    return '<div class="flutuante"><ul>' . implode('', $this->add_botoes) . '</ul></div>';
               endif;
          }
          
          
          
          private function InsertHtml()
          
          {
               if ( !empty($this->insert_html) ) :
                    return $this->insert_html;
               endif;
               
          }
          
          
          
          private function InputsHiddens()
          
          {
               if(!empty($this->add_hidden)) :
                    return implode(' ', $this->add_hidden);
               endif;
          }
          
          

     // METODOS DE EXECUCAO
          
          
          
          private function ModoTagForm()
          
          {
               if (empty($this->tag_form)) :
                    return 1;
               
                         else: 
                              return $this->tag_form;
               endif;
          }
          
          
          
          private function Form()
          
          {
               $this->view[] = '<div class="' . $this->Classe() . '"><form ' 
               . $this->AutoComplete()
               . $this->Action()
               . $this->Enctype()
               . $this->AcceptCharset()
               . $this->Method()
               . $this->Name()
               . $this->Id()
               . $this->NoValidate()
               . $this->Target()
               . '>';
               
               $this->view[] = $this->InputsHiddens();
               $this->view[] = $this->InsertHtml();
               $this->view[] = $this->Rows();
               $this->view[] = $this->BlocoFlutuante();
               
               $this->view[] = '</form></div>';
          }
          
          
          
          private function FormTagOff()
          
          {
               $this->view[] = $this->InputsHiddens();
               $this->view[] = $this->InsertHtml();
               $this->view[] = $this->Rows();
               $this->view[] = $this->BlocoFlutuante();
          }
          
          
          
          private function ExibirFormulario()
          
          {
               
               switch($this->ModoTagForm()) :
                    
                    case 1 :
                         $this->Form();
                         break;
                    
                    case 2 :
                         $this->FormTagOff();
                         break;
                    
                    default :
                         $this->Form();
                         break;
           
                    
               endswitch;
                
          }
          
          
          
          private function Render()
          
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
     
          
          
     // ALGORITIMO
          
          function Executar()
          
          {
               
               $this->ExibirFormulario();
               $this->Render();
               
          }
          
          
     }