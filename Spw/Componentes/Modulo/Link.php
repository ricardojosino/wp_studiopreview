<?php

    namespace Spw\Componentes\Modulo;
    
    class Link
    
    {
         
         static function AbrirPagina($modulo, $pagina, $parametros)
         {
              $array[] = 'page=' . $_REQUEST['page'];
              ( !empty($modulo) ) ? $array[] = 'modulo=' . $modulo : null;
              ( !empty($pagina) ) ? $array[] = 'pagina=' . $pagina :  null;
              
              if ( is_array($parametros) ) :
                   ( !empty($parametros) ) ? $array[] = join('&', $parametros) : null;
                   else :
                   ( !empty($parametros) ) ? $array[] = $parametros  : null;
                   
              endif;
              
              
              (!empty($array)) ? $parametros = join('&', $array) : null; 
              
              return \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros('admin.php', $parametros);
         }
         
         
         static function ExecutarGatilho($modulo, $gatilho, $parametros)
         {
              
               $array[] = 'page=' . $_REQUEST['page'];
              ( !empty($modulo)) ? $array[] = 'modulo=' . $modulo : null ;
              ( !empty($gatilho) ) ? $array[] = 'gatilho=' . $gatilho : null;
              ( !empty($parametros) ) ? $array[] = $parametros : null;
              
              ( !empty($array) ) ? $parametros = join('&', $array) : null;
              
              return \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros('admin.php', $parametros);
              
         }
         
         
    }
    