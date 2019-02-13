<?php

	class Spw_UI_Components_Album

     {

          // ATRIBUTOS
		
			protected $add_foto;
			protected $style_border_width;
			protected $style_border_color;
			protected $style_background_color;
		
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_AddFoto($url, $link, $target)
			{
				$this->add_foto[] = array('url' => $url, 'link' => $link, 'target' => $target);
			}
			
			
			public function Set_Style_Item_BorderWidth($value)
			{
				$this->style_border_width = $value;
			}
			
			
			public function Set_Style_Item_BorderColor($value)
			{
				$this->style_border_color = $value;
			}
			
			
			public function Set_Style_Item_BackgroundColor($value)
			{
				$this->style_background_color = $value;
			}



          // METODOS DE PROCESSO
			
			
			
			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-components-album" >';
				$this->view[] = $this->Itens();
				$this->view[] = '</div>';
			}
			
			
			protected function Itens()
			{
				if (!empty($this->add_foto)) :
				
					$array[] = '<div class="spw-itens">';

					foreach($this->add_foto AS $item) :
						
						$array[] = $this->Item($item['url'], $item['link'], $item['target']);

					endforeach;
					
					$array[] = '</div>';
					
					return join('', $array);
				
				endif;
			}
			
			
			protected function Item($imagem, $link, $target)
			{
				return Spw_Html::Tag('div', array('class' => 'spw-item', 'style' => Spw_Html::AttributesValue( array('border-width' => $this->style_border_width, 'border-color' => $this->style_border_color, 'background-color' => $this->style_background_color) )  ), Spw_Html::Tag('a', array('href' => $link, 'target' => $target), Spw_Html::Tag('img', array('src' => $imagem), null)) );
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