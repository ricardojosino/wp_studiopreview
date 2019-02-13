<?php

	class Spw_App

	{

		

		// METODOS DE PROCESSO
		
		static function Install($app)
		{
			if (!empty($app) and file_exists( get_template_directory() . '/spw/' . $app . '/index.php' )) :
			 
				include get_template_directory() . '/spw/' . $app . '/index.php';
			 
			endif;
		}
		
		
		
		static function Session_Gravar($namespace, $key, $value)
		{
			$_SESSION[$namespace . '_' . $key] = $value;
		}
		
		
		static function Session_Exibir($namespace, $key)
		{
			return $_SESSION[$namespace . '_' . $key];
		}




	 }