<?php

	class Spw_Wp

	{


		static function UsuarioLogado()
		{
			return get_current_user_id();
		}
		
		
		static function UrlInstalacao()
		{
			return get_bloginfo('url');
		}
		
		
		static function Shortcode($content)
		{
			if (!empty($content)) :
				
				ob_start();
				echo do_shortcode($content, false);
				return ob_get_clean();
				
			endif;
		}



	}