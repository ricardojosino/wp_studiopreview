<?php

    namespace Spw\Componentes\Modulo;
    
    
    class Executar
    {
         
         
         static function Gatilho($modulo, $nome)
         {
              require_once WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/gatilho/' . $nome . '.php';
         }
         
         
         
    }