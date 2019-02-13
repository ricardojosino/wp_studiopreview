<?php

     class Spw_UI_Components_TituloDescricaoImagem

     {

          // ATRIBUTOS
		 
			protected $titulo;
			protected $descricao;
			protected $imagem;
			protected $layout;
			protected $margin_top;
			protected $margin_bottom;
			protected $botao_texto;
			protected $botao_link;
			protected $botao_link_download;
			protected $botao_link_target;
			
			protected $style_botao_background_color;
			protected $style_botao_color;
			protected $style_botao_font_size;
			protected $style_botao_font_weight;
			protected $style_botao_text_transform;
			protected $style_botao_text_align;
			protected $style_botao_width;
			protected $style_botao_height;
			protected $style_botao_border_radius;
			protected $style_titulo_color;
			protected $style_descricao_color;
			protected $style_imagem_background_size;
		 
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
			
			
			public function Set_Imagem($src)
			{
				$this->imagem = $src;
			}
			
			
			public function Set_Botao_Texto($value)
			{
				$this->botao_texto = $value;
			}
			
			
			public function Set_Botao_Link($value)
			{
				$this->botao_link = $value;
			}
			
			
			public function Set_Botao_Link_Target($value)
			{
				$this->botao_link_target = $value;
			}
			
			
			public function Set_Botao_Link_Download($value)
			{
				$this->botao_link_download = $value;
			}
			
			
			public function Set_Layout($value)
			{
				$this->layout = $value;
			}
			
			
			public function Set_Style_MarginTop($value)
			{
				$this->margin_top = $value;
			}
			
			
			public function Set_Style_MarginBottom($value)
			{
				$this->margin_bottom = $value;
			}
			
			
			public function Set_Style_Botao_Color($value)
			{
				$this->style_botao_color = $value;
			}
			
			
			public function Set_Style_Botao_FontSize($value)
			{
				$this->style_botao_font_size = $value;
			}
			
			
			public function Set_Style_Botao_FontWeight($value)
			{
				$this->style_botao_font_weight = $value;
			}
			
			
			public function Set_Style_Botao_BackgroundColor($value)
			{
				$this->style_botao_background_color = $value;
			}
			
			
			public function Set_Style_Botao_Width($value)
			{
				$this->style_botao_width = $value;
			}
			
			
			public function Set_Style_Botao_Height($value)
			{
				$this->style_botao_height = $value;
			}
			
			
			public function Set_Style_Botao_BorderRadius($value)
			{
				$this->style_botao_border_radius = $value;
			}
			
			
			public function Set_Style_Botao_TextAlign($value)
			{
				$this->style_botao_text_align = $value;
			}
			
			
			public function Set_Style_Botao_TextTransform($value)
			{
				$this->style_botao_text_transform = $value;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->style_titulo_color = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->style_descricao_color = $value;
			}
			
			
			public function Set_Style_Imagem_BackgroundSize($value)
			{
				$this->style_imagem_background_size = $value;
			}



          // METODOS DE PROCESSO
			
			protected function Titulo()
			{
				return Spw_Html::Tag('h2', array( 'class' => 'spw-ui-titulo-3', 'style' => Spw_Html::AttributesValue(array('color' => $this->style_titulo_color)) ), $this->titulo);
			}
			
			
			protected function Descricao()
			{
				return Spw_Html::Tag('p', array('style' => Spw_Html::AttributesValue( array('color' => $this->style_descricao_color) )), $this->descricao);
			}
			
			
			protected function Botao()
			{
				if (!empty($this->botao_link)) :
				
					$botao = new Spw_UI_Components_Botao();
					$botao->Set_Texto($this->botao_texto);
					$botao->Set_Link($this->botao_link);
					$botao->Set_Link_Target($this->botao_link_target);
					$botao->Set_Download($this->botao_link_download);
					$botao->Set_Style_BackgroundColor($this->style_botao_background_color);
					$botao->Set_Style_Color($this->style_botao_color);
					$botao->Set_Style_FontSize($this->style_botao_font_size);
					$botao->Set_Style_FontWeight($this->style_botao_font_weight);
					$botao->Set_Style_TextTransform($this->style_botao_text_transform);
					$botao->Set_Style_TextAlign($this->style_botao_text_align);
					$botao->Set_Style_Width($this->style_botao_width);
					$botao->Set_Style_Height($this->style_botao_height);
					$botao->Set_Style_BorderRadius($this->style_botao_border_radius);
					$botao->Executar();
					
					return $botao->render;
				
				endif;
			}
			
			
			protected function Box01()
			{
				return Spw_Html::Tag('div', array('class' => 'spw-box-01 ' . $this->Box01Margin(), 'style' => Spw_Html::AttributesValue( array( 'height' => $this->Box01Height($this->style_imagem_background_size), 'background-image' => Spw_Html::Url($this->imagem), 'background-size' => $this->style_imagem_background_size ) ) ), null);
			}
			
			
			protected function Box01Margin()
			{
				switch($this->layout) :
					
					case 1 :
						return 'spw-margin-right';
						break;
					
					case 2 :
						return 'spw-margin-left';
						break;
					
					default :
						return 'spw-margin-right';
						
					
				endswitch;
				
				
			}
			
			
			protected function Box01Height($background_size)
			{
				if ($background_size == 'auto') :
					return 'auto';
					
						else :
							return null;
					
				endif;
			}
			
			
			protected function Box02()
			{
				$array[] = '<div class="spw-box-02">';
				$array[] = $this->Titulo();
				$array[] = $this->Descricao();
				$array[] = $this->Botao();
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			
			protected function Template01()
			{
				$this->view[] = '<div class="spw-ui-components-titulo-descricao-imagem" ' . Spw_Html::Attributes( array( 'style' =>  Spw_Html::AttributesValue( array('margin-top' => $this->margin_top, 'margin-bottom' => $this->margin_bottom) ) ) ) . '>';
				$this->view[] = '<div class="spw-wrap">'; 
				$this->view[] = $this->Box01();
				$this->view[] = $this->Box02();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function Template02()
			{
				$this->view[] = '<div class="spw-ui-components-titulo-descricao-imagem" ' . Spw_Html::Attributes( array( 'style' =>  Spw_Html::AttributesValue( array('margin-top' => $this->margin_top, 'margin-bottom' => $this->margin_bottom) ) ) ) . '>';
				$this->view[] = '<div class="spw-wrap">'; 
				$this->view[] = $this->Box02();
				$this->view[] = $this->Box01();
				$this->view[] = '</div>';
				$this->view[] = '</div>';
			}
			
			
			protected function Template()
			{
				switch($this->layout) :
					
					case 1 :
						$this->Template01();
						break;;
						
					case 2 :
						$this->Template02();
						break;
					
					default :
						$this->Template01();
						break;
					
				endswitch;
			}
			
			
			protected function Style()
			{
				//$this->view[] = Spw_Html::Tag('style', array('scoped' => ''), file_get_contents( Spw_Lib_Diretorio::Css('Spw_UI_Components_TituloDescricaoImagem') ) );
			}
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {
			  $this->Style();
			  $this->Template();
			  $this->Render();
          }


      }