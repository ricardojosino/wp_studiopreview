<?php

     namespace Spw\Componentes\Ajax;
     
     class Link
     {
          
          
          static function Pagina($click_bot_id, $action, $parametros)
          {
               $load = new \Spw\Componentes\Ajax\Load();
               $load->Set_Page($_GET['page']);
               $load->Set_Botao_Id($click_bot_id);
               $load->Set_Action($action);
               $load->Set_AddParametros($parametros);
               $load->Set_Callback_Id('pagina');
               $load->Executar();
               
               return $load->render;
               
          }
          
          
          static function Modal($click_bot_id, $action, $parametros)
          {
               $load = new \Spw\Componentes\Ajax\Load();
               $load->Set_Page($_GET['page']);
               $load->Set_Botao_Id($click_bot_id);
               $load->Set_Action($action);
               $load->Set_AddParametros($parametros);
               $load->Set_Callback_Id('modal');
               $load->Executar();
               
               return $load->render;
               
          }
          
          
          static function Dialogo($click_bot_id, $action, $parametros)
          {
               $load = new \Spw\Componentes\Ajax\Load();
               $load->Set_Page($_GET['page']);
               $load->Set_Botao_Id($click_bot_id);
               $load->Set_Action($action);
               $load->Set_AddParametros($parametros);
               $load->Set_Callback_Id('dialogo');
               $load->Executar();
               
               return $load->render;
               
          }
          
          
          static function FecharDialogo($botao_seletor, $bloco_seletor)
          {
               $fechar = new \Spw\Componentes\Ajax\FecharBloco();
               $fechar->Set_Botao_Seletor($botao_seletor);
               $fechar->Set_Bloco_Seletor($bloco_seletor);
               $fechar->Executar();
               
               return $fechar->Get_Render();
          }
          
          
          
          static function FecharModal($botao_seletor, $bloco_seletor)
          {
               $fechar = new \Spw\Componentes\Ajax\FecharBloco();
               $fechar->Set_Botao_Seletor($botao_seletor);
               $fechar->Set_Bloco_Seletor($bloco_seletor);
               $fechar->Executar();
               
               return $fechar->Get_Render();
          }
          
     }