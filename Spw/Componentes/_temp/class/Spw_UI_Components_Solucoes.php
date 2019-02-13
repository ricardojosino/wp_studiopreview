<?php

	class Spw_UI_Components_Solucoes

     {

          // ATRIBUTOS
		
			protected $background_color;
			protected $titulo;
			protected $titulo_color;
			protected $descricao;
			protected $descricao_color;
			protected $imagem;
			protected $botao_exibir;
			protected $botao_texto;
			protected $botao_link;
			protected $botao_color;
			protected $botao_background;
			protected $margin_top;
			protected $margin_bottom;
			protected $layout;
			
			protected $view;
			public $render;


          // METODOS DE CONFIGURACAO
			
			public function Set_Titulo($value)
			{
				$this->titulo = $value;
			}
			
			
			public function Set_Descricao($value)
			{
				$this->descricao = $value;
			}
			
			
			public function Set_Imagem($url)
			{
				$this->imagem = $url;
			}
			
			
			public function Set_Botao_Exibir($value)
			{
				$this->botao_exibir = $value;
			}
			
			
			public function Set_Botao_Titulo($value)
			{
				$this->botao_texto = $value;
			}
			
			
			public function Set_Botao_Link($value)
			{
				$this->botao_link = $value;
			}
			
			
			public function Set_Style_Background_Color($value)
			{
				$this->background_color = $value;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->titulo_color = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->descricao_color = $value;
			}
			
			
			public function Set_Style_Botao_BackgroundColor($value)
			{
				$this->botao_background = $value;
			}
			
			
			public function Set_Style_Botao_Color($value)
			{
				$this->botao_color = $value;
			}
			
			
			public function Set_Style_Margem_Topo($value)
			{
				$this->margin_top = $value;
			}
			
			
			public function Set_Style_Margem_Baixo($value)
			{
				$this->margin_bottom = $value;
			}
			
			
			public function Set_Layout($value)
			{
				$this->layout = $value;
			}
			
			


          // METODOS DE PROCESSO
			
			protected function Box01()
			{
				return Spw_Html::Tag('div', array( 'class' => 'spw-box-left', 'style' => array('background-image' => Spw_Html::Url($this->imagem), 'background-position' => 'top', 'background-repeat' => 'no-repeat', 'background-size' => 'cover') ), null);
			}
			
			
			protected function Box02()
			{
				$array[] = $this->Titulo();
				$array[] = $this->Descricao();
				$array[] = $this->Botao();
				
				return Spw_Html::Tag('div', array('class' => 'spw-box-right'), join('', $array));
			}
			
			
			protected function Titulo()
			{
				if (!empty($this->titulo)) :
					
					return Spw_Html::Tag('h2', array('class' => 'spw-ui-titulo-2', 'style' => array('color' => $this->titulo_color)), $this->titulo);
					
				endif;
			}
			
			
			protected function Descricao()
			{
				if (!empty($this->descricao)) :
					
					return Spw_Html::Tag('p', array( 'class' => 'spw-descricao', 'style' => array( 'color' => $this->descricao_color ) ), $this->descricao);
					
				endif;
			}
			
			
			protected function Botao()
			{
				if ($this->botao_exibir) :
					return Spw_Html::Tag('div', array('class' => 'spw-botao'), Spw_Html::Tag('a', array( 'href' => $this->botao_link, 'style' => array( 'background-color' => $this->botao_background, 'color' => $this->botao_color ) ), $this->botao_texto));
				endif;
			}
			
			
			protected function Layout01()
			{
				$this->view[] = '<div class="spw-ui-components-solucoes" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array('margin-bottom' => $this->margin_bottom, 'margin-top' => $this->margin_top) )) ) . '>';
				$this->view[] = '<div class="spw-box">';
				$this->view[] = $this->Box01();
				$this->view[] = $this->Box02();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function Layout02()
			{
				$this->view[] = '<div class="spw-ui-components-solucoes" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array('margin-bottom' => $this->margin_bottom, 'margin-top' => $this->margin_top) )) ) . '>';
				$this->view[] = '<div class="spw-box">';
				$this->view[] = $this->Box02();
				$this->view[] = $this->Box01();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function Content()
			{
				switch($this->layout) :
					
					case 1 : $this->Layout01();
						break;
					
					case 2 : $this->Layout02();
						break;
					
					default :
						$this->Layout01();
					
				endswitch;
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

