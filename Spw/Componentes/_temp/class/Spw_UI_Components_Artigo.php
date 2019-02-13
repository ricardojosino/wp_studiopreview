<?php

	class Spw_UI_Components_Artigo

     {

          // ATRIBUTOS
		
			protected $url_imagem;
			protected $titulo;
			protected $titulo_color;
			protected $titulo_font_size;
			protected $descricao;
			protected $descricao_color;
			protected $descricao_font_size;
			protected $link;
			protected $link_border_color;
			protected $background_color;

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
				$this->url_imagem = $url;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->titulo_color = $value;
			}
			
			
			public function Set_Style_Titulo_FontSize($value)
			{
				$this->titulo_font_size = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->descricao_color = $value;
			}
			
			
			public function Set_Style_Descricao_FontSize($value)
			{
				$this->descricao_font_size = $value;
			}
			
			
			public function Set_Style_Link_BorderColor($value)
			{
				$this->link_border_color = $value;
			}
			
			
			public function Set_Style_BackgroundColor($value)
			{
				$this->background_color = $value;
			}
			
			
			public function Set_Link($value)
			{
				$this->link = $value;
			}
			


          // METODOS DE PROCESSO
			
			
			protected function Imagem()
			{
				return Spw_Html::Tag('div', array( 'class' => 'spw-imagem', 'style' => array( 'background-image' => Spw_Html::Url($this->url_imagem), 'background-color' => '#EEE', 'background-repeat' => 'no-repeat', 'background-size' => 'cover' )   ), null);
			}
			
			
			protected function Titulo()
			{
				return Spw_Html::Tag('h2', array('class' => 'spw-titulo' , 'style' => array('color' => $this->titulo_color, 'font-size' => $this->titulo_font_size) ), $this->titulo);
			}
			
			
			protected function Descricao()
			{
				return Spw_Html::Tag('p', array( 'class' => 'spw-descricao', 'style' => array( 'color' => $this->descricao_color, 'font-size' => $this->descricao_font_size ) ), $this->descricao);
			}
			
			
			protected function Content()
			{
				$this->view[] = '<div class="spw-ui-components-artigo spw-item" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array( 'background-color' => $this->background_color ) )) ) . '>';
				$this->view[] = Spw_Html::Tag('a', array( 'href' => $this->link ), null);
				$this->view[] = $this->Imagem();
				$this->view[] = '<div class="spw-wrap">';
				$this->view[] = $this->Titulo();
				$this->view[] = $this->Descricao();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function StyleDinamico()
			{
				$this->view[] = (!empty($this->link_border_color) ? Spw_Html::Tag('style', array('scoped' => ''), '.spw-ui-components-artigo a:hover {border: 5px solid ' . $this->link_border_color . '}') : null );
			}
			
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->StyleDinamico();
			  $this->Content();
			  $this->Render();

          }


      }