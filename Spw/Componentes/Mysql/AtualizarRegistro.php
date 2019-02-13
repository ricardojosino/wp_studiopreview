<?php
     
     namespace Spw\Componentes\Mysql;

     class AtualizarRegistro
     
     {
          
     // ATRIBUTOS
          
		protected $dbc;
		protected $tabela;
		protected $key;
		protected $key_value;
          protected $campos;
		protected $start;
		protected $start_method;
		protected $start_value;
		protected $mensagem;
                    
		protected $retorno_tipo;
		protected $retorno_url;
		protected $retorno_modulo;
		protected $retorno_page;
		protected $retorno_pagina;
		protected $retorno_parametros;

				 
		 
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_Conectar()
		 {
			$this->dbc = \Spw\Componentes\Mysql\Conectar::Executar();
		 }
		 
		 
		 public function Set_NomeDaTabela($value)
		 {
			 $this->tabela = $value;
		 }
		 
          
		 public function Set_ChavePrimaria($key, $value)
		 {
			 $this->key = $key;
			 $this->key_value = $value;
		 }
		 
		 
		 public function Set_AdicionarCampo($exibir, $campo, $type, $method, $value)
		 {
			 if ($exibir) :
				 
				 $this->campos[] = $campo . ' = ' . $this->Value($type, $this->Method($method, $value));
				 
			 endif;
		 }
		 
		 
		 public function Set_Start($method, $value)
		 {
			 $this->start_method = $method;
			 $this->start_value = $value;
		 }
		 
		 
		 public function Set_RetornarParaUrl($value)
		 {
			$this->retorno_tipo = 1;
			$this->retorno = $value;
		 }

			
		 public function Set_RetornarParaPagina($wp_page, $modulo, $pagina, $parametros)
		 {
			$this->retorno_tipo = 2;
			$this->retorno_page = $wp_page;
			$this->retorno_modulo = $modulo;
			$this->retorno_pagina = $pagina;
			$this->retorno_parametros = $parametros;
		 } 
		 
		 
		 public function Set_Mensagem($value)
		 {
			 $this->mensagem = $value;
		 }

     
     // METODOS DE PROCESSO
		 
		 protected function Start()
		 {
			
			 switch (strtoupper($this->start_method)) :


                    case "POST" :

                         if (isset($_POST[$this->start_value])) : 

                              $this->start = true;
                                   else :
                                        $this->start = false;

                         endif;

                    break;


                    case "GET" :

                         if (isset($_GET[$this->start_value])) :
                              $this->start = true;
                                   else :
                                        $this->start = false;
                         endif;

                    break;


                    case "SESSION" :

                              if (isset($_SESSION[$this->start_value])) :

                                   $this->start = true;
                                        else :
                                             $this->start = false;

                              endif;

                    break;



                    case "VALUE" :

                              if (isset($this->start_value)) :

                                   $this->start = true;
                                        else :
                                             $this->start = false;

                              endif;


                         break;



                    default :
                         $this->start = false;
                         break;

               endswitch;

			 
		 }
		 
		 
		 
		 protected function Method($method, $value)
		 {
			 
			 switch (strtoupper($method)) :

				 case "POST" :
					  return $_POST[$value];
					  break;
				  
				  case "FILES" :
					  return $_FILES[$value]['name'];
					  break;

				 case "GET" :
					  return $_GET[$value];
					  break;

				 case "SESSION":
					  return $_SESSION[$value];
					  break;

				 case "VALUE" :
					  return $value;
					  break;

				 DEFAULT :
					  return $_POST[$value];
					  break;

			endswitch;
			 
		 }
		 
		 
		 protected function CheckValue($script, $value)
		 {
			 if (!empty($value)) :
				 return $script;
			 
					else :
						return 'NULL';
			 endif;
		 }
		 
		 
		 protected function Value($type, $value)
		 {
			 switch (strtoupper($type)) :


				case "INT" :
					 return $this->CheckValue( (int) $value, $value );
					 break;

				case "STRING" :
					 return $this->CheckValue( (string) "'" . $value . "'", $value );
					 break;

				case "DOUBLE" :
					 $corte = str_replace(",", ".", $value);
					 return $this->CheckValue( (double) $corte, $value );
					 break;

				case "DATE" :
					 return $this->CheckValue( (string) "'" . \Spw\Componentes\Ferramentas\Pacote::Data_Converter_ParaFormatoDeBancoBancoDeDados($value) . "'", $value );
					 break;

				case "PASS" :
					 return $this->CheckValue( (string) "'" . md5($value) . "'", $value );
					 break;

				default :
					 return " NULL ";
					 break;


		   endswitch;

			 
		 }
		 
		 
		 protected function Update()
		 {
			 return 'UPDATE ' . $this->tabela;
		 }
		 
		 
		 protected function Set()
		 {
			 if (!empty($this->campos)) :
				 
				 return 'SET ' . join(', ', $this->campos);
				 
			 endif;
		 }
		 
		 
		 protected function Where()
		 {
			 return 'WHERE ' . $this->key . ' = ' . "'" . $this->key_value . "'" ;
		 }
		 
		 
		 protected function Limit()
		 {
			 return 'LIMIT 1 ';
		 }
		 
		 
		 protected function RedirecionarUrl()
		 {
                    $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
                    $redirecionar->Set_RedirecionarParaUrl( \Spw\Componentes\Ferramentas\Pacote::Url_JuntarComParametros($this->retorno_url, $this->key = '=' . $this->key_value) );
                    $redirecionar->Executar();
		 }
		 
		 
		 protected function RedirecionarView()
		 {
			 if (!empty($this->retorno_pagina)) :
				 
                    $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
                    $redirecionar->Set_RedirecionarParaPagina($this->retorno_page, $this->retorno_modulo, $this->retorno_pagina, $this->retorno_parametros);
                    $redirecionar->Executar();
				 
			 endif;
		 }
		 
		 
		 
		 protected function Redirecionar()
		{

			switch($this->retorno_tipo) :

				case 1 :
					$this->RedirecionarUrl();
					break;

				case 2 :
					$this->RedirecionarView();
					break;

			endswitch;

		}

			
		protected function RedirecionarParametros()
		{

			$id = $this->key . '=' . $this->id;
			$retorno_parametros = $this->retorno_parametros;

			(!empty($id)) ? $array[] =  $id : '';
			(!empty($retorno_parametros)) ? $array[] =  $retorno_parametros : '';


			if (!empty($array)) :
				return join('&', $array);
			endif;


		}
		
		
		protected function SalvarNotificacao()
		{
			if (!empty($this->mensagem)) :
			
                    $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                    $mensagem->Set_Mensagem($this->mensagem);
                    $mensagem->Executar();
			
			endif;
		}

		 
		 
		protected function Query()
		{

			if ($this->start and !empty($this->key) and !empty($this->key_value)) :

			   $array[] = $this->Update();
			   $array[] = $this->Set();
			   $array[] = $this->Where();
			   $array[] = $this->Limit();

			   $query = join(' ', $array);

			   mysqli_query($this->dbc, $query) or die('Erro na query Spw_Mysql_Update ' . '<br><br>' . $query . '<br><br>' . mysqli_error($this->dbc));

			   $this->SalvarNotificacao();
			   
			   $this->Redirecionar();

			endif;

		}
		 
		 
		 
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
			
			$this->Start();  
			$this->Query();
               
               
          }
          
          
     }