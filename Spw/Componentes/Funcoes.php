<?php

     namespace Spw\Componentes;
     
     class Funcoes
     
     {
          
          
          static function Render($view)
		{
			if (!empty($view)) :
				return join('', $view);
			endif;
		}
          
          
          static function Show($value)
		{
			if (!empty($value)) :
				echo $value;
			endif;
		}
          
          
        
          
          
          
     }