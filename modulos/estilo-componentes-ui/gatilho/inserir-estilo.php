<?php

    $inserir_estilo = new \Spw\Componentes\Wp\AdicionarEstilo();
    $inserir_estilo->Set_NomeDaTransacao('spw-estilo-componentes-ui');
    $inserir_estilo->Set_InserirNoLadoAdmin();
    $inserir_estilo->Set_Versao(1);
    $inserir_estilo->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('estilo-componentes-ui', 'estilo') );
    $inserir_estilo->Executar();
    
    $inserir_estilo_site = new \Spw\Componentes\Wp\AdicionarEstilo();
    $inserir_estilo_site->Set_NomeDaTransacao('spw-estilo-componentes-ui');
    $inserir_estilo_site->Set_InserirNoLadoSite();
    $inserir_estilo_site->Set_Versao(2);
    $inserir_estilo_site->Set_Src( \Spw\Componentes\Modulo\Path::UrlCss('estilo-componentes-ui', 'estilo') );
    $inserir_estilo_site->Executar();