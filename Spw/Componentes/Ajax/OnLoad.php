<?php

     namespace Spw\Componentes\Ajax;
     
     class OnLoad
     {
          
          
          // 01
          protected $callback_id;
          protected $action;
          protected $page;
          protected $data;
          protected $view;
          public $render;
          
          //02
          
          public function Set_Callback_Id($value)
          {
               $this->callback_id = $value;
          }

          
          public function Set_Action($nome_da_funcao)
          {
               $this->action = $nome_da_funcao;
          }
          
          
          public function Set_Page($wp_page)
          {
               $this->page = $wp_page;
          }
          
          
          public function Set_AddParametros($array)
          {
               if (!empty($array)) :
                    
                    $this->data[] = $array;
                    
               endif;
          }
          
          //03
          
          protected function Action()
          {
               if (!empty($this->action)) :
                    $this->data[] = array('action' => $this->action);
               endif;
          }
          
          
          protected function Page()
          {
               if (!empty($this->page)) :
                    $this->data[] = array('page' => $this->page);
               endif;
          }
                   
          protected function Parametros()
          {
               
               if (!empty($this->data)) :
                    foreach($this->data AS $dados) :
                    
                         foreach($dados AS $key => $value) :
                              $array[] = $key . ':' . $this->Value($value);
                         endforeach;
               
                    
                    endforeach;
                    
                    if (!empty($array)) :
                         return join(',', $array);
                    endif;
                    
               endif;
               
          }
          
          
          protected function Value($value)
          {
               if (is_numeric($value)) :
                    return $value;
               
                         else :
                              return '"' . $value . '"';
                    
               endif;
          }
          
          
          protected function Data()
          {
               
               if (!empty($this->Parametros())) :
                    
                    $array[] = "{";
                    $array[] = $this->Parametros();
                    $array[] = "}";

                    return join('', $array);
               
               endif;
          }
          
          protected function Script()
          {
                    
               $procura = array( 'spw_callback_id', 'spw_data');
               $replace = array( '"' . $this->callback_id . '"', $this->Data() );

               $conteudo = file_get_contents( \Spw\Componentes\Path::PathJs('Ajax', 'OnLoad') );
               $conteudo = str_replace($procura, $replace, $conteudo);

               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('script', null, $conteudo);
                    
          }
          

          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          
          //04
          public function Executar()
          {
               
               $this->Action();
               $this->Page();
               $this->Script();
               $this->Render();

          }
          
     }