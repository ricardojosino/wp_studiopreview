<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Painel_ExibirMensagens

     {

          // ATRIBUTOS
		
			protected $result_mensagens;
			protected $rows_mensagens;
			protected $mensagens;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_AdicionarMensagem($mensagem)
			{
				$this->mensagens[] = $mensagem;
			}


          // METODOS DE PROCESSO
			
			protected function Dados()
			{
				
				$id_usuario = \Spw\Componentes\Wp\Referencias::UsuarioLogado();
				$page = $_REQUEST['page'];
				
				$dados = new \Spw\Componentes\Mysql\Selecionar();
				$dados->Set_Conectar();
				$dados->Set_Start('VALUE', 1);
				$dados->Set_AdicionarQuery('SELECT *');
				$dados->Set_AdicionarQuery('FROM spw_notificacao n');
				$dados->Set_AdicionarQuery("WHERE n.visto = 'N' AND n.id_usuario = '$id_usuario' AND n.page = '$page' " );
				$dados->Set_AdicionarQuery('ORDER BY mensagem ASC');
				$dados->Executar();
				
				$this->result_mensagens = $dados->result;
				$this->rows_mensagens = $dados->rows;
				
			}
			
			
			
			protected function Fechar()
			{
				return \Spw\Componentes\Html\Funcoes::Tag('div', array( 'id' => 'spw-botao-fechar', 'class' => 'spw-botao-fechar'), 'Fechar');
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
				$update = new \Spw\Componentes\Mysql\AtualizarRegistro();
				$update->Set_Start('VALUE', 1);
				$update->Set_Conectar();
				$update->Set_NomeDaTabela('spw_notificacao');
				$update->Set_ChavePrimaria('id_notificacao', $id_notificacao);
				$update->Set_AdicionarCampo(true, 'visto', 'STRING', 'VALUE', 'Y');
				$update->Executar();
				
			}
			
			
			protected function Mensagens()
			{
				if (!empty($this->mensagens)) :
					
					foreach($this->mensagens AS $item) :
					
						$array[] = \Spw\Componentes\Html\Funcoes::Tag('div', array('class' => 'spw-item'), $item);
					
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
                    $script[] = "jQuery(document).ready(function(){";
                    $script[] = "jQuery('#spw-botao-fechar').click(function(){";
                    $script[] = "jQuery('#spw-panel-mensagem').hide();";
                    $script[] = "});";
                    $script[] = "});";
                    
                    $script = join('', $script);
                    
                    
				$this->view[] = \Spw\Componentes\Html\Funcoes::Tag('script', null, $script);
			}
			
			
			protected function Render()
			{
				$this->render = \Spw\Componentes\Funcoes::Render($this->view);
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