<?php
     
     namespace Spw\Componentes\Wp;

     class RegistrarFuncaoAjax

     {

          // ATRIBUTOS
		 
		 
			public $name_function;


          // METODOS DE CONFIGURACAO
			
			public function Set_NomeDaFuncao($value)
			{
				$this->name_function[] = $value;
			}



          // METODOS DE PROCESSO
			
			
			public function Action()
			{
				if (!empty($this->name_function)) :
					
                         foreach($this->name_function AS $name) :
                         
                              add_action('wp_ajax_' . $name, $name);
                              add_action('wp_ajax_nopriv_' . $name, $name);
                         
                         endforeach;
					
				endif;
			}



          // ALGORITIMO

          public function Executar()

          {
				$this->Action();
          }


      }