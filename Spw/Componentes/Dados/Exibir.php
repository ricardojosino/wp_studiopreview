<?php
     
     namespace Spw\Componentes\Dados;

	class Exibir

	{


		// METODOS DE PROCESSO
		
		static function MostrarValor($key)
		{
			return get_option($key);
		}



	 }