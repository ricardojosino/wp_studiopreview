<?php

     class Spw_Wp_LoadCss
     
     {
          
     // ATRIBUTOS
          
          protected $patch;
		  protected $file;
          
     // METODOS DE CONFIGURACAO
          
		  public function Set_NomeDaPasta($value)
		  {
			  $this->patch = $value;
		  }
		  
		  
		  public function Set_NomeDoArquivo($value)
		  {
			  $this->file = $value;
		  }

     
     // METODOS DE PROCESSO
		 
		function spw_navegacao_link_css()
		{
			echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/spw/_library/css/' . $this->patch . '/' . $this->file . '"></link>';
		}
          
     

     // ALGORITIMO
          
		public function Executar()

		{

			 add_action('wp_head', array($this, 'spw_navegacao_link_css'), 1);

		}
          
          
     }