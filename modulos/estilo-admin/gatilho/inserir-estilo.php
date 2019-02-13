<?php

     $inserir_estilo = new \Spw\Componentes\Wp\AdicionarEstilo();
     $inserir_estilo->Set_NomeDaTransacao('spw-estilo-admin');
     $inserir_estilo->Set_InserirNoLadoAdmin();
     $inserir_estilo->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('estilo-admin', 'estilo') );
     $inserir_estilo->Set_Versao(1);
     $inserir_estilo->Executar();