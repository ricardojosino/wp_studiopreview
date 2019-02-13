<?php
	
	class Spw_UI_Components_CardEndereco

     {

          // ATRIBUTOS
		
			protected $icone;
			protected $descricao;
			protected $titulo;
			protected $subtitulo;
			protected $link;
			protected $link_target = '_self';

			protected $style_background_color;
			protected $style_titulo_color;
			protected $style_subtitulo_color;
			protected $style_descricao_color;
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_Icone($value)
			{
				$this->icone = $value;
			}
			
			
			public function Set_Descricao($value)
			{
				$this->descricao = $value;
			}
			
			
			public function Set_Titulo($value)
			{
				$this->titulo = $value;
			}
			
			
			public function Set_SubTitulo($value)
			{
				$this->subtitulo = $value;
			}
			
			
			public function Set_Link($value)
			{
				$this->link = $value;
			}
			
			
			public function Set_Link_Target($value)
			{
				$this->link_target = $value;
			}
			
			
			public function Set_Style_BackgroundColor($value)
			{
				$this->style_background_color = $value;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->style_titulo_color = $value;
			}
			
			
			public function Set_Style_SubTitulo_Color($value)
			{
				$this->style_subtitulo_color = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->style_descricao_color = $value;
			}



          // METODOS DE PROCESSO
			
			protected function Icone()
			{
				if (!empty($this->icone)) :
				
					$array[] = '<div class="spw-card-icone">';
					$array[] = Spw_Html::Tag('img', array('src' => $this->icone), null);
					$array[] = '</div>';

					return join('', $array);
				
				endif;
				
			}
			
			
			protected function Titulo()
			{
				if (!empty($this->titulo)) :
					
					return Spw_Html::Tag('h3', array('class' => 'spw-ui-titulo-3', 'style' => Spw_Html::AttributesValue( array('color' => $this->style_titulo_color) )), $this->titulo);
					
				endif;
			}
			
			
			
			protected function Descricao()
			{
				if (!empty($this->descricao)) :
					
					return Spw_Html::Tag('p', array('class' => 'spw-ui-descricao', 'style' => Spw_Html::AttributesValue( array('color' => $this->style_descricao_color) )), $this->descricao);
					
				endif;
			}
			
			
			protected function SubTitulo()
			{
				if (!empty($this->subtitulo)) :
					
					return Spw_Html::Tag('strong', array('class' => 'spw-card-subtitulo', 'style' => Spw_Html::AttributesValue( array('color' => $this->style_subtitulo_color) )), $this->subtitulo);
					
				endif;
			}
			
			
			protected function Link()
			{
				if (!empty($this->link)) :
					return Spw_Html::Tag('a', array('href' => $this->link, 'target' => $this->link_target ), null) ;
				endif;
			}
			
			
			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-components-card-endereco" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array('background-color' => $this->style_background_color) )) ) . '>';
				$this->view[] = $this->Link();
				$this->view[] = $this->Icone();
				$this->view[] = $this->Titulo();
				$this->view[] = $this->Descricao();
				$this->view[] = $this->SubTitulo();
				$this->view[] = '</div>';
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->Template();
			  $this->Render();

          }


      }
