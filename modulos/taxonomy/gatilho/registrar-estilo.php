<?php

     $registrar_estilo = new \Spw\Componentes\Wp\AdicionarEstilo();
     $registrar_estilo->Set_NomeDaTransacao('spw-taxonomy-estilo');
     $registrar_estilo->Set_InserirNoLadoSite();
     $registrar_estilo->Set_Versao(1);
     $registrar_estilo->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('taxonomy', 'style') );
     $registrar_estilo->Executar();