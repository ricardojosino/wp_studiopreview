<?php


	class Spw_UI_Admin_Panel_Mensagem

     {

          // ATRIBUTOS
		
			protected $result_mensagens;
			protected $rows_mensagens;
			protected $mensagens;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_AddMensagem($mensagem)
			{
				$this->mensagens[] = $mensagem;
			}



          // METODOS DE PROCESSO
			
			protected function Dados()
			{
				
				$id_usuario = Spw_Wp::UsuarioLogado();
				$page = $_GET['page'];
				
				$dados = new Spw_Mysql_Select();
				$dados->Set_Conectar();
				$dados->Set_Start('VALUE', 1);
				$dados->Set_AddQuery('SELECT *');
				$dados->Set_AddQuery('FROM spw_notificacao n');
				$dados->Set_AddQuery("WHERE n.visto = 'N' AND n.id_usuario = '$id_usuario' AND n.page = '$page' " );
				$dados->Set_AddQuery('ORDER BY mensagem ASC');
				$dados->Executar();
				
				$this->result_mensagens = $dados->result;
				$this->rows_mensagens = $dados->rows;
				
			}
			
			
			
			protected function Fechar()
			{
				return Spw_Html::Tag('div', array( 'id' => 'spw-botao-fechar', 'class' => 'spw-botao-fechar'), 'Fechar');
			}
			
			
			protected function MensagensRegistradas()
			{
				if (!empty($this->rows_mensagens)) :
					
					do {
					
						$this->mensagens[] = $this->rows_mensagens['mensagem'];
						$this->Update($this->rows_mensagens['id_notificacao']);
					
					} while ($this->rows_mensagens = mysqli_fetch_assoc($this->result_mensagens));
					
				endif;
			}
			
			
			protected function Update($id_notificacao)
			{
				$update = new Spw_Mysql_Update();
				$update->Set_Start('VALUE', 1);
				$update->Set_Conectar();
				$update->Set_Tabela('spw_notificacao');
				$update->Set_ChavePrimaria('id_notificacao', $id_notificacao);
				$update->Set_Campos(true, 'visto', 'STRING', 'VALUE', 'Y');
				$update->Executar();
				
			}
			
			
			protected function Mensagens()
			{
				if (!empty($this->mensagens)) :
					
					foreach($this->mensagens AS $item) :
					
						$array[] = Spw_Html::Tag('div', array('class' => 'spw-item'), $item);
					
					endforeach;
					
					return join('', $array);
					
				endif;
			}
			
			
			protected function Template()
			{
				
				if (!empty($this->mensagens)) :
				
					$this->view[] = '<div id="spw-panel-mensagem" class="spw-panel-mensagem">';
					$this->view[] = $this->Fechar();
					$this->view[] = $this->Mensagens();
					$this->view[] = '</div>';
				
				endif;
			}
			
			
			protected function Script()
			{
				$this->view[] = Spw_Html::Tag('script', null, file_get_contents(Spw_Lib_Diretorio::javaScript('Spw_UI_Admin_Panel_Mensagem')));
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->Dados();
			  $this->Script();
			  $this->MensagensRegistradas();
			  $this->Template();
			  $this->Render();


          }


      }