<?php
	
     namespace Spw\Componentes\Mysql;
     
	class DeletarRegistro

	{

		// ATRIBUTOS
		
			protected $dbc;
			protected $tabela;
			protected $key;
			protected $value;
			
			protected $start;
			protected $start_method;
			protected $start_value;
			
			protected $mensagem;
			

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
				$this->value = $value;
			}
			
			
			public function Set_Start($method, $value)
			{
				$this->start_method = $method;
				$this->start_value = $value;
			}
			
			
			public function Set_Mensagem($value)
			{
				$this->mensagem = $value;
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
			
			
			protected function Delete()
			{
				return 'DELETE FROM ' . $this->tabela;
			}
			
			
			protected function Where()
			{
				return 'WHERE ' . $this->key . ' = ' . $this->value;
			}
			
			
			protected function SalvarNotificacao($value)
			{
				if (!empty($value)) :

                         $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                         $mensagem->Set_Mensagem($value);
                         $mensagem->Executar();

				endif;
			}
			
			
			
			protected function Query()
			{
				
				if (!empty($this->key) and !empty($this->value)) :
				
				$array[] = $this->Delete();
				$array[] = $this->Where();
				
				$query = join(' ', $array);
				
				mysqli_query($this->dbc, $query) or die('Erro no componente Spw_Mysql_Delete ' . '<br><br>' . $query . '<br><br>' . mysqli_error($this->dbc));
				
				$this->SalvarNotificacao($this->mensagem);
				
				endif;
				
			}
			
			
			



		// ALGORITIMO

		public function Executar()

		{
			$this->Start();
			$this->Query();
		}


	 }
