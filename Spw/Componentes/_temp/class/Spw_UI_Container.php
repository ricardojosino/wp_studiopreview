<?php

	class Spw_UI_Container
     
     {
          
     // ATRIBUTOS
		
		protected $content;
		protected $wrap;
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AddContent($id, $value, $margin_top = 0, $margin_bottom = 0)
		{
			if (!empty($value)) :
				$this->content[] = Spw_Html::Tag('div', array('id' => $id, 'style' => Spw_Html::AttributesValue( array('margin-top' => $margin_top, 'margin-bottom' => $margin_bottom) ) ), $value);
			endif;
		}
		
		
		public function Set_Wrap($value)
		{
			$this->wrap = $value;
		}
          

     
     // METODOS DE PROCESSO
		
		protected function Content()
		{
			if (!empty($this->content)) :
				$this->view[] = join(' ', $this->content);
			endif;
		}
		
		
		protected function Wrap()
		{
			if (!empty($this->content)) :
				$this->view[] = '<div class="spw-ui-wrap">';
				$this->view[] = join(' ', $this->content);
				$this->view[] = '</div>';
			endif;
		}
		
		
		protected function Container()
		{
			switch($this->wrap) :
				
				case true :
					$this->Wrap();
					break;
				
				case false :
					$this->Content();
					break;
				
				default :
					$this->Wrap();
					break;
				
			endswitch;
		}
		
		
		protected function Render()
		{
			$this->render = Spw::View($this->view);
		}
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->Container();
			   $this->Render();
          }
          
          
     }
