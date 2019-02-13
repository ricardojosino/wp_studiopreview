<?php

	class Spw_Template_Page

     {

          // ATRIBUTOS
		
			protected $header;
			protected $content;
			protected $footer;
			
			protected $head_title;
			protected $head_description;
			protected $head_image;

			protected $view;
			public $render;

          // METODOS DE CONFIGURACAO

			
			public function Set_AddHeader($value)
			{
				$this->header[] = $value;
			}
			
			
			public function Set_AddContent($value)
			{
				$this->content[] = $value;
			}
			
			
			public function Set_AddFooter($value)
			{
				$this->footer[] = $value;
			}
			
			
			public function Set_Head_Title($value)
			{
				$this->head_title = $value;
			}
			
			
			public function Set_Head_Description($value)
			{
				$this->head_description = Spw_Tools::LimitarTexto($value, 360);
			}
			
			
			public function Set_Head_Image($value)
			{
				$this->head_image = $value;
			}


          // METODOS DE PROCESSO
			
			
			protected function Head()
			{
				$head = new Spw_Template_Head();
				$head->Set_Title($this->head_title);
				$head->Set_Description($this->head_description);
				$head->Set_Image($this->head_image);
				$head->Set_Facebook_Title($this->head_title);
				$head->Set_Facebook_Description($this->head_description);
				$head->Set_Facebook_Image($this->head_image);
				$head->Set_Facebook_SiteName(spw_value_seo_nome_site());
				$head->Set_Facebook_Type('website');
				$head->Set_Facebook_Url(spw_value_seo_link_pagina());
				$head->Set_Twitter_Title($this->head_title);
				$head->Set_Twitter_Description($this->head_description);
				$head->Set_Twitter_Image($this->head_image);
				$head->Set_Twitter_Url(spw_value_seo_link_pagina());
				$head->Executar();
				
				return $head->render;
			}
			
			
			protected function Header()
			{
				if (!empty($this->header)) :
					
					return join('', $this->header);
					
				endif;
			}
			
			
			
			protected function Content()
			{
				if (!empty($this->content)) :
					return join('', $this->content);
				endif;
			}
			
			
			
			protected function Footer()
			{
				if (!empty($this->footer)) :
					
					return join('', $this->footer);
					
				endif;
			}

			
			
			protected function Template()
			{
				$this->view[] = '<html ' . get_language_attributes() . '>';
				$this->view[] = $this->Head();
				$this->view[] = '<body>';
				$this->view[] = $this->Header();
				$this->view[] = $this->Content();
				$this->view[] = $this->Footer();
				$this->view[] = '</body>';
				$this->view[] = '</html>';
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

