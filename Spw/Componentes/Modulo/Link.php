<?php

    namespace Spw\Componentes\Modulo;
    
    class Link
    
    {
         
         static function AbrirPagina($modulo, $pagina, $parametros)
         {
              $array[] = 'page=' . SPW_PLUGIN_NAME;
              ( !empty($modulo) ) ? $array[] = 'modulo=' . $modulo : null;
              ( !empty($pagina) ) ? $array[] = 'pagina=' . $pagina :  null;
              ( !empty($parametros) ) ? $array[] = $parametros  : null;
              
              (!empty($array)) ? $parametros = join('&', $array) : null; 
              
              return \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros('admin.php', $parametros);
         }
         
         
         static function ExecutarGatilho($modulo, $gatilho, $parametros)
         {
              
               $array[] = 'page=' . SPW_PLUGIN_NAME;
              ( !empty($modulo)) ? $array[] = 'modulo=' . $modulo : null ;
              ( !empty($gatilho) ) ? $array[] = 'gatilho=' . $gatilho : null;
              ( !empty($parametros) ) ? $array[] = $parametros : null;
              
              ( !empty($array) ) ? $parametros = join('&', $array) : null;
              
              return \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros('admin.php', $parametros);
              
         }
         
         
    }
    