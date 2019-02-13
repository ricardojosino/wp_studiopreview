<?php

     $registrar_estilo = new \Spw\Componentes\Wp\AdicionarEstilo();
     $registrar_estilo->Set_NomeDaTransacao('estilo-catalogo-de-produtos');
     $registrar_estilo->Set_InserirNoLadoSite();
     $registrar_estilo->Set_Versao(1);
     $registrar_estilo->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('catalogo-de-produtos', 'estilo') );
     $registrar_estilo->Executar();