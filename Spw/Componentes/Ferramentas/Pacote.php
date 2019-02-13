<?php
     
     namespace Spw\Componentes\Ferramentas;

	class Pacote

	{


		 static function Dados_ValorOuValorPadrao($value, $value_default)
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
		
          
		
		static function KiloByteParaByte($value)
		{
			return $value * 1024;
		}
		
		
		static function ByteParaKiloByte($value)
		{
			return $value / 1024;
		}
		
		
          
          static function Url_JuntarComParametros($link, $parametros)

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
		
		
		static function Url_MontarUrlAmigavel($array)
		{
			if (!empty($array) and is_array($array)) :
				return get_bloginfo('url') . '/' . join('/', $array);
			endif;
		}
		
		
		static function Url_CapturarSlugDaUrlAmigavel()
		{
			$link = $_SERVER['REQUEST_URI'];
			$array = explode('/', $link);
			
			if (!empty($array)) :
				return end($array);
			endif;
			
		}
		
		
		static function Url_CapturarNomeDoModuloEmUrlAmigavel()
		{
			$link = $_SERVER['REQUEST_URI'];
			$array = explode('/', $link);
			$ultimo = end($array);
			$modulo = prev($array);
			
			if (!empty($modulo)) :
				return $modulo;
			endif;
			
		}
		
		
		static function Url_CapturarUrl()
		{
			return "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}
		
		
		static function Slug_GerarSlug($value)
		{
			if (!empty($value)) :
				return strtolower( self::EscaparCaracteres($value) );
			endif;
		}
		
		
		
		static function EscaparCaracteres($str)
     
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
		
		
		
		static function Texto_SingularOuPlural($numero, $vazio, $singular, $plural)
		{
			if ($numero == 0) :
				return $vazio;
			
			elseif ($numero == 1) :
				return $numero . ' ' . $singular;
			
			elseif ($numero > 1) :
				return $numero . ' ' . $plural; 
				
			endif;
		}
		
		
		
		static function Data_FormatoBancoDeDados()
		{
			return  date('Y-m-d');
		}
		
		
		static function Data_DataHora_FormatoBancoDeDados()
		{
			return date('Y-m-d H:i:s');
		}
		
	
		static function Data_Converter_ParaFormatoDeExibicao($data)

		{

			if ( !empty($data) ) :

			   $Ano = substr($data,0,4);
			   $Mes = substr($data,5,2);
			   $Dia = substr($data,8,2);

			   $ExibirData = $Dia . "-" . $Mes . "-" . $Ano;
                  
			   return ($ExibirData);

			   else : 
					return null;

			endif;
		}
          
          
        
          static function Data_Converter_ParaFormatoDeBancoBancoDeDados($data)

		{

			if ( !empty($data) ) :

			   $Ano = substr($data,6,4);
			   $Mes = substr($data,3,2);
			   $Dia = substr($data,0,2);

			   $ExibirData = $Ano . "-" . $Mes . "-" . $Dia;
                  
			   return ($ExibirData);

			   else : 
					return null;

			endif;
		}
		
		
		static function Hora_FormatoDeBancoDeDados()
		{
			return date('H:i:s');
		}
		
		
		static function Codigo_Alfanumerico_32()
		{
			return date('dmYHis').str_shuffle('2a3s4d2cg53r7s5f3s');
		}
          
          
          static function Codigo_Numerico_11()
          {
               return date('y') . str_shuffle('123456789');
          }
          
          
          static function Diretorio_CriarNovaPasta($path)
          {

               if (!file_exists($path)) :
                    mkdir($path, 0777);
               endif;

          }
          
          
          static function Moeda_Formatar($valor)
          {
               if (!empty($valor)) :
                    return number_format($valor,2,',','.');
               endif;
          }
          
          
          // RECEBE TRUE OU Y PARA RETORNAR Y, RECEBE FALSE PARA RETORNAR N
          static function YouN($value)
          {
               switch($value) :
                    
                    case true :
                         return 'Y';
                         break;
                    
                    case false;
                         return 'N';
                         break;
                    
                    case 'Y';
                         return 'Y';
                         break;
                    
                    case 'N';
                         return 'N';
                         break;
                    default :
                         return 'N';
                    
               endswitch;
          }
		

	}