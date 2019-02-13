<?php

     namespace Spw\Componentes\Html;

	class Funcoes
     
     {
          
     
     // METODOS DE PROCESSO
		
		
		static function Tag($tag, $array_atributos, $conteudo)
		{

			 if ( !empty($tag) ) :
				  return '<' . $tag . self::Atributos($array_atributos) . '>' . $conteudo . '</' . $tag . '>' ;
			 endif;

		}
          
          
		static function Atributos($array)
		{
			 if ( !empty($array) and is_array($array) ) :

				  foreach ($array as $key => $value) :

                         if (!empty($value)) :

                               $attibutes[] = $key . '=' . '"' . self::AtributosValor($value) . '"'; 

                         endif;

				  endforeach;

				  if (!empty($attibutes)) :
					   return ' ' . join(' ', $attibutes);
				  endif;

			 endif;
		}
          
          
          
		static function AtributosValor($value)
		{
			 if ( !empty($value) and is_array($value) ) :

				  foreach($value as $key => $value) :

					   if (!empty($value)) :
							$property[] = $key . ':' . self::IsNumber($value); 
					   endif;

				  endforeach;


				  if (!empty($property)) :
					   return '' . join('; ', $property);
				  endif;

					   else :
							return $value;

			 endif;
		}
          
	
		
		static function Url($value)
		{
			if (!empty($value)) :
				return 'url('. $value .')';
			endif;
			
		}
          
          
          static function IsNumber($value)
		{
			return is_numeric($value) ? $value . 'px' : $value;
		}
		
	
          
          
     }