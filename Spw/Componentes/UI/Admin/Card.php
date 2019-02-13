<?php
     
     namespace Spw\Componentes\UI\Admin;

	class Card

	{

		// ATRIBUTOS
		
			protected $itens;

			protected $view;
			public $render;

		// METODOS DE CONFIGURACAO
			
			public function Set_AdicionarItem($id, $titulo, $descricao, $link, $componente = null)
			{
				$this->itens[] = array('id' => $id, 'titulo' => $titulo, 'descricao' => $descricao, 'botao_link' => $link, 'componente' => $componente);
			}



		// METODOS DE PROCESSO
			
			
			protected function Titulo($value)
			{
				if (!empty($value)) :
					
					return '<div class="spw-titulo">' . $value . '</div>';
					
				endif;
			}
			
			
			protected function Descricao($value)
			{
				if (!empty($value)) :
					
					return '<div class="spw-descricao">' . $value . '</div>';
					
				endif;
			}
			
			
			
			protected function Botao( $id, $botao_link, $botao_titulo)
			{
				if (!empty($botao_link) and !empty($botao_titulo)) :
					
                         $botao = new \Spw\Componentes\UI\Admin\Botao();
                         $botao->Set_AdicionarBotao_Info($id, $botao_titulo, $botao_link, null);
                         $botao->Executar();
					
					return '<div class="spw-botao-card">' . $botao->render . '</div>';
				
				endif;
				
			}
			
			
			
			protected function Itens()
			{
				if (!empty($this->itens)) :
					
					
					foreach ($this->itens AS $item ) :
				
						$array[] = '<div class="spw-item">';
                              $array[] = '<a ' . \Spw\Componentes\Html\Funcoes::Atributos( array( 'id' => $item['id'], 'href' => $item['botao_link'] ) ) . '"></a>';
						$array[] = '<div class="spw-wrap">';
						$array[] = $this->Titulo($item['titulo']);
						$array[] = $this->Descricao($item['descricao']);
                              $array[] = $item['componente'];
						$array[] = '</div>';
						$array[] = '</div>';
					
					endforeach;
				
					return join(' ', $array);
					
				endif;
				
				
			}
			
			
			
			protected function Card()
			{
				
				$this->view[] = '<div class="spw-ui-card">';
				$this->view[] = $this->Itens();
				$this->view[] = '</div>';
				
				
			}
			
			
			protected function Render()
			{
				$this->render = \Spw\Componentes\Funcoes::Render($this->view);
			}



		// ALGORITIMO

		public function Executar()

		{
			$this->Card();
			$this->Render();

		}


	 }