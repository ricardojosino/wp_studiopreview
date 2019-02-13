<?php

	class Spw_Html_Select_Selected
     
     {
          
     // ATRIBUTOS
          
          
          
     // METODOS DE CONFIGURACAO
		
          

     
     // METODOS DE PROCESSO
		
		static function Selected($value, $value_db)
		{
			if($value == $value_db) :
				return ' selected ';
			endif; 
		}
          
     

     // ALGORITIMO
          
          
          
     }