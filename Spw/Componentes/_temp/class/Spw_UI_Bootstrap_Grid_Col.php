<?php

     class Spw_UI_Bootstrap_Grid_Col
     
     {
          
     // ATRIBUTOS
          

		 
     // METODOS DE CONFIGURACAO
          
		static  function Set_Col_SM($exibir, $tamanho, $value)
		{
			if ($exibir) :
				return '<div class="col-sm-' . $tamanho . '">' . $value . '</div>';
			endif;
		}
		
		
		public function Set_Col_XS($exibir, $tamanho, $value)
		{
			if ($exibir) :
				return '<div class="col-xs-' . $tamanho . '">' . $value . '</div>';
			endif;
		}
		
		
		public function Set_Col_MD($exibir, $tamanho, $value)
		{
			if ($exibir) :
				return '<div class="col-md-' . $tamanho . '">' . $value . '</div>';
			endif;
		}
		
		
		static function Set_Col_LG($exibir, $tamanho, $value)
		{
			if ($exibir) :
				return '<div class="col-lg-' . $tamanho . '">' . $value . '</div>';
			endif;
		}
		
	
		
     
     // METODOS DE PROCESSO
		
		
		
		  
     

     // ALGORITIMO
          
          
          
          
     }