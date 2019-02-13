<?php

    
     namespace Spw\Componentes\Wp;
     
     class Shortcode_Exibir
     
     {
          
          static function Shortcode($nome)
          {
               if (!empty($nome)) :

                    ob_start();
                    echo do_shortcode($nome, false);
                    return ob_get_clean();

               endif;
          }
          
          
     }
     