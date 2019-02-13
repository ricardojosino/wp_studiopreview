<?php

    namespace Spw\Componentes\Modulo;
    
    
    class IncluirArquivo
    {
         
         
         static function Gatilho($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/gatilho/' . $nome . '.php';
              
              if(file_exists($file)) :
                   
                   require_once $file;
                   
              endif;
              
         }
         
         
         static function Dados($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/dados/' . $nome . '.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
         static function Pagina($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/pagina/' . $nome . '.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
         static function Bloco($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/bloco/' . $nome . '.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
         static function Componente($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/componentes/' . $nome . '.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
         static function Ajax($modulo, $nome)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/ajax/' . $nome . '.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
         static function Index($modulo)
         {
              $file = WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo .'/index.php';
              
              if (file_exists($file)) :
                   require_once $file;
              endif;
              
         }
         
         
    }