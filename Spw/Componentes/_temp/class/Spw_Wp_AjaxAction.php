<?php

     class Spw_Wp_AjaxAction

     {

          // ATRIBUTOS
		 
		 
			protected $name_function;


          // METODOS DE CONFIGURACAO
			
			public function Set_NomeDaFuncao($value)
			{
				$this->name_function = $value;
			}



          // METODOS DE PROCESSO
			
			
			protected function Action()
			{
				if (!empty($this->name_function)) :
					
					add_action('wp_ajax_' . $this->name_function, $this->name_function);
					add_action('wp_ajax_nopriv_' . $this->name_function, $this->name_function);
					
				endif;
			}



          // ALGORITIMO

          public function Executar()

          {
				$this->Action();
          }


      }