<?php

	class Spw_UI_Alerta

     {

          // ATRIBUTOS



          static function Gravar($tipo, $value)
		  {
			  if (!empty($value)) :
				$_SESSION['spw-alert'] = array( 'type' => $tipo, 'value' => $value );
			  endif;
		  }
		  
		  
		  static function Exibir()
		  {
			  
			  return $_SESSION['spw-alert']['value'];
			  
			if (isset($_SESSION['spw-alert']) and !empty($_SESSION['spw-alert'])) :

				$array[] = '<div class="spw-alert">';

				foreach($_SESSION['spw-alert'] AS $item) :
				$array[] = '<div class="mensagem">' . $item['value'] . '</div>';
				endforeach;

				$array[] = '</div>';

				return 'Teste' . join('', $array);

			endif;
			
			
				
			
			
			  
		  }


      }
