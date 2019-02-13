<?php

     namespace Spw\Componentes\Ajax;
     
     class AjaxPost
     {
          
          
          // 01
          protected $botao_id;
          protected $modal_legenda_exibir = 'Y';
          protected $modal_legenda_texto_preload = "Salvando...";
          protected $modal_legenda_texto_sucesso = "Salvo com sucesso!";
          
          protected $preload_exibir = "Y";
          protected $painel_mensagem_exibir = "N";
          protected $painel_mensagem_id;
          protected $painel_mensagem_data;
          
          protected $parametros;
          
          protected $callback_exibir = 'N';
          protected $callback_id;
          protected $callback_parametros;
          protected $callback_modal_fechar = 'N';
          protected $callback_modal_id;
          
          protected $view;
          public $render;
          
          
          
          // 02
          protected function Script()
          {
               $procura = array(
                    '{modal_legenda_exibir}',
                    '{modal_legenda_texto_preload}', 
                    '{modal_legenda_texto_sucesso}',
                    '{preload_exibir}',
                    '{painel_mensagem_exibir}',
                    '{painel_mensagem_id}',
                    '{painel_mensagem_data}',
                    '{data}',
                    '{callback_exibir}',
                    '{callback_id}',
                    '{callback_data}',
                    '{callback_modal_fechar}',
                    '{callback_modal_id}',
                    '{botao_id}'
                    
                    );
               
               $troca = array(
                    \Spw\Componentes\Ferramentas\Pacote::YouN($this->modal_legenda_exibir),
                    $this->modal_legenda_texto_preload, 
                    $this->modal_legenda_texto_sucesso,
                    \Spw\Componentes\Ferramentas\Pacote::YouN($this->preload_exibir),
                    \Spw\Componentes\Ferramentas\Pacote::YouN($this->painel_mensagem_exibir),
                    $this->painel_mensagem_id,
                    $this->Data($this->painel_mensagem_data),
                    $this->Data($this->parametros),
                    \Spw\Componentes\Ferramentas\Pacote::YouN($this->callback_exibir),
                    $this->callback_id,
                    $this->Data($this->callback_parametros),
                    \Spw\Componentes\Ferramentas\Pacote::YouN($this->callback_modal_fechar),
                    $this->callback_modal_id,
                    $this->botao_id
               );
               
               $script = file_get_contents(\Spw\Componentes\Path::PathJs('Ajax', 'Post'));
               $script = str_replace( $procura, $troca, $script);
               
               $this->view[] = \Spw\Componentes\Html\Funcoes::Tag('script', null, $script);
          }
          
          
          protected function Data($parametros)
          {
               if (!empty($parametros)) :
                    
                    return '{' . join(',', $parametros) . '}';
               
                         else :
                              return '{}';
                    
               endif;
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          // 03
          public function Set_Botao_Id($value)
          {
               $this->botao_id = $value;
          }
          
          public function Set_Modal_Legenda_Exibir($value)
          {
               $this->modal_legenda_exibir = $value;
          }
          
          
          public function Set_Modal_Legenda_TextoPreload($value)
          {
               $this->modal_legenda_texto_preload = $value;
          }
          
          
          public function Set_Modal_Legenda_TextoSucesso($value)
          {
               $this->modal_legenda_texto_sucesso = $value;
          }
          
          
          public function Set_Preload_Exibir($value)
          {
               $this->preload_exibir = $value;
          }
          
          
          public function Set_PainelMensagem_Exibir($value)
          {
               $this->painel_mensagem_exibir = $value;
          }
          
          
          public function Set_PainelMensagem_CallbackId($value)
          {
               $this->painel_mensagem_id = $value;
          }
          
          
          public function Set_PainelMensagem_Action($value)
          {
               $this->painel_mensagem_data[] = 'action:' . '"'. $value . '"';
          }
          
          
          public function Set_PainelMensagem_Page($value)
          {
               $this->painel_mensagem_data[] = 'page:' . '"'. $value . '"';
          }
          
          
          public function Set_AdicionarParametro($key, $value)
          {
               $this->parametros[] = $key . ':' . '"'. $value . '"';
          }
          
          
          public function Set_AdicionarParametro_Action($value)
          {
               $this->parametros[] = 'action:' . '"'. $value . '"';
          }
          
          
          public function Set_AdicionarParametro_Page($value)
          {
               $this->parametros[] = 'page:' . '"'. $value . '"';
          }
          
          
          public function Set_AdicionarInput($id)
          {
               $this->parametros[] = $id . ':' . 'jQuery("#' . $id . '").val()';
          }
          
          
          public function Set_Callback_Exibir($value)
          {
               $this->callback_exibir = $value;
          }
          
          
          public function Set_Callback_Id($value)
          {
               $this->callback_id = $value;
          }
          
          
          public function Set_Callback_Parametros_Action($value)
          {
               $this->callback_parametros[] = 'action:' . '"'. $value . '"';
          }
          
          
          public function Set_Callback_Parametros_Page($value)
          {
               $this->callback_parametros[] = 'page:' . '"'. $value . '"';
          }
          
          
          public function Set_Callback_Parametros($key, $value)
          {
               $this->callback_parametros[] = $key . ':' . '"'. $value . '"';
          }
          
          
          public function Set_Callback_Modal_Fechar($value)
          {
               $this->callback_modal_fechar = $value;
          }
          
          
          public function Set_Callback_Modal_Id($value)
          {
               $this->callback_modal_id = $value;
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