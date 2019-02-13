<?php

	class Spw_UI_Admin_Card

	{

		// ATRIBUTOS
		
			protected $itens;

			protected $view;
			public $render;

		// METODOS DE CONFIGURACAO
			
			public function Set_AddItem($id, $titulo, $descricao, $botao_link, $botao_titulo)
			{
				$this->itens[] = array('id' => $id, 'titulo' => $titulo, 'descricao' => $descricao, 'botao_link' => $botao_link, 'botao_titulo' => $botao_titulo);
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
			
			
			
			protected function Botao($botao_link, $botao_titulo)
			{
				if (!empty($botao_link) and !empty($botao_titulo)) :
					
					$botao = new Spw_UI_Admin_BotaoPrimario();
					$botao->Set_AddBotaoInfo('rd-station', $botao_titulo, $botao_link, '');
					$botao->Executar();
					
					return '<div class="spw-botao-card">' . $botao->render . '</div>';
				
				endif;
				
				
				
				
			}
			
			
			
			protected function Itens()
			{
				if (!empty($this->itens)) :
					
					
					foreach ($this->itens AS $item ) :
				
						$array[] = '<div class="spw-item">';
						$array[] = '<div class="spw-wrap">';
						$array[] = $this->Titulo($item['titulo']);
						$array[] = $this->Descricao($item['descricao']);
						$array[] = $this->Botao($item['botao_link'], $item['botao_titulo']);
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
				$this->render = spw_view($this->view);
			}



		// ALGORITIMO

		public function Executar()

		{
			$this->Card();
			$this->Render();


		}


	 }