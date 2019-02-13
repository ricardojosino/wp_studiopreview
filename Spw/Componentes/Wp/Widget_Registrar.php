<?php
     
     namespace Spw\Componentes\Wp;
	
	class Widget_Registrar
     
     {
          
     // ATRIBUTOS
		
		protected $class_name;
          
          
          
     // METODOS DE CONFIGURACAO
		
		public function Set_AdicionarWidget($nome)
		{
			if (!empty($nome)) :
				$this->class_name[] = $nome;
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
			  
					add_action('widgets_init', array($this, 'RegisterWidget'));
			  
			  endif;
               
               
          }
          
          
     }