<?php

     namespace Spw\Componentes\Ajax;
     
     class Functions
     {
          
          
          static function Link($action_function, $botao_id, $callback_id, $parametros_array)
          {
               $load = new \Spw\Componentes\Ajax\Load();
               $load->Set_Page($_GET['page']);
               $load->Set_Action($action_function);
               $load->Set_Botao_Id($botao_id);
               $load->Set_Callback_Id($callback_id);
               $load->Set_AddParametros($parametros_array);
               $load->Executar();
               
               return $load->render;
          }
          
          
     }