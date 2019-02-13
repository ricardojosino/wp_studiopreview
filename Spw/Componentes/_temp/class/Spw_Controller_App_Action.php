<?php 

     class Spw_Controller_App_Action
     {
     
     // ATRIBUTOS

          protected $app;
          protected $action;
     
     
     
     // METODOS DE CONFIGURACAO
     
          public function Set_App($value)
          {
               $this->app = $value;
          }


          public function Set_AddAction($value)
          {
				if (!empty($value)) :
					$this->action[] = $value;
				endif;
          }
     
     
     // METODOS DE PROCESSO

          protected function Action()
          {
               if ( !empty($this->app) and !empty($this->action)) :

					foreach($this->action AS $action) :
				   
						include get_template_directory() . '/spw/' . $this->app . '/actions/' . $action . '.php';
						exit();
					endforeach;
                    

               endif;
          }
     
     
     
     // ALGORITIMO
     
         public function Executar()
         {
              $this->Action();
     
         }
     
     }