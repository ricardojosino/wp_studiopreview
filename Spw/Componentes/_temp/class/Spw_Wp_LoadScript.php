<?php

     class Spw_Wp_LoadScript
     
     {
          
     // ATRIBUTOS
          
		  protected $position;
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
		  
		  
		  public function Set_Posicao_Head($value)
		  {
			  if ($value) :
				  $this->position = 'head';
			  endif;
		  }
		  
		  
		  public function Set_Posicao_Footer($value)
		  {
			  if ($value) :
				  $this->position = 'footer';
			  endif;
		  }

     
     // METODOS DE PROCESSO
		 
		function spw_navegacao_link_css()
		{
			echo '<script src="' . get_template_directory_uri() . '/spw/_library/js/' . $this->patch . '/' . $this->file . '"></script>';
		}
		
		
		function Position()
		{
			
			switch($this->position) :
				
				case 'head' :
					add_action('wp_head', array($this, 'spw_navegacao_link_css'));
					break;
				
				case 'footer' :
					add_action('wp_footer', array($this, 'spw_navegacao_link_css'));
					break;
				
				default :
					add_action('wp_head', array($this, 'spw_navegacao_link_css'));
					break;
					
					
			endswitch;
			
		}
          
     

     // ALGORITIMO
          
		public function Executar()

		{

			 $this->Position();

		}
          
          
     }