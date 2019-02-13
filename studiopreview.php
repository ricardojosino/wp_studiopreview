<?php

     // Plugin Name: Studio Preview
     // Plugin URI: http://studiopreview.com.br
     // Description: Um pacote de soluções desenvolvida pela Studio Preview.
     // Version: 1
     // Author: Ricardo Josino
     
     require_once ABSPATH . 'wp-includes/pluggable.php';
     
     // CONTANTES
     define('SPW_PATH', plugin_dir_path(__FILE__));
     define('SPW_URL', plugin_dir_url(__FILE__));
     define('SPW_PLUGIN_NAME', 'studiopreview');
     define('SPW_VERSAO', 40);
     define('SPW_TITULO', 'Studio Preview');
     define('SPW_WP_PAGE', (isset($_GET['page'])) ? $_GET['page'] : null );

     // AUTO LOAD
     function Spw_AutoLoad($class)
     {
          
          $class = str_replace('\\', '/', $class);
          
          if ( strpos($class, 'Spw') !== false ) :
          
               require_once SPW_PATH .  $class . '.php';
          
          endif;
     }
          
     spl_autoload_register( 'Spw_AutoLoad');
     
     
     // MODULOS
     \Spw\Componentes\Modulo\Instalar::Modulo('controle-de-versao');
     \Spw\Componentes\Modulo\Instalar::Modulo('fontawesome');
     \Spw\Componentes\Modulo\Instalar::Modulo('estilo-admin');
     \Spw\Componentes\Modulo\Instalar::Modulo('estilo-componentes-ui');
     \Spw\Componentes\Modulo\Instalar::Modulo('aplicativos');
     \Spw\Componentes\Modulo\Instalar::Modulo('home');
     \Spw\Componentes\Modulo\Instalar::Modulo('teste');
     
     // CARREGAR APPS
     $carregar_apps = new \Aplicativos\Componentes\CarregarAplicativosInstalados();
     $carregar_apps->Executar();
     
     
     // CONTROLADOR DAS PAGINAS
     $controlador_paginas = new \Spw\Componentes\Modulo\ControladorDePaginas();
     $controlador_paginas->Set_WpPage('studiopreview');
     $controlador_paginas->Set_PaginaInicial('home', 'pagina-inicial');
     $controlador_paginas->Executar();
     
     $menu_page = new \Spw\Componentes\Wp\MenuPage();
     $menu_page->Set_TituloDaPagina('Studio Preview');
     $menu_page->Set_TituloDoMenu('Studio Preview');
     $menu_page->Set_WpPage('studiopreview');
     $menu_page->Set_Posicao(2);
     $menu_page->Set_ConteudoDaPagina($controlador_paginas->render);
     $menu_page->Set_UrlIcone( \Spw\Componentes\Biblioteca\Patch::UrlMidia('icone-studio-01.png') );
     $menu_page->Executar();
     
     add_theme_support( 'post-thumbnails' ); 
     add_theme_support( 'custom-logo' );
     //add_theme_support( 'post-formats' );
     
     function register_menus () 
     {
          
          register_nav_menus(array('menu-1' => 'Menu principal'));
     }
     
     
     add_action('init', 'register_menus');
     
     

     

     
     