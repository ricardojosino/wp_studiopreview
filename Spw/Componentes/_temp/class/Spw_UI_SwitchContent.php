<?php

	class Spw_UI_SwitchContent

     {

          // ATRIBUTOS
		
			protected $id;
			protected $content;
			
			protected $view;
			public $render;



          // METODOS DE CONFIGURACAO
			
			public function Set_Id($value)
			{
				$this->id = $value;
			}
			
			
			public function Set_Content($id, $content)
			{
				$this->content[] = array('id' => $id, 'content' => $content);
			}



          // METODOS DE PROCESSO
			
			protected function Content()
			{
				
				if (!empty($this->content)) :
					
					foreach($this->content AS $content) :
					
						$this->view[] = ($this->id == $content['id']) ? $content['content'] : '';
					
					endforeach;
					
				endif;
				
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
