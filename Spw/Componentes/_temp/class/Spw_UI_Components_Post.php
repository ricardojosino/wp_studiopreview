<?php

	class Spw_UI_Components_Post

     {

          // ATRIBUTOS
		
			protected $imagem;
			protected $titulo;
			protected $descricao;
			protected $botao_texto;
			protected $botao_link;
			protected $botao_link_target = '_self';
			protected $botao_download;
			protected $layout;
			protected $barra_exibir = true;
			
			protected $style_background_color;
			protected $style_border_exibir;
			protected $style_border_width;
			protected $style_border_color;
			protected $style_titulo_color;
			protected $style_titulo_fontsize;
			protected $style_descricao_color;
			protected $style_descricao_fontsize;
			protected $style_margin_top;
			protected $style_margin_bottom;
			protected $style_imagem_background_size;
			protected $style_imagem_width;
			protected $style_imagem_height;
			protected $style_texto_padding;
			protected $style_texto_align_content;
			protected $style_botao_background_color;
			protected $style_botao_color;
			protected $style_botao_width;
			protected $style_botao_height;
			protected $style_botao_border_radius;
			protected $style_botao_font_size;
			protected $style_botao_font_weight;
			protected $style_botao_text_transform;
			protected $style_botao_text_align;
			protected $style_barra_color;
			protected $style_barra_height;
			protected $style_barra_margin_top;
			protected $style_barra_margin_bottom;
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_Imagem($value)
			{
				$this->imagem = $value;
			}
			
			
			public function Set_Titulo($value)
			{
				$this->titulo = $value;
			}
			
			
			public function Set_Descricao($value)
			{
				$this->descricao = $value;
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
			
			
			public function Set_Botao_Download($value)
			{
				$this->botao_download = $value;
			}
			
			
			public function Set_Barra_Exibir($value)
			{
				$this->barra_exibir = $value;
			}
			
			
			public function Set_Layout($value)
			{
				$this->layout = $value;
			}
			
			
			public function Set_Style_BackgroundColor($value)
			{
				$this->style_background_color = $value;
			}
			
			
			public function Set_Style_Border_Exibir($value)
			{
				$this->style_border_exibir = $value;
			}
			
			
			public function Set_Style_Border_Width($value)
			{
				$this->style_border_width = $value;
			}
			
			
			public function Set_Style_Border_Color($value)
			{
				$this->style_border_color = $value;
			}
			
			
			public function Set_Style_MarginTop($value)
			{
				$this->style_margin_top = $value;
			}
			
			
			public function Set_Style_MarginBottom($value)
			{
				$this->style_margin_bottom = $value;
			}
			
			
			public function Set_Style_Texto_Padding($value)
			{
				$this->style_texto_padding = $value;
			}
			
			
			public function Set_Style_Texto_AlignContent($value)
			{
				$this->style_texto_align_content = $value;
			}
			
			
			public function Set_Style_Titulo_Color($value)
			{
				$this->style_titulo_color = $value;
			}
			
			
			public function Set_Style_Titulo_FontSize($value)
			{
				$this->style_titulo_fontsize = $value;
			}
			
			
			public function Set_Style_Descricao_Color($value)
			{
				$this->style_descricao_color = $value;
			}
			
			
			public function Set_Style_Descricao_FontSize($value)
			{
				$this->style_descricao_fontsize = $value;
			}
			
			
			public function Set_Style_Imagem_Background_Size($value)
			{
				$this->style_imagem_background_size = $value;
			}
			
			
			public function Set_Style_Imagem_Width($value)
			{
				$this->style_imagem_width = $value;
			}
			
			
			public function Set_Style_Imagem_Height($value)
			{
				$this->style_imagem_height = $value;
			}
			
			
			public function Set_Style_Botao_BackgroundColor($value)
			{
				$this->style_botao_background_color = $value;
			}
			
			
			public function Set_Style_Botao_Color($value)
			{
				$this->style_botao_color = $value;
			}
			
			
			public function Set_Style_Botao_Width($value)
			{
				$this->style_botao_width = $value;
			}
			
			
			public function Set_Style_Botao_Height($value)
			{
				$this->style_botao_height = $value;
			}
			
			
			public function Set_Style_Botao_FontSize($value)
			{
				$this->style_botao_font_size = $value;
			}
			
			
			public function Set_Style_Botao_FontWeight($value)
			{
				$this->style_botao_font_weight = $value;
			}
			
			
			public function Set_Style_Botao_TextTransform($value)
			{
				$this->style_botao_text_transform = $value;
			}
			
			
			public function Set_Style_Botao_TextAlign($value)
			{
				$this->style_botao_text_align = $value;
			}
			
			
			public function Set_Style_Botao_BorderRadius($value)
			{
				$this->style_botao_border_radius = $value;
			}
			
			
			public function Set_Style_Barra_Color($value)
			{
				$this->style_barra_color = $value;
			}
			
			
			public function Set_Style_Barra_Height($value)
			{
				$this->style_barra_height = $value;
			}
			
			
			public function Set_Style_Barra_MarginTop($value)
			{
				$this->style_barra_margin_top = $value;
			}
			
			
			public function Set_Style_Barra_MarginBottom($value)
			{
				$this->style_barra_margin_bottom = $value;
			}



          // METODOS DE PROCESSO
			
			protected function BoxImagem()
			{
				$array[] = '<div class="spw-box-imagem" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array( 'max-width' => $this->style_imagem_width, 'min-height' => $this->style_imagem_height, 'background-image' => Spw_Html::Url($this->imagem), 'background-size' => $this->style_imagem_background_size) )) ) . '>';
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			protected function BoxTextos()
			{
				$array[] = '<div class="spw-box-textos" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array('align-content' => $this->style_texto_align_content, 'padding' => $this->style_texto_padding ) ) ) ) . '>';
				$array[] = $this->Titulo();
				$array[] = $this->Descricao();
				$array[] = $this->Botao();
				$array[] = '</div>';
				
				return join('', $array);
			}
			
			
			protected function Titulo()
			{
				if (!empty($this->titulo)) :
					
					return Spw_Html::Tag('h3', array('class' => 'spw-ui-titulo-3', 'style' => Spw_Html::AttributesValue(array('color' => $this->style_titulo_color, 'font-size' => $this->style_titulo_fontsize))  ), $this->titulo);
					
				endif;
			}
			
			
			protected function Descricao()
			{
				if (!empty($this->descricao)) :
					
					return Spw_Html::Tag('p', array('class' => 'spw-ui-descricao', 'style' => Spw_Html::AttributesValue(array('color' => $this->style_descricao_color, 'font-size' => $this->style_descricao_fontsize)) ), $this->descricao);
					
				endif;
			}
			
			
			protected function Botao()
			{
				if (!empty($this->botao_link)) :
					
					$botao = new Spw_UI_Components_Botao();
					$botao->Set_Texto($this->botao_texto);
					$botao->Set_Link($this->botao_link);
					$botao->Set_Link_Target($this->botao_link_target);
					$botao->Set_Download($this->botao_download);
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
			
			
			protected function Barra()
			{
				$barra = new Spw_UI_Components_Barra();
				$barra->Set_Exibir($this->barra_exibir);
				$barra->Set_CorHexadecimal($this->style_barra_color);
				$barra->Set_AlturaDaLinha($this->style_barra_height);
				$barra->Set_MarginTop($this->style_barra_margin_top);
				$barra->Set_MarginBottom($this->style_barra_margin_bottom);
				$barra->Set_LarguraDaLinha('1057px');
				$barra->Executar();
				
				return $barra->render;
			}
			
			
			
			protected function Template1()
			{
				$this->view[] = '<div class="spw-ui-components-post" ' . Spw_Html::Attributes(array('style' => Spw_Html::AttributesValue( array( 'background-color' => $this->style_background_color,  'margin-top' => $this->style_margin_top, 'margin-bottom' => $this->style_margin_bottom, 'border-style' => $this->CheckBorder('solid'), 'border-width' => $this->CheckBorder($this->style_border_width), 'border-color' => $this->CheckBorder($this->style_border_color) ) ))) . '>';
				$this->view[] = $this->BoxImagem();
				$this->view[] = $this->BoxTextos();
				$this->view[] = '</div>';
				$this->view[] = $this->Barra();
			}
			
			
			protected function Template2()
			{
				$this->view[] = '<div class="spw-ui-components-post" ' . Spw_Html::Attributes(array('style' => Spw_Html::AttributesValue( array( 'background-color' => $this->style_background_color,  'margin-top' => $this->style_margin_top, 'margin-bottom' => $this->style_margin_bottom, 'border-style' => $this->CheckBorder('solid'), 'border-width' => $this->CheckBorder($this->style_border_width), 'border-color' => $this->CheckBorder($this->style_border_color) ) ))) . '>';
				$this->view[] = $this->BoxTextos();
				$this->view[] = $this->BoxImagem();
				$this->view[] = '</div>';
				$this->view[] = $this->Barra();
			}
			
			
			protected function CheckBorder($value)
			{
				if ($this->style_border_exibir) :
					return $value;
				
						else :
							return null;
				endif;
			}
			
			
			protected function Template()
			{
				switch($this->layout) :
					
					case 1 :
						$this->Template1();
						break;
					
					case 2 :
						$this->Template2();
						break;
					
					default :
						$this->Template1();
					
				endswitch;
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