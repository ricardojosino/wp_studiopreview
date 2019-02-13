<?php

	

	class Spw_Mysql_Insert

	{

		// ATRIBUTOS

			protected $dbc;
			protected $tabela;
			protected $key;
			protected $id;
			protected $colunas;
			protected $values;
			
			protected $start;
			protected $start_method;
			protected $start_value;
			
			protected $check_registro_query;
			
			protected $mensagem;
			
			protected $retorno_tipo;
			protected $retorno_url;
			protected $retorno_page;
			protected $retorno_view;
			protected $retorno_parametros;
			
			public $id_gerado;
			


		// METODOS DE CONFIGURACAO
			
			public function Set_Conectar()
			{
				$this->dbc = Spw_Mysql_Conectar::Conectar();
			}
			
			
			public function Set_Tabela($value)
			{
				$this->tabela = $value;
			}
			
			
			public function Set_Start($method, $value)
			{
				$this->start_method = $method;
				$this->start_value = $value;
			}
			
			
			public function Set_AddRegistro($exibir, $column, $type, $method, $value)
			{
				if ($exibir) :
					
					$this->colunas[] = $column;
					$this->values[] = "'" . $this->Method($method, $this->Value($type, $column, $value)) . "'";
					
				endif;
			}
			
			
			public function Set_Retorno($value)
			{
				$this->retorno_tipo = 1;
				$this->retorno = $value;
			}
			
			
			public function Set_RetornoView($page, $view, $parametros)
			{
				$this->retorno_tipo = 2;
				$this->retorno_page = $page;
				$this->retorno_view = $view;
				$this->retorno_parametros = $parametros;
			}
			
			
			public function Set_Mensagem($value)
			{
				$this->mensagem = $value;
			}
			
			
			public function Set_Check_RegistroExiste($query)
			{
				$this->check_registro_query[] = $query;
			}
			
			
			



		// METODOS DE PROCESSO
			
			protected function Start()
			{

				switch ($this->start_method) :


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

				switch ($method) :

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
			
			
			
			protected function Value($type, $column, $value)
			{
				switch ($type) :


					case "INT" :
						 return (int) $value;
						 break;

					case "STRING" :
						 return (string) $value;
						 break;

					case "DOUBLE" :
						 $corte = str_replace(",", ".", $value);
						 return (double) $corte;
						 break;

					case "DATE" :
						 return (string) "'" . SN_FormatarDataDb($value) . "'";
						 break;

					case "PASS" :
						 return (string) "'" . md5($value) . "'";
						 break;

					case "ID_NUMERICO" :
						  $numero_randomico = mt_rand ();
						  $id = date('ym').substr ( $numero_randomico,0,6);
						  $value = (int) $id;
						  $this->key = $column;
						  $this->id = $value;
						  return $value;
						  break;

					case "ID_ALFANUMERICO" :
						 $id = date('dmYHis').str_shuffle('2a3s4d2cg53r7s5f3s');
						 $value = $id;
						 $this->key = $column;
						 $this->id = $value;
						 return $value;
						 break;

					default :
						 return " NULL ";
						 break;


			  endswitch;


			}
			
			
			protected function InsertInto()
			{
				return 'INSERT INTO ' . $this->tabela;
			}
			
			
			protected function Columns()
			{
				if (!empty($this->colunas)) :
					return '(' . join(', ', $this->colunas) . ')';
				endif;
			}
			
			
			protected function Values()
			{
				if (!empty($this->values)) :
					return 'VALUES (' . join(', ', $this->values) . ')';
				endif;
			}
			
			
			
			protected function Redirecionar()
			{
				
				switch($this->retorno_tipo) :
					
					case 1 :
						$redirecionar = new Spw_Redirecionar();
						$redirecionar->Set_RedirecionarParaUrl( spw_montar_link($this->retorno, $this->key . '=' . $this->id ) );
						$redirecionar->Executar();
						break;
					
					case 2 :
						$redirecionar = new Spw_Redirecionar();
						$redirecionar->Set_RedirecionarParaView($this->retorno_page, $this->retorno_view, $this->RedirecionarParametros());
						$redirecionar->Executar();
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
			
			
			protected function Mensagem($value)
			{
				$mensagem = new Spw_Mensagem();
				$mensagem->Set_Mensagem($value);
				$mensagem->Executar();
			}
			
			
			protected function SalvarNotificacao()
			{
				if (!empty($this->mensagem)) :

					$this->Mensagem($this->mensagem);

				endif;
			}
			
			
			protected function CheckRegistroQuery()
			{
				if (!empty($this->check_registro_query)) :
					return join(' ', $this->check_registro_query);
				endif;
			}
			
			
			protected function CheckRegistroExiste()
			{
				if (!empty($this->check_registro_query)) :
					$query = new Spw_Mysql_Check_RegistroExiste();
					$query->Set_Query($this->CheckRegistroQuery());
					$query->Executar();
					
					if ($query->result == true) :
						$this->start = false;
					endif;
					
				endif;
			}

			
			protected function Query()
			{
				if ($this->start) :
					
					$array[] = $this->InsertInto();
					$array[] = $this->Columns();
					$array[] = $this->Values();
					$array[] = ';';
					
					$query = join(' ', $array);
					
					mysqli_query($this->dbc, $query) or die('Erro na Query Spw_Mysql_Insert ' . '<br><br>' . $query . '<br><br>' . mysqli_query($this->dbc, $query)  );
					
					$this->SalvarNotificacao();
					$this->GetId();
					$this->Redirecionar();
					
				endif;
				
			}
			
			
			protected function GetId()
			{
				$this->id_gerado = $this->id;
			}



		// ALGORITIMO

			public function Executar()

			{
				$this->Start();
				$this->CheckRegistroExiste();
				$this->Query();

			}


	 }