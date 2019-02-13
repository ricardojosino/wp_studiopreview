<?php

	class Spw_Lib
     
     {
          
     
     // METODOS DE PROCESSO
     
		static function Load($name)
		{
			if (!empty($name)) :
				include get_template_directory() . '/spw/_library/externo/' . $name . '/index.php';
			endif;
		}
		
		
		static function Url($name, $filename)
		{
			if (!empty($filename)) :
				return get_template_directory_uri() . '/spw/_library/externo/' . $name . '/' . $filename;
			endif;
		}
		
		
		static function Diretorio($name, $filename)
		{
			if (!empty($filename)) :
				return get_template_directory() . '/spw/_library/externo/' . $name . '/' . $filename;
			endif;
		}

		
          
     }