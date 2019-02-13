<?php

	class Spw_Upload_DeletarArquivo
     
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
		protected $retorno_view;
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
		
		
		public function Set_Update_Tabela($value)
		{
			$this->update_tabela = $value;
		}
		
		
		public function Set_Update_ChavePrimaria($key, $value)
		{
			$this->update_chaveprimaria = $key;
			$this->update_chaveprimaria_value = $value;
		}
		
		
		public function Set_Update_Campo($value)
		{
			$this->update_campo = $value;
		}

		
		public function Set_Delete_Tabela($value)
		{
			$this->delete_tabela = $value;
		}
		
		
		public function Set_Delete_ChavePrimaria($key, $value)
		{
			$this->delete_chaveprimaria = $key;
			$this->delete_chaveprimaria_value = $value;
		}

		
		public function Set_BD_Update($ativar)
		{
			if ($ativar) :
				$this->modo = 1;
			endif;
		}
		
		
		public function Set_BD_DeletarRegistro($ativar)
		{
			if ($ativar) :
				$this->modo = 2;
			endif;
		}
		
		
		public function Set_RetornoView($page, $view, $parametros)
		{
			$this->retorno_page = $page;
			$this->retorno_view = $view;
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
			$update = new Spw_Mysql_Update();
			$update->Set_Conectar();
			$update->Set_Start($this->start_method, $this->start_value);
			$update->Set_Tabela($this->update_tabela);
			$update->Set_ChavePrimaria($this->update_chaveprimaria, $this->update_chaveprimaria_value);
			$update->Set_Campos(true, $this->update_campo, 'STRING', 'VALUE', '');
			$update->Executar();
			
		}
		
		
		protected function DeletarRegistro()
		{
			$deletar = new Spw_Mysql_Delete();
			$deletar->Set_Conectar();
			$deletar->Set_Start($this->start_method, $this->start_value);
			$deletar->Set_Tabela($this->delete_tabela);
			$deletar->Set_ChavePrimaria($this->delete_chaveprimaria, $this->delete_chaveprimaria_value);
			$deletar->Executar();
			
		}
		
		
		protected function DeletarArquivo()
		{
			if (!empty($this->patch_file)) :
				
				if (file_exists($this->patch_file)) :
					unlink($this->patch_file);
				
				
						else :
							Spw::Mensagem('Este arquivo já deletado anteriormente!');
				
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
						Spw::Mensagem($this->mensagem);
						break;

					case 2 :
						$this->DeletarArquivo();
						$this->DeletarRegistro();
						Spw::Mensagem($this->mensagem);
						break;

					default :
						$this->DeletarArquivo();
						Spw::Mensagem($this->mensagem);
						break;


				endswitch;
			
			endif;
			
		}
		
		
		protected function Retorno()
		{
			if (!empty($this->retorno_view)) :
			
				$redireciona = new Spw_Redirecionar();
				$redireciona->Set_RedirecionarParaView($this->retorno_page, $this->retorno_view, $this->retorno_parametros);
				$redireciona->Executar();

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
