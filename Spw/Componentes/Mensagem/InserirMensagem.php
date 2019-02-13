<?php
     
     namespace Spw\Componentes\Mensagem;

	class InserirMensagem

     {

          // ATRIBUTOS
		
			protected $mensagem;
               protected $id_usuario_logado;
               protected $page;



          // METODOS DE CONFIGURACAO
			
			public function Set_Mensagem($texto)
			{
				$this->mensagem = $texto;
			}



          // METODOS DE PROCESSO
               
               public function __construct()
               {
                    $this->id_usuario_logado = \Spw\Componentes\Wp\Referencias::UsuarioLogado();
                    (isset($_REQUEST['page'])) ? $this->page = $_REQUEST['page'] : $this->page = null;
               }
            
			protected function BancoDeDados()
			{
				$tabela = new \Spw\Componentes\Mysql\CriarTabela();
				$tabela->Set_NomeDaTabela('spw_notificacao');
				$tabela->Set_AdicionarColuna('id_notificacao INT(11) NOT NULL AUTO_INCREMENT');
				$tabela->Set_AdicionarColuna('time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
				$tabela->Set_AdicionarColuna('id_usuario INT(11) NULL');
				$tabela->Set_AdicionarColuna('mensagem LONGTEXT NULL');
				$tabela->Set_AdicionarColuna("page VARCHAR(100) DEFAULT 'N'");
				$tabela->Set_AdicionarColuna("visto CHAR(1) DEFAULT 'N'");
				$tabela->Set_ChavePrimaria('id_notificacao');
				$tabela->Executar();
			}
			
			
			protected function Insert($mensagem)
			{
				$insert = new \Spw\Componentes\Mysql\InserirRegistro();
				$insert->Set_Conectar();
				$insert->Set_Start('VALUE', 1);
				$insert->Set_NomeDaTabela('spw_notificacao');
				$insert->Set_AdicionarRegistro(true, 'id_notificacao', 'ID_NUMERICO', 'VALUE', null);
				$insert->Set_AdicionarRegistro(true, 'id_usuario', 'INT','VALUE', $this->id_usuario_logado ) ;
				$insert->Set_AdicionarRegistro(true, 'mensagem', 'STRING', 'VALUE', $mensagem);
				$insert->Set_AdicionarRegistro(true, 'page', 'STRING', 'VALUE', $this->page);
				$insert->Set_AdicionarRegistro(true, 'visto', 'STRING', 'VALUE', 'N');
				$insert->Executar();
			}
			
			
			protected function SalvarMensagem()
			{
				if (!empty($this->mensagem)) :
					$this->Insert($this->mensagem);
				endif;
			}



          // ALGORITIMO
          public function Executar()

          {
			  $this->BancoDeDados();
			  $this->SalvarMensagem();
          }


      }
