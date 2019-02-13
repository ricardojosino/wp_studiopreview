<?php
	
	class Spw_Wp_Widget_Register
     
     {
          
     // ATRIBUTOS
		
		protected $class_name;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AddWidget($value)
		{
			if (!empty($value)) :
				$this->class_name[] = $value;
			endif;
		}
		
     
     // METODOS DE PROCESSO
		
		public function RegisterWidget()
		{
			if (!empty($this->class_name)) :
			
				foreach($this->class_name AS $name) :
					register_widget($name);
				endforeach;
			
			endif;
		}
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
			  
			  if (!empty($this->class_name)) :
			  
				foreach($this->class_name AS $name) :  
					add_action('widgets_init', array($this, 'RegisterWidget'));
				endforeach;
			  
			  endif;
               
               
          }
          
          
     }