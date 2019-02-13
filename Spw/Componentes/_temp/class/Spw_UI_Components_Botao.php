<?php

	class Spw_UI_Components_Botao

     {

          // ATRIBUTOS
		
			protected $exibir = true;
			protected $texto;
			protected $link;
			protected $link_target = '_self';
			protected $download;
			protected $id;
			protected $icone;
			
			protected $style_width;
			protected $style_height;
			protected $style_background_color;
			protected $style_color;
			protected $style_font_size;
			protected $style_font_weight;
			protected $style_text_transform;
			protected $style_text_align;
			protected $style_border_radius;
			protected $style_margin_top;
			protected $style_margin_bottom;
			protected $style_icone_align;
			protected $style_icone_padding_left;
			protected $style_icone_padding_right = '20px';
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_Exibir($value)
			{
				$this->exibir = $value;
			}
			
			public function Set_Texto($value)
			{
				$this->texto = $value;
			}
			
			
			public function Set_Link($value)
			{
				$this->link = $value;
			}
			
			
			public function Set_Link_Target($value)
			{
				$this->link_target = $value;
			}
			
			
			public function Set_Download($value)
			{
				$this->download = $value;
			}
			
			
			public function Set_Id($value)
			{
				$this->id = $value;
			}
			
			
			public function Set_Icone($url)
			{
				$this->icone = $url;
			}
			
			
			public function Set_Style_Width($value)
			{
				$this->style_width = $value;
			}
			
			
			public function Set_Style_Height($value)
			{
				$this->style_height = $value;
			}
			
			
			public function Set_Style_BackgroundColor($value)
			{
				$this->style_background_color = $value;
			}
			
			
			public function Set_Style_Color($value)
			{
				$this->style_color = $value;
			}
			
			
			public function Set_Style_FontSize($value)
			{
				$this->style_font_size = $value;
			}
			
			
			public function Set_Style_FontWeight($value)
			{
				$this->style_font_weight = $value;
			}
			
			
			public function Set_Style_TextTransform($value)
			{
				$this->style_text_transform = $value;
			}
			
			
			public function Set_Style_TextAlign($value)
			{
				$this->style_text_align = $value;
			}
			
			
			public function Set_Style_BorderRadius($value)
			{
				$this->style_border_radius = $value;
			}
			
			
			public function Set_Style_MarginTop($value)
			{
				$this->style_margin_top = $value;
			}
			
			
			public function Set_Style_MarginBottom($value)
			{
				$this->style_margin_bottom = $value;
			}
			
			
			public function Set_Style_Icone_Align($value)
			{
				$this->style_icone_align = $value;
			}
			
			
			public function Set_Style_Icone_PaddingLeft($value)
			{
				$this->style_icone_padding_left = $value;
			}
			
			
			public function Set_Style_Icone_PaddingRight($value)
			{
				$this->style_icone_padding_right = $value;
			}



          // METODOS DE PROCESSO
			
			protected function Icone()
			{
				if (!empty($this->icone)) :
					return Spw_Html::Tag('img', array('class' => 'spw-case-icone', 'src' => $this->icone, 'style' => Spw_Html::AttributesValue( array('padding-left' => $this->style_icone_padding_left, 'padding-right' => $this->style_icone_padding_right) )), null);
				endif;
			}
			
			
			protected function Texto()
			{
				switch($this->style_icone_align) :
					
					case 'left' :
						return $this->Icone() . $this->texto;
						break;
					
					case 'right' :
						return $this->texto . $this->Icone();
						break;
					
					default :
						return $this->Icone() . $this->texto;
						break;
						
				endswitch;
			}
			
			
			protected function Download()
			{
				if ($this->download) :
					return 'Download';
				endif;
			}
			
			
			protected function FlexJustifyContent()
			{
				switch($this->style_text_align) :
					
					case 'left' :
						return 'flex-start;';
						break;
					
					case 'center' :
						return 'center;';
						break;
					
					case 'right' :
						return 'flex-end;';
						break;
					
					default :
						return 'center;';
						break;
					
				endswitch;
			}
			
			protected function Template()
			{
				if ($this->exibir) :
				
					$this->view[] = '<div class="spw-ui-components-botao" ' . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue( array( 'margin-top' =>$this->style_margin_top, 'margin-bottom' => $this->style_margin_bottom,  'justify-content' => $this->FlexJustifyContent(),  'max-width' => $this->style_width, 'height' => $this->style_height, 'background-color' => $this->style_background_color, 'color' => $this->style_color, 'font-size' => $this->style_font_size, 'font-weight' => $this->style_font_weight, 'text-transform' => $this->style_text_transform, 'border-radius' => $this->style_border_radius) )) ) . '>';
					$this->view[] = Spw_Html::Tag('a', array('id' => $this->id, 'download' => $this->Download(), 'href' => $this->link, 'target' => $this->link_target, 'style' => Spw_Html::AttributesValue( array( 'text-align' => $this->style_text_align, 'color' => $this->style_color, 'font-size' => $this->style_font_size, 'font-weight' => $this->style_font_weight, 'text-transform' => $this->style_text_transform, 'border-radius' => $this->style_border_radius) )), null);
					$this->view[] = $this->Texto();
					$this->view[] = '</div>';
				
				endif;
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