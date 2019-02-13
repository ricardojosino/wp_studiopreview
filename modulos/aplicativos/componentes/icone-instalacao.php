<?php

     namespace Aplicativos\Componentes;
     
     class IconeInstalacao
     {
          
          //01
          
          protected $id_aplicativo;
          protected $view;
          
          public $render;
          
          
          //02
          
          public function Set_IdAplicativo($value)
          {
               $this->id_aplicativo = $value;
          }
          
          //03
          
          protected function AjaxLoad($botao_id, $callback_id, $parametros)
          {
               $ajax = new \Spw\Componentes\Ajax\Load();
               $ajax->Set_Botao_Id($botao_id);
               $ajax->Set_Callback_Id($callback_id);
               $ajax->Set_Action('spw_modulos_aplicativos_botao_instalacao');
               $ajax->Set_AddParametros( $parametros );
               $ajax->Executar();
               
               return $ajax->render;
          }
          
          protected function CheckInstalado($id_aplicativo)
          {
               $dados = new \Spw\Componentes\Mysql\Selecionar();
               $dados->Set_Start('value', $id_aplicativo);
               $dados->Set_Conectar();
               $dados->Set_AdicionarQuery("SELECT i.id_instalacao");
               $dados->Set_AdicionarQuery("FROM spw_aplicativos_instalados i");
               $dados->Set_AdicionarQuery("WHERE i.id_aplicativo = '$id_aplicativo'");
               $dados->Set_AdicionarQuery("LIMIT 1");
               $dados->Executar();
               
               if (!empty($dados->rows)) :
                    return $dados->rows['id_instalacao'];
               
                         else :
                              return false;
                    
               endif;
          }
          
          
          protected function Icone()
          {
               $id_instalacao = $this->CheckInstalado($this->id_aplicativo);
               $id_aplicativo = $this->id_aplicativo;
               
               if ($id_instalacao) :
                    
                    $this->view[] = \Spw\Componentes\Icones\BibliotecaFontAwesome::ToggleOn('app_on_' . $id_aplicativo, null, null, null, $this->AjaxLoad('app_on_' . $id_aplicativo, 'icone_' . $id_aplicativo, array('id_instalacao' => $id_instalacao,'id_aplicativo' => $id_aplicativo, 'del' => 1, 'page' => $_REQUEST['page']) ));
               
                         else :
                              $this->view[] = \Spw\Componentes\Icones\BibliotecaFontAwesome::ToggleOff('app_off_' . $id_aplicativo, null, null, null, $this->AjaxLoad('app_off_' . $id_aplicativo, 'icone_' . $id_aplicativo, array('id_aplicativo' => $id_aplicativo, 'start' => 'Y', 'page' => $_REQUEST['page']) )) ;
                    
               endif;
          }
          
          
          protected function Render()
          {
               $this->render = \Spw\Componentes\Funcoes::Render($this->view);
          }
          
          
          //04
          public function Executar()
          {
               $this->Icone();
               $this->Render();
          }
          
          
          
     }