<?php

     $estilo_categoria_sidebar = new \Spw\Componentes\Wp\AdicionarEstilo();
     $estilo_categoria_sidebar->Set_NomeDaTransacao('estilo-categorias-sidebar');
     $estilo_categoria_sidebar->Set_InserirNoLadoSite();
     $estilo_categoria_sidebar->Set_Versao(3);
     $estilo_categoria_sidebar->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('categorias-sidebar', 'estilo') );
     $estilo_categoria_sidebar->Executar();