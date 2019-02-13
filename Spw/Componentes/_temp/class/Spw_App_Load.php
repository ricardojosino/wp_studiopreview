<?php

	class Spw_App_Load

	{

		// ATRIBUTOS



		// METODOS DE CONFIGURACAO



		// METODOS DE PROCESSO
		
		public function __construct() 
				
		{
			
		}
		
		static function ClassObject($app, $name)
		{

			$path = spw_app_path($app) . '/class/' . $name . '.php'; 

			if (file_exists($path)) :
				include $path;
			endif;

		}
		
		
		static function View($app, $name)
		{

			$path = spw_app_path($app) . '/view/' . $name . '.php'; 

			if (file_exists($path)) :
				include $path;
			endif;

		}
          
          
		static function ViewContent($app, $name)
		{

			$path = Spw_Tools::MontarLink( Spw_App_Diretorio::View($app, $name), null); 

               if (file_exists($path)) :
               
                    ob_start();
                         include $path;
                    return ob_get_clean();
                    
               endif;

		}
		
		
		
		static function Css($app, $name)
		{
			
			$link = '<link rel="stylesheet" type="text/css" href="' . spw_app_url($app) .  '/css/' . $name . '.css"></link>';
			
			add_action('wp_head', function() use ($link) {echo $link; }, 10);
		}
		
		
		
		static function Script($app, $name)
		{
			
			$script = '<script src="' . spw_app_url($app) . '/js/' . $name . '.js"></script>';
			
			add_action('wp_head', function() use($script) { echo $script; } , 10);
			
		}
		
		
		


	 }