<?php

	class Spw_UI_Admin_Pop

     {

          // ATRIBUTOS

			protected $titulo;
			protected $contents;
			protected $id;
			protected $link_fechar;
			
		
			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_Titulo($value)
			{
				$this->titulo = $value;
			}
			
			
			public function Set_AddContent($value)
			{
				if (!empty($value)) :
					$this->contents[] = $value;
				endif;
			}
			
			
			public function Set_Id($value)
			{
				$this->id = $value;
			}
			
			
			public function Set_Fechar($link)
			{
				$this->link_fechar = $link;
			}

			
			

          // METODOS DE PROCESSO
			
			
			protected function Titulo()
			{
				return (!empty($this->titulo)) ? Spw_Html::Tag('h1', null, $this->titulo) : null;
			}
			
			
			protected function Header()
			{
				$array[] = '<div class="spw-ui-pop-header">';
				$array[] = Spw_Html::Tag('div', array('class' => 'spw-col-01'), $this->Titulo());
				$array[] = Spw_Html::Tag('div', array('class' => 'spw-col-02'), Spw_Html::Tag('a', array('class' => 'fa fa-times', 'aria-hidden' => 'true', 'href' => $this->link_fechar), null)  );
				$array[] = '</div>';
				
				return join(' ', $array);
			}
			
			
			protected function Contents()
			{
				$view = (isset($_GET['popview'])) ? $_GET['popview'] : null;
				
				ob_start();
					include Spw_App_Diretorio::View('pessoas', $view);
				return ob_get_clean();
			}
			
			
			protected function Mensagem()
			{
				$panel_mensagem = new Spw_UI_Admin_Panel_Mensagem();
				$panel_mensagem->Executar();
				
				return $panel_mensagem->render;
			}


			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-pop">';
				$this->view[] = $this->Header();
				$this->view[] = $this->Mensagem();
				$this->view[] = Spw_Html::Tag('div', array('class' => 'spw-ui-pop-contents'), $this->Contents() );
				$this->view[] = '';
				$this->view[] = '';
				$this->view[] = '</div>';
			}
			
			
			protected function Render()
			{
				$pop_id = (isset($_GET['pop'])) ? $_GET['pop'] : null;
				
				if ($this->id == $pop_id and !empty($this->id)) :
					$this->render = Spw::View($this->view);
				endif;
			}
			
			

          // ALGORITIMO

          public function Executar()

          {

			  $this->Template();
			  $this->Render();

          }


      }