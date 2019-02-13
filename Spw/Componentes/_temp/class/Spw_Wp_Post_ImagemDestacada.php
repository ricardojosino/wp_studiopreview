<?php

	class Spw_Wp_Post_ImagemDestacada
     
     {
          
     // ATRIBUTOS
		
		protected $img_class;
		protected $img_id;
		protected $exibir_link;
		
		protected $view;
		public $render;
          
          
          
     // METODOS DE CONFIGURACAO
          
		public function Set_Class($value)
		{
			$this->img_class = $value;
		}
		
		
		public function Set_Id($value)
		{
			$this->img_id = $value;
		}
		
		
		public function Set_ExibirLinkParaPropriaImagem($value)
		{
			$this->exibir_link = $value;
		}

     
     // METODOS DE PROCESSO
		
		protected function Css()
		{
			if (empty($this->img_class)) :
				return ' class="img-responsive" ';
			
					else :
						return ' class="' . $this->img_class . '" ';
			endif;
		}
		
		
		
		protected function Id()
		{
			if (!empty($this->img_id)) :
				return ' id="' . $this->img_id . '" ';
			endif;
		}
		
		
		
		protected function ImagemDestacada()
		{
			
			if ($this->exibir_link) :
				
				$array[] = '<a href="' . wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '">';
				$array[] = '<img ' . $this->Id() . $this->Css() . ' src="'. wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '">';
				$array[] = '</a>';
				
					else :
						$array[] = '<img ' . $this->Id() . $this->Css() . ' src="'. wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) . '">';
				
			endif;
			
			$this->view[] = join(' ', $array);
			
		}
		
		
		protected function Render()
		{
			$this->render = spw_view($this->view);
			
		}
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               $this->ImagemDestacada();
			   $this->Render();
               
               
          }
          
          
     }