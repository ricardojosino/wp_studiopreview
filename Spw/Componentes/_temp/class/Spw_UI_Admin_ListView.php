<?php

	class Spw_UI_Admin_ListView

     {

          // ATRIBUTOS
		
			protected $itens;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_AddItem($titulo, $descricao, $link)
			{
				$this->itens[] = $this->Item($titulo, $descricao, $link);
			}



          // METODOS DE PROCESSO
			
			
			protected function Titulo($value)
			{
				if (!empty($value)) :
					return Spw_Html::Tag('div', array('class' => 'spw-ui-titulo'), $value);
				endif;
			}
			
			
			protected function Descricao($value)
			{
				if (!empty($value)) :
					return Spw_Html::Tag('p', array('class' => 'spw-ui-descricao'), $value);
				endif;
			}
			
			
			protected function Link($link)
			{
				return Spw_Html::Tag('a', array('href' => $link), null);
			}
			
			
			protected function Item($titulo, $descricao, $link)
			{
				$array[] = '<li>';
				$array[] = $this->Link($link);
				$array[] = $this->Titulo($titulo);
				$array[] = $this->Descricao($descricao);
				$array[] = '</li>';
				
				return join('', $array);
			}
			
			
			
			protected function Itens()
			{
				if (!empty($this->itens)) :
					return join('', $this->itens);
				endif;
				
			}
			
			
			protected function Content()
			{
				
				$this->view[] = '<div class="spw-list-view">';
				$this->view[] = '<ul>';
				$this->view[] = $this->Itens();
				$this->view[] = '</ul>';
				$this->view[] = '</div>';
				
			}
			
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Content();
			  $this->Render();

          }


      }
