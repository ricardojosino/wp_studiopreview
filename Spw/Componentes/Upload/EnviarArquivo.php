<?php

     namespace Spw\Componentes\Upload;

	class EnviarArquivo
     
     {
          
     // ATRIBUTOS
          
		protected $destino_diretorio;
		protected $destino_arquivo;
		protected $input_name;
		protected $file_name;
		
		protected $start;
		protected $start_method;
		protected $start_value;
		
		protected $arquivo_nome;
		protected $arquivo_tamanho;
		protected $arquivo_tipo;
		protected $arquivo_erro;
		protected $arquivo_diretorio;
		protected $arquivo_extensao;
		
		protected $validacao_extencoes_permitidas;
		protected $validacao_tamanho;
		
		protected $novo_arquivo_nome;
		
		protected $bd_tabela;
		protected $bd_chaveprimaria;
		protected $bd_chaveprimaria_value;
		protected $bd_start_method;
		protected $bd_start_value;
		
		protected $permissao_tipo;
		protected $permissao_tamanho;
		protected $erro;
		
          
          
     // METODOS DE CONFIGURACAO
          
		public function Set_Path($value)
		{
			$this->destino_diretorio = $value;
		}
		
		
		public function Set_NomeDoCampo($value)
		{
			$this->input_name = $value;
		}
		
		
		public function Set_Start($method, $value)
		{
			$this->start_method = $method;
			$this->start_value = $value;
		}
		
		
		public function Set_AtualizarBanco_NomeDaTabela($value)
		{
			$this->bd_tabela = $value;
		}
		
		
		public function Set_AtualizarBanco_ChavePrimmaria($key, $value)
		{
			$this->bd_chaveprimaria = $key;
			$this->bd_chaveprimaria_value = $value;
		}
		
		
		public function Set_Validacao_ExtensaoPermitida($array)
		{
			$this->validacao_extencoes_permitidas[] = strtolower($array);
		}
		
		
		public function Set_Validacao_Tamanho($value_kb)
		{
			$this->validacao_tamanho = \Spw\Componentes\Ferramentas\Pacote::KiloByteParaByte($value_kb);
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
		
		
		protected function CheckErrorServer()
		{
			if ($this->arquivo_erro == 0) :
				$this->permissao_tamanho = true;
				
					else :
						$this->permissao_tamanho = false;
                              $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                              $mensagem->Set_Mensagem( \Spw\Componentes\Upload\Mensagem::FileUploadErrorMessage($this->arquivo_erro) );
                              $mensagem->Executar();
				
			endif;
		}
		
		
		
		protected function CheckExtension()
		{
			
			if (!empty($this->validacao_extencoes_permitidas)) :
			
				if (in_array($this->arquivo_extensao, $this->validacao_extencoes_permitidas) ) :
					$this->permissao_tipo = true;

						else :
							$this->permissao_tipo = false;
							if (!empty($this->arquivo_extensao)) :
                                        $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                                        $mensagem->Set_Mensagem( 'O arquivo não foi enviado! Tipo de arquivo não permitido. ' . \Spw\Componentes\Html\Funcoes::Tag('strong', null, $this->arquivo_extensao) );
                                        $mensagem->Executar();
							endif;

				endif;
			
			endif;
			
		}
		
		
		protected function CheckSize()
		{
			
			if (!empty($this->validacao_tamanho)) :

				if ($this->arquivo_tamanho < $this->validacao_tamanho) :
					$this->permissao_tamanho = true;

						else :
							$this->permissao_tamanho = false;
							if (!empty($this->arquivo_tamanho)) :
								Spw::Mensagem();
                                        $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                                        $mensagem->Set_Mensagem( 'Arquivo não enviado! Este arquivo possui um tamanho maior que ' . \Spw\Componentes\Ferramentas\Pacote::ByteParaKiloByte($this->validacao_tamanho) . 'Kb' );
                                        $mensagem->Executar();
							endif;

				endif;
			
			endif;
		}

		 
		
		protected function DadosArquivo()
		{
			if (!empty($_FILES)) :
			
				$input_name = $this->input_name;

				$this->arquivo_nome = $_FILES[$input_name]['name'];
				$this->arquivo_tipo = $_FILES[$input_name]['type'];
				$this->arquivo_tamanho = $_FILES[$input_name]['size'];
				$this->arquivo_erro = $_FILES[$input_name]['error'];
				$this->arquivo_diretorio = $_FILES[$input_name]['tmp_name'];
				$this->arquivo_extensao = strtolower( end(explode('.', $_FILES[$input_name]['name'])) );

				$this->destino_arquivo = $this->destino_diretorio . '/' . basename($_FILES[$input_name]['name']) ;
			
			endif;
		}
		
		
          
		protected function CriarDiretorio()
		{
               \Spw\Componentes\Ferramentas\Pacote::Diretorio_CriarNovaPasta($this->destino_diretorio);
		}
		
		
		protected function Renomeia()
		{
			$arquivo = $this->destino_arquivo;
			$this->novo_arquivo_nome = \Spw\Componentes\Ferramentas\Pacote::Codigo_Alfanumerico_32() . '.' . $this->arquivo_extensao;
			$arquivo_novo = $this->destino_diretorio . '/' . $this->novo_arquivo_nome;
			
			
			rename($arquivo, $arquivo_novo);
		}
		
		
		protected function Update()
		{
			if (!empty($this->arquivo_nome)) :
			
				$update = new \Spw\Componentes\Mysql\AtualizarRegistro();
				$update->Set_Conectar();
				$update->Set_NomeDaTabela($this->bd_tabela);
				$update->Set_Start($this->start_method, $this->start_value);
				$update->Set_ChavePrimaria($this->bd_chaveprimaria, $this->bd_chaveprimaria_value);
				$update->Set_AdicionarCampo(true, $this->input_name, 'STRING', 'VALUE', $this->novo_arquivo_nome);
				$update->Executar();
			
			endif;
		}
		
		

		protected function Enviar()
		{
			if ($this->start and $this->permissao_tamanho and $this->permissao_tipo and $this->arquivo_erro === UPLOAD_ERR_OK) :
				
				move_uploaded_file($this->arquivo_diretorio, $this->destino_arquivo);
				$this->Renomeia();
				$this->Update();
                    $mensagem = new \Spw\Componentes\Mensagem\InserirMensagem();
                    $mensagem->Set_Mensagem( 'O arquivo ' . $this->arquivo_nome . ' foi enviado com sucesso!' );
                    $mensagem->Executar();
						
			endif;
		}
		
     

     // ALGORITIMO
          
          public function Executar()
          
          {
				$this->Start();
				$this->DadosArquivo();
				$this->CriarDiretorio();
				$this->CheckErrorServer();
				$this->CheckSize();
				$this->CheckExtension();
				$this->Enviar();
               
          }
          
          
     }