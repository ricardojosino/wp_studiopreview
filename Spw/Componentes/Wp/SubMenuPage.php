<?php

     namespace Spw\Componentes\Wp;
     
     class SubMenuPage
     {
          
          //01
          public $parent_slug;
          public $page_title;
          public $menu_title;
          public $capability = 'manage_options';
          public $menu_slug;
          public $modulo;
          public $modulo_pagina;
          public $conteudo;
          public $id;
          
          //02
          public function Set_SlugDeVinculo($value)
          {
               $this->parent_slug = $value;
          }
          
          
          public function Set_TituloDaPagina($value)
          {
               $this->page_title = $value;
          }
          
          
          public function Set_TituloDoMenu($value)
          {
               $this->menu_title = $value;
          }
          
          
          public function Set_Capacidade($value)
          {
               $this->capability = $value;
          }
          
          
          public function Set_SlugDoMenu($value)
          {
               $this->menu_slug = $value;
          }
          
          
          public function Set_Modulo($value)
          {
               $this->modulo = $value;
          }
          
          
          public function Set_Modulo_Pagina($value)
          {
               $this->modulo_pagina = $value;
          }
          
          
          public function Set_ConteudoDaPagina($value)
          {
               $this->conteudo = $value;
          }
          
          
          public function Set_Id($value)
          {
               $this->id = $value;
          }
          
          
          //03
          
          public function Conteudo()
          {
               $array[] = $this->conteudo;
               $array[] = $this->PaginaDoModulo();
               
               if (!empty($array)) :
                    echo \Spw\Componentes\Html\Funcoes::Tag('div', array( 'id' => $this->id ), join('', $array));
               endif;
               
          }
          
          public function PaginaDoModulo()
          {
               if($this->modulo and $this->modulo_pagina) :
                    ob_start();
                    \Spw\Componentes\Modulo\IncluirArquivo::Pagina($this->modulo, $this->modulo_pagina);
                    return ob_get_clean();
               endif;
          }
          
          public function SubMenu()
          {
               if ($this->parent_slug and $this->page_title and $this->menu_title and $this->menu_slug) :
               
                    add_submenu_page($this->parent_slug, $this->page_title, $this->menu_title, $this->capability, $this->menu_slug, array( $this, 'Conteudo' ));
               
               endif;
          }
          
          
          //04
          public function Executar()
          {
               add_action('admin_menu', array( $this, 'SubMenu'), 1 );
          }
          
          
     }