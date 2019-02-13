<?php

	class Spw_Wp_Post_TheContent

     {

          // ATRIBUTOS

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO



          // METODOS DE PROCESSO
			
			protected function Template()
			{
				if (have_posts() ) : the_post();
		
					ob_start();
					the_content();
					
					$this->view[] = ob_get_clean();

				endif;
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
