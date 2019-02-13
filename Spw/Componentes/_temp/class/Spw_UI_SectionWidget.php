<?php

     class Spw_UI_SectionWidget
     
     {
          
     // ATRIBUTOS
		 
		protected $style;
		protected $id;
		protected $class;
		protected $exibir;
		protected $content; 
		protected $view;
		public $render;
          
     // METODOS DE CONFIGURACAO
		
		public function Set_Exibir($value)
		{
			$this->exibir = $value;
		}
		
		
          
		public function Set_AddContent($id, $class, $value)
		{
			if (!empty($value)) :
				$this->content[] = '<div ' . Spw_Html::Id($id) . Spw_Html::ClassCss($class) . '>' . $value . '</div>';
			endif;
		}
		
		
		public function Set_Style($array)
		{
			$this->style = $array;
		}
		
		
		public function Set_Id($value)
		{
			$this->id = $value;
		}
		
		
		public function Set_ClassCss($value)
		{
			$this->class = $value;
		}
		
		
		

     
     // METODOS DE PROCESSO
		
		
		protected function Content()
		{
			if (!empty($this->content)) :
				return join('', $this->content);
			endif;
		}
		
		
		protected function ClassCss()
		{
			$array[] = 'spw-ui-widget';
			$array[] = (!empty($this->class)) ? $this->class : '';
			
			return ' class="' . join(' ', $array) . '" ';
		}

		
          
		protected function Section()
		{
			if ($this->exibir and !empty($this->content)) :
			
				$this->view[] = '<section' . Spw_Html::Id($this->id) . $this->ClassCss() . Spw_Html::Attributes( array('style' => Spw_Html::AttributesValue($this->style)) ) . '>';
				$this->view[] = $this->Content();
				$this->view[] = '</section>';
			
			endif;
		}


		protected function Render()
		{
			$this->render = spw_view($this->view);
		}
     

     // ALGORITIMO
          
		public function Executar()

		{
			$this->Section();
			$this->Render();


		}

          
     }