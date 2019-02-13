<?php

	class Spw_Wp_ShortCode

     {

          // ATRIBUTOS

			protected $tag;
			protected $content;
			protected $atributos;
			

          // METODOS DE CONFIGURACAO
			
			public function Set_Tag($value)
			{
				$this->tag = $value;
			}
			
			
			public function Set_Atributos($array)
			{
				$this->atributos = $array;
			}
			
			
			public function Set_Content($function_content)
			{
				$this->content = $function_content;
			}



          // METODOS DE PROCESSO
			
			function Atts($atts)
			{
				
				
				if (!empty($this->atributos)) :
					
					shortcode_atts( $this->atributos , $atts, $this->tag );
					
					foreach($this->atributos AS $key => $value) :

						$search[$key] = '[' . $key . ']';
						$replace[$key] = $value;

					endforeach;
					
						else :
							$search[] = null;
							$replace[] = null;
					
				endif;
				
				if (!empty($atts)) :
					
					foreach($atts AS $key => $value) :

						$search[$key] = '[' . $key . ']';
						$replace[$key] = $value;

					endforeach;
						
						else :
							$search[] = null;
							$replace[] = null;
					
				endif;
				
				
				return str_replace($search, $replace, $this->content);
			}
				
			
			function Code()
			{
				
				add_shortcode($this->tag, array($this, 'Atts') );
				
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Code();

          }


      }