<?php

     namespace Spw\Componentes\UI\Admin;
     
     class Dialogo
     
     {
          
          
          //01
          protected $titulo;
          protected $modal_id;
          protected $modal_conteudo;
          protected $modal_pagina;
          protected $modal_bloco;
          protected $callback_exibir;
          protected $callback_page;
          protected $callback_action;
          protected $callback_parametros;
          protected $callback_id;
          protected $view;
          public $render;
          
          
          
          //02
          public function Set_Id($value)
          {
               $this->modal_id = $value;
          }
          
          
          public function Set_Titulo($value)
          {
               $this->titulo = $value;
          }
          
          
          public function Set_AdicionarConteudo($value)
          {
               $this->modal_conteudo[] = $value;
          }
          
          
          public function Set_AdicionarPagina($modulo, $nome)
          {
               if (!empty($modulo) and !empty($nome)) :
                    $this->modal_pagina[] = array('modulo' => $modulo, 'pagina' => $nome);
               endif;
          }
          
          
          public function Set_AdicionarBloco($modulo, $nome)
          {
               if (!empty($modulo) AND !empty($nome)) :
                    $this->modal_bloco[] = array('modulo' => $modulo, 'nome' => $nome);
               endif;
          }
          
          
          public function Set_Callback_Exibir($value)
          {
               $this->callback_exibir = $value;
          }
          
          
          public function Set_Callback_Page($value)
          {
               $this->callback_page = $value;
          }
          
          
          public function Set_Callback_Action($value)
          {
               $this->callback_action = $value;
          }
          
          
          public function Set_Callback_Parametros($array)
          {
               $this->callback_parametros = $array;
          }
          
          
          public function Set_Callback_Id($id)
          {
               $this->callback_id = $id;
          }
          
          
          //03
          
          protected function Script()
          {
               $procura = array( '{modal_id}' );
               $troca = array( $this->modal_id );
               
               $conteudo = file_get_contents( \Spw\Componentes\Path::PathJs('UI/Admin', 'Dialogo') );
               $conteudo = str_replace($procura, $troca, $conteudo);
               
               return \Spw\Componentes\Html\Funcoes::Tag('script', null, $conteudo);
          }
          
          
          protected function Load($ativar, $page, $action, $parametros_array, $botao_id, $callback_id)
          {
               if ($ativar) :
               
                    $load = new \Spw\Componentes\Ajax\Load();
                    $load->Set_Page($page);
                    $load->Set_Action($action);
                    $load->Set_AddParametros($parametros_array);
                    $load->Set_Botao_Id($botao_id);
                    $load->Set_Callback_Id($callback_id);
                    $load->Executar();

                    return $load->render;
               
               endif;
          }
          
          
          protected function BotaoFechar()
          {
               return '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => 'botao_fechar_dialogo_' . $this->modal_id) ) . ' class="spw-botao-fechar"><a href="#"><span class="dashicons dashicons-no"></span></a></div>' . $this->Load($this->callback_exibir, $this->callback_page, $this->callback_action, $this->callback_parametros, 'botao_fechar_dialogo_' . $this->modal_id, $this->callback_id);
          }
          
          
          protected function Background()
          {
               return '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => 'background_dialogo_' . $this->modal_id) ) . ' class="spw-background"></div>' . $this->Load($this->callback_exibir, $this->callback_page, $this->callback_action, $this->callback_parametros, 'background_dialogo_' . $this->modal_id, $this->callback_id);
          }
          
          
          protected function Conteudo()
          {
               if (!empty($this->modal_conteudo)) :
                    
                    return join('', $this->modal_conteudo);
               
                    elseif( !empty($this->modal_pagina) ) :
                         
                         ob_start();
                         foreach($this->modal_pagina AS $pagina) :
                              \Spw\Componentes\Modulo\IncluirArquivo::Pagina($pagina['modulo'], $pagina['pagina']);
                         endforeach;
                         return ob_get_clean();
                         
                         elseif( !empty($this->modal_bloco) ) :
                              
                         ob_start();
                         foreach($this->modal_bloco AS $bloco) :
                              \Spw\Componentes\Modulo\IncluirArquivo::Bloco($bloco['modulo'], $bloco['nome']);
                         endforeach;
                         return ob_get_clean();     
                    
               endif;
          }
          
          
          protected function Titulo()
          {
               return \Spw\Componentes\Html\Funcoes::Tag('h1', array('spw-titulo'), $this->titulo);
          }
          
          
          protected function Modal()
          {
               $this->view[] = '<div ' . \Spw\Componentes\Html\Funcoes::Atributos( array('id' => $this->modal_id ) ) . ' class="spw-dialogo">';
               $this->view[] = $this->Background();
               $this->view[] = $this->BotaoFechar();
               $this->view[] = '<div class="spw-janela">';
               $this->view[] = '<div class="spw-conteudo" >';
               $this->view[] = $this->Titulo();
               $this->view[] = $this->Conteudo();
               $this->view[] = '</div>';
               $this->view[] = '</div>';
               $this->view[] = '</div>';
               $this->view[] = $this->Script();
               
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //04
          
          public function Executar()
          {
               $this->Modal();
               $this->Render();
          }
          
          
          
     }