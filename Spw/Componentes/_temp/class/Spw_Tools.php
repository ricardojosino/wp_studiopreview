<?php

     class Spw_Tools

	{


		// METODOS DE PROCESSO
		 
		 static function DataDefault($value, $value_default)
		 {
			 if (empty($value)) :
				 return $value_default;
			 
					else :
						return $value;
			 endif;
		 }
		 
		 
		static function LimitarTexto($texto, $limite)
		{
			$pontinhos = ( strlen($texto) > $limite ) ? ' ...' : null;
			$texto = substr($texto, 0, $limite) . $pontinhos;
			
			return strip_tags($texto);
		}
		
		
		static function KiloByteToByte($value)
		{
			return $value * 1024;
		}
		
		
		static function ByteToKiloByte($value)
		{
			return $value / 1024;
		}
		
		
		static function FileUploadErrorMessage($codigo)
		{
			
			switch($codigo) :
				
				case 0 :
					return 'Upload foi bem sucedido';
					break;
				
				case 1 :
					return 'Arquivo enviado excede o limite definido na diretiva do php.ini no servidor.';
					break;
				
				case 2 :
					return 'Este arquivo possui um tamanho maior que o permitido.';
					break;
				
				case 3 :
					return 'O upload do arquivo foi feito parcialmente.';
					break;
				
				case 4 :
					return 'Nenhum arquivo foi enviado.';
					break;
				
				case 6 :
					return 'Pasta temporária ausênte no servidor.';
					break;
				
				case 7 :
					return 'Falha em escrever o arquivo em disco.';
					break;
				
				case 8 :
					return 'Uma extensão do PHP interrompeu o upload do arquivo.';
					break;
					
				
			endswitch;
			
		}
		
		
		static function UrlAmigavel($array)
		{
			if (!empty($array) and is_array($array)) :
				return Spw_Wp::UrlInstalacao() . '/' . join('/', $array);
			endif;
		}
		
		
		static function UrlAmigavel_CapturarSlug()
		{
			$link = $_SERVER['REQUEST_URI'];
			$array = explode('/', $link);
			
			if (!empty($array)) :
				return end($array);
			endif;
			
		}
		
		
		static function UrlAmigavel_CapturarModulo()
		{
			$link = $_SERVER['REQUEST_URI'];
			$array = explode('/', $link);
			$ultimo = end($array);
			$modulo = prev($array);
			
			if (!empty($modulo)) :
				return $modulo;
			endif;
			
		}
		
		
		static function Url_Capturar()
		{
			return "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}
		
		
		static function Slug($value)
		{
			if (!empty($value)) :
				return strtolower( Spw_Tools::TrocarCaracteresEspeciais($value) );
			endif;
		}
		
		
		
		static function TrocarCaracteresEspeciais($str)
     
		{

			 $array = array

			 (
				  ' ' => '-',
				  '?' => '-',
				  '!' => '-',
				  '@' => '-',
				  '#' => '-',
				  '%' => '-',
				  '^' => '-',
				  '&' => '-',
				  '*' => '-',
				  '(' => '-',
				  ')' => '-',
				  '{' => '-',
				  '}' => '-',
				  '[' => '-',
				  ']' => '-',
				  '<' => '-',
				  '>' => '-',
				  '~' => '-',
				  '+' => '-',
				  '=' => '-',
				  ',' => '-',
				  '.' => '',
				  ':' => '-',
				  ';' => '-',
				  '"' => '-',
				  "'" => '-',
				  "`" => '-',
				  "/" => '-',
				  "|" => '-',
				  'á' => 'a',
				  'à' => 'a',
				  'ã' => 'a',
				  'â' => 'a',
				  'é' => 'e',
				  'ê' => 'e',
				  'í' => 'i',
				  'ó' => 'o',
				  'ô' => 'o',
				  'õ' => 'o',
				  'ú' => 'u',
				  'ü' => 'u',
				  'ç' => 'c',
				  'Á' => 'A',
				  'À' => 'A',
				  'Ã' => 'A',
				  'Â' => 'A',
				  'É' => 'E',
				  'Ê' => 'E',
				  'Í' => 'I',
				  'Ó' => 'O',
				  'Ô' => 'O',
				  'Õ' => 'O',
				  'Ú' => 'U',
				  'Ü' => 'U',
				  'Ç' => 'C',
			 );

			 return strtr( $str, $array);
		}
		
		
		
		static function MontarLink($link, $parametros)

		{

			 if (!empty($link)) :



				  // DEFINE ANCORA
				  $verifica_ancora = strpos($link,"#");

				  if ($verifica_ancora === FALSE) :

					   $ancora = "";
					   $link_atualizado = $link;

							else : 

							$divide = explode("#",$link);
							$ancora = "#" . $divide['1'];
							$link_atualizado = $divide['0'];
				  endif;


				  if (!empty($parametros)) :

					   // VERIFICA SE EXISTE O PONTO DE INTERROGACAO
					   $verifica = strpos($link_atualizado, "?");

							// SE NAO TIVER, INSERIR ?
							if ($verifica === FALSE) :

								 $novo_link = $link_atualizado . "?" . $parametros . $ancora;

									  // SE TIVER, INSERIR &
									  else :
										   $novo_link = $link_atualizado . "&" . $parametros . $ancora;
							endif;



					   return $novo_link;

					   else :
							return $link_atualizado;

				  endif;



			 endif;
		}
		
		
		
		static function TextoSingularPlural($numero, $vazio, $singular, $plural)
		{
			if ($numero == 0) :
				return $vazio;
			
			elseif ($numero == 1) :
				return $numero . ' ' . $singular;
			
			elseif ($numero > 1) :
				return $numero . ' ' . $plural; 
				
			endif;
		}
		
		
		
		static function Date()
		{
			return  date('Y-m-d');
		}
		
		
		static function DateTime()
		{
			return date('Y-m-d H:i:s');
		}
		
		
		static function Date_FormatarParaTexto($data)

		{

			if (!empty($data)) :

			   $Ano = substr($data,0,4);
			   $Mes = substr($data,5,2);
			   $Dia = substr($data,8,2);


			   $ExibirData = $Dia."-".$Mes."-".$Ano;
			   return ($ExibirData);

			   else : 
					return '';

			endif;
		}
		
		
		static function Time()
		{
			return date('H:i:s');
		}
		
		
		static function CodigoAlfanumerico_32()
		{
			return date('dmYHis').str_shuffle('2a3s4d2cg53r7s5f3s');
		}
		
	
	}
	
	
	