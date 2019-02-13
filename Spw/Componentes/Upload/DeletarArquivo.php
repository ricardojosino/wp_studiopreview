<?php
     
     namespace Spw\Componentes\Upload;

	class DeletarArquivo
     
     {
          
     // ATRIBUTOS
          
		protected $patch_file;
		protected $modo;
		
		protected $start;
		protected $start_method;
		protected $start_value;
		
		protected $update_tabela;
		protected $update_chaveprimaria;
		protected $update_chaveprimaria_value;
		protected $update_campo;
		
		protected $delete_tabela;
		protected $delete_chaveprimaria;
		protected $delete_chaveprimaria_value;
		
		protected $retorno_page;
		protected $retorno_pagina;
		protected $retorno_parametros;
		
		protected $mensagem;
		
		
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_Patch($value)
		{
			$this->patch_file = $value;
		}
		
		
          
		public function Set_Start($method, $value)
		{
			$this->start_method = $method;
			$this->start_value = $value;
		}
          
          
          public function Set_AtualizarNoBancoDeDados_Ativar($ativar)
		{
			if ($ativar) :
				$this->modo = 1;
			endif;
		}
		
		
		public function Set_AtualizarNoBancoDeDados_NomeDaTabela($value)
		{
			$this->update_tabela = $value;
		}
		
		
		public function Set_AtualizarNoBancoDeDados_ChavePrimaria($key, $value)
		{
			$this->update_chaveprimaria = $key;
			$this->update_chaveprimaria_value = $value;
		}
		
		
		public function Set_AtualizarNoBancoDeDados_NomeDoCampo($value)
		{
			$this->update_campo = $value;
		}
          
          
          public function Set_DeletarNoBancoDeDados_Ativar($ativar)
		{
			if ($ativar) :
				$this->modo = 2;
			endif;
		}

		
		public function Set_DeletarNoBancoDeDados_NomeDaTabela($value)
		{
			$this->delete_tabela = $value;
		}
		
		
		public function Set_DeletarNoBancoDeDados_ChavePrimaria($key, $value)
		{
			$this->delete_chaveprimaria = $key;
			$this->delete_chaveprimaria_value = $value;
		}

		
		public function Set_RetornarParaPagina($wp_page, $pagina, $parametros)
		{
			$this->retorno_page = $wp_page;
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
		 
		
		
		protected function ApagarCampo()
		{
			$update = new \Spw\Componentes\Mysql\AtualizarRegistro();
			$update->Set_Conectar();
			$update->Set_Start($this->start_method, $this->start_value);
			$update->Set_NomeDaTabela($this->update_tabela);
			$update->Set_ChavePrimaria($this->update_chaveprimaria, $this->update_chaveprimaria_value);
			$update->Set_AdicionarCampo(true, $this->update_campo, 'STRING', 'VALUE', '');
			$update->Executar();
			
		}
		
		
		protected function DeletarRegistro()
		{
			$deletar = new \Spw\Componentes\Mysql\DeletarRegistro();
			$deletar->Set_Conectar();
			$deletar->Set_Start($this->start_method, $this->start_value);
			$deletar->Set_NomeDaTabela($this->delete_tabela);
			$deletar->Set_ChavePrimaria($this->delete_chaveprimaria, $this->delete_chaveprimaria_value);
			$deletar->Executar();
			
		}
		
		
		protected function DeletarArquivo()
		{
			if (!empty($this->patch_file)) :
				
				if (file_exists($this->patch_file)) :
					unlink($this->patch_file);
				
				
						else :
                                   $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                                   $mensagem->Set_Mensagem('Este arquivo já deletado anteriormente!');
                                   $mensagem->Executar();
				
				endif;
				
			endif;
		}
		
		
		protected function Modo()
		{
			
			if ($this->start) :
			
				switch($this->modo) :

					case 1 :
						$this->DeletarArquivo();
						$this->ApagarCampo();
                              $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                              $mensagem->Set_Mensagem($this->mensagem);
                              $mensagem->Executar();
						break;

					case 2 :
						$this->DeletarArquivo();
						$this->DeletarRegistro();
						$mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                              $mensagem->Set_Mensagem($this->mensagem);
                              $mensagem->Executar();
						break;

					default :
						$this->DeletarArquivo();
						$mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                              $mensagem->Set_Mensagem($this->mensagem);
                              $mensagem->Executar();
						break;


				endswitch;
			
			endif;
			
		}
		
		
		protected function Retorno()
		{
			if (!empty($this->retorno_pagina)) :
			
                    $redirecionar = new \Spw\Componentes\Modulo\Redirecionar();
                    $redirecionar->Set_RedirecionarParaPagina($this->retorno_page, $this->retorno_pagina, $this->retorno_parametros);
                    $redirecionar->Executar();

			endif;
		}
		
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
				$this->Start();
				$this->Modo();
				$this->Retorno();
               
          }
          
          
     }
