<?php

     class Spw_Wp_Admin_InserirMenuAoPainelDeControle
     
     {
          
     // ATRIBUTOS
          
		 protected $titulo_pagina;
		 protected $titulo_menu;
		 protected $slug;
		 protected $url_icon;
		 protected $position = 10;
		 protected $conteudo_pagina;
		 
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_TituloDaPagina($value)
		 {
			 $this->titulo_pagina = $value;
		 }
		 
		 
		 public function Set_TituloDoMenu($value)
		 {
			 $this->titulo_menu = $value;
		 }
		 
		 
		 public function Set_Slug($value)
		 {
			 $this->slug = $value;
		 }
		 
		 
		 public function Set_UrlIcone($value)
		 {
			 $this->url_icon = $value;
		 }
		 
		 
		 public function Set_Position($value)
		 {
			 $this->position = $value;
		 }
		 
		 
		 public function Set_ConteudoDaPagina($value)
		 {
			 $this->conteudo_pagina = $value;
		 }
          

     
     // METODOS DE PROCESSO
		 
		 
		 function ConteudoPagina()
		 {
			 echo $this->conteudo_pagina;
		 }
		 
		 
		 
		 function AddMenuPage()
		 {
			 
			 add_menu_page($this->titulo_pagina, $this->titulo_menu, 'manage_options', $this->slug, array($this, 'ConteudoPagina'), $this->url_icon, $this->position);
			 
		 }
          
     

     // ALGORITIMO
          
          public function Executar()
          
          {
               
               add_action('admin_menu', array($this, 'AddMenuPage'));
               
          }
          
          
     }