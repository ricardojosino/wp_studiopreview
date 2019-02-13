<?php

	class Spw_UI_Admin_BotaoSwitch

     {

          // ATRIBUTOS
		
			protected $links;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO
			
			public function Set_AddLink($id, $link, $texto)
			{
				$this->links[] = array('id' => $id, 'link' => $link, 'texto' => $texto);
			}



          // METODOS DE PROCESSO
			
			protected function Template()
			{
				$this->view[] = '<div class="spw-ui-admin-botao-switch">';
				$this->view[] = $this->Box();
				$this->view[] = '<div id="spw-texto" class="spw-texto">Template 01</div>';
				$this->view[] = '<div class="spw-icone"><span id="spw-botao-switch-icone-1" class="dashicons dashicons-arrow-down"></span> <span  id="spw-botao-switch-icone-2" class="dashicons dashicons-arrow-up"></span></div>';
				$this->view[] = '</div>';
			}
			
			
			protected function Box()
			{
				if (!empty($this->links)) :
				
					$array[] = '<div id="spw-botao-switch-box" class="spw-box">';
					foreach($this->links AS $item) :
						$array[] = $this->BoxItem($item['id'], $item['link'], $item['texto']);
					endforeach;
					
					$array[] = '</div>';

					return join('', $array);
				
				endif;
			}
			
			
			protected function BoxItem($id, $link, $value)
			{
				return Spw_Html::Tag('div', array('class' => 'spw-item') , Spw_Html::Tag('a', array('id' => $id, 'href' => $link), $value) );
			}
			
			
			protected function Script()
			{
				$this->view[] = Spw_Html::Tag('script', array('src' => Spw_Lib_Url::javaScript('Spw_UI_Admin_BotaoSwitch')), null);
			}
			
			
			
			protected function Render()
			{
				$this->render = Spw::View($this->view);
			}



          // ALGORITIMO

          public function Executar()

          {

			  $this->Template();
			  $this->Script();
			  $this->Render();

          }


      }