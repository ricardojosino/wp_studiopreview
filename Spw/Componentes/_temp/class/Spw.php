<?php

	class Spw

	{



	// METODOS DE PROCESSO

		static function View($value)
		{
			if (!empty($value)) :
				return join('', $value);
			endif;
		}
		
		
		static function Show($value)
		{
			if (!empty($value)) :
				echo $value;
			endif;
		}
		
		
		static function Mensagem($value)
		{
			if (!empty($value)) :
			
				$mensagem = new Spw_Mensagem();
				$mensagem->Set_Mensagem($value);
				$mensagem->Executar();

			endif;
		}



	}