<?php

    namespace Spw\Componentes\Biblioteca;
    
    
    class Patch
    {
         
         
         static function PathBiblioteca()
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/bibliotecas/';
         }
         
         
         static function PathMidia($file)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/bibliotecas/midias/' . $file;
         }
         
         
         static function UrlBiblioteca()
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/bibliotecas/';
         }
         
         
         static function UrlMidia($file)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/bibliotecas/midias/' . $file;
         }
         
         
           
    }