<?php

     $registrar_estilo = new \Spw\Componentes\Wp\AdicionarEstilo();
     $registrar_estilo->Set_NomeDaTransacao('estilo-imoveis');
     $registrar_estilo->Set_InserirNoLadoSite();
     $registrar_estilo->Set_Versao(2);
     $registrar_estilo->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('imoveis', 'estilo') );
     $registrar_estilo->Executar();
     
     $registrar_estilo_admin = new \Spw\Componentes\Wp\AdicionarEstilo();
     $registrar_estilo_admin->Set_NomeDaTransacao('estilo-imoveis-admin');
     $registrar_estilo_admin->Set_InserirNoLadoAdmin();
     $registrar_estilo_admin->Set_Versao(2);
     $registrar_estilo_admin->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('imoveis', 'estilo') );
     $registrar_estilo_admin->Executar();
     
     