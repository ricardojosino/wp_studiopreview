<?php
     
     namespace Spw\Componentes\Wp;

     class MenuPage
     
     {
          
     // ATRIBUTOS
          
		 protected $titulo_pagina;
		 protected $titulo_menu;
		 protected $slug;
		 protected $url_icon;
		 protected $position = 10;
		 protected $conteudo_pagina;
           protected $pagina;
           protected $pagina_modulo;
           protected $id;
		 
          
          
     // METODOS DE CONFIGURACAO
		 
		 public function Set_TituloDaPagina($value)
		 {
			 $this->titulo_pagina = $value;
		 }
		 
		 
		 public function Set_TituloDoMenu($value)
		 {
			 $this->titulo_menu = $value;
		 }
		 
		 
		 public function Set_WpPage($value)
		 {
			 $this->slug = $value;
		 }
		 
		 
		 public function Set_UrlIcone($value)
		 {
			 $this->url_icon = $value;
		 }
		 
		 
		 public function Set_Posicao($value)
		 {
			 $this->position = $value;
		 }
		 
		 
		 public function Set_ConteudoDaPagina($value)
		 {
			 $this->conteudo_pagina = $value;
		 }
           
           
           public function Set_PaginaDoModulo($modulo, $pagina)
           {
                $this->pagina_modulo = $modulo;
                $this->pagina = $pagina;
           }
           
           
           public function Set_Id($value)
           {
                $this->id = $value;
           }
          

     
     // METODOS DE PROCESSO
		 
		 
		 function ConteudoPagina()
		 {
			 $array[] = $this->conteudo_pagina;
                $array[] = $this->PaginaDoModulo();
                
                if (!empty($array)) :
                     echo \Spw\Componentes\Html\Funcoes::Tag('div', array('id' => $this->id), join('', $array) );
                endif;
		 }
           
           
           protected function PaginaDoModulo()
           {
                if (!empty($this->pagina)) :
                     ob_start();
                     \Spw\Componentes\Modulo\IncluirArquivo::Pagina($this->pagina_modulo, $this->pagina);
                     return ob_get_clean();
                endif;
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