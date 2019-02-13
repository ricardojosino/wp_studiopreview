<?php

    namespace Spw\Componentes\Modulo;
    
    
    class Path
    {
         
         
         static function PathGatilho($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/gatilho/' . $nome . '.php';
         }
         
         
         static function PathCss($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/css/' . $nome . '.css';
         }
         
         
         static function PathDados($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/dados/' . $nome . '.sql';
         }
         
         
         static function PathImg($modulo, $arquivo)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/img/' . $arquivo;
         }
         
         
         static function PathJs($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/js/' . $nome . '.js';
         }
         
         
         static function PathPagina($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/pagina/' . $nome . '.php';
         }
         
         
         static function PathBloco($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/bloco/' . $nome . '.php';
         }
         
         
         static function PathComponente($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/componentes/' . $nome . '.php';
         }
         
         
         static function PathAjax($modulo, $nome)
         {
              return WP_CONTENT_DIR . '/plugins/studiopreview/modulos/' . $modulo . '/ajax/' . $nome . '.php';
         }
         
         
         static function UrlGatilho($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/gatilho/' . $nome . '.php';
         }
         
         
         static function UrlCss($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/css/' . $nome . '.css';
         }
         
         
         static function UrlDados($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/dados/' . $nome . '.sql';
         }
         
         
         static function UrlImg($modulo, $arquivo)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/img/' . $arquivo;
         }
         
         
         static function UrlJs($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/js/' . $nome . '.js';
         }
         
         
         static function UrlPagina($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/pagina/' . $nome . '.php';
         }
         
         
         static function UrlBloco($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/bloco/' . $nome . '.php';
         }
         
         
         static function UrlComponente($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/componentes/' . $nome . '.php';
         }
         
         
         static function UrlAjax($modulo, $nome)
         {
              return WP_CONTENT_URL . '/plugins/studiopreview/modulos/' . $modulo . '/ajax/' . $nome . '.php';
         }
         
         
    }