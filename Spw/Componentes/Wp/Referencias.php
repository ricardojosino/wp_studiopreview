<?php
     
     namespace Spw\Componentes\Wp;

	class Referencias

	{


		static function UsuarioLogado()
		{
			return get_current_user_id();
		}
		
		
		static function UrlInstalacao()
		{
			return get_bloginfo('url');
		}
		

	}