<?php

	class Spw_Mensagem

     {

          // ATRIBUTOS
		
			protected $mensagem;



          // METODOS DE CONFIGURACAO
			
			public function Set_Mensagem($value)
			{
				$this->mensagem = $value;
			}



          // METODOS DE PROCESSO
		
			protected function BancoDeDados()
			{
				$tabela = new Spw_Mysql_CriarTabela();
				$tabela->Set_Tabela('spw_notificacao');
				$tabela->Set_Add_Coluna('id_notificacao INT(11) NOT NULL AUTO_INCREMENT');
				$tabela->Set_Add_Coluna('time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
				$tabela->Set_Add_Coluna('id_usuario INT(11) NULL');
				$tabela->Set_Add_Coluna('mensagem LONGTEXT NULL');
				$tabela->Set_Add_Coluna("page VARCHAR(100) DEFAULT 'N' ");
				$tabela->Set_Add_Coluna("visto CHAR(1) DEFAULT 'N' ");
				$tabela->Set_PrimaryKey('id_notificacao');
				$tabela->Executar();
			}
			
			
			protected function Insert($mensagem)
			{
				$insert = new Spw_Mysql_Insert();
				$insert->Set_Conectar();
				$insert->Set_Start('VALUE', 1);
				$insert->Set_Tabela('spw_notificacao');
				$insert->Set_AddRegistro(true, 'id_notificacao', 'ID_NUMERICO', 'VALUE', null);
				$insert->Set_AddRegistro(true, 'id_usuario', 'INT','VALUE', Spw_Wp::UsuarioLogado() ) ;
				$insert->Set_AddRegistro(true, 'mensagem', 'STRING', 'VALUE', $mensagem);
				$insert->Set_AddRegistro(true, 'page', 'STRING', 'VALUE', $_GET['page']);
				$insert->Set_AddRegistro(true, 'visto', 'STRING', 'VALUE', 'N');
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
