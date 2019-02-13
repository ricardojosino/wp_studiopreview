<?php

    namespace Spw\Componentes;
    
    
    class Path
    {
         
         
         static function PathClasse($nome_componente, $nome_class)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/Spw/Componentes/' . $nome_componente . '/' . $nome_class . '.php';
         }
         
         
         static function PathJs($nome_componente, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/Spw/Componentes/' . $nome_componente . '/' . $nome . '.js';
         }
         
         static function UrlClasse($nome_componente, $nome_class)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/Spw/Componentes/' . $nome_componente . '/' . $nome_class . '.php';
         }
         
         
         static function UrlJs($nome_componente, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/Spw/Componentes/' . $nome_componente . '/' . $nome . '.js';
         }
         
         
         
    }