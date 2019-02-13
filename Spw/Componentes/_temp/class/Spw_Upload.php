<?php

	class Spw_Upload

	{



		// METODOS DE PROCESSO
		
		static function Diretorio()
		{
			return ABSPATH . 'wp-content/uploads';
		}
		
		
		static function Url()
		{
			return get_bloginfo('url') . '/wp-content/uploads';
		}



	 }